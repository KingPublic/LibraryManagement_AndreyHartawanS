<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InventoryApproval;
use App\Models\Buku;  
use App\Models\Jurnal;
use App\Models\Koran;
use App\Models\Skripsi;
use App\Models\Cd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function login(Request $request)
{
    // Validate the inputs
    $request->validate([
        'name' => 'required',
        'password' => 'required',
    ]);

    $name = $request->input('name');
    $password = $request->input('password');

    // Find user by name or username
    $user = User::where('name', $name)->orWhere('username', $name)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
    }

    if (Hash::check($password, $user->password)) {
        session([
            'user' => [
                'name' => $user->name,
                'role' => $user->role,
            ]
        ]);

        // Debug: Check if session is set correctly
        dd(session('user')); // This will show the session content

        // Redirect based on role
        return redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'librarian.dashboard');
    } else {
        return redirect()->back()->with('error', 'Invalid username or password');
    }
}

    // Admin Dashboard - Manage everything from here
    public function dashboard()
    {
        $user = session('user');  // Get user from session
        
        if (!$user || $user['role'] !== 'admin') {
            return redirect()->route('login')->with('error', 'You are not authorized to access this page.');
        }

        // Get all pending inventory approvals
        $pendingApprovals = InventoryApproval::where('status', 'pending')->get();

        // Get all librarians
        $librarians = User::where('role', 'librarian')->get();

        return view('admin.dashboard', compact('pendingApprovals', 'librarians'));
    }

    // Create a new librarian
    public function createLibrarian()
    {
        return view('admin.librarians.create');
    }

    // Store the new librarian in the database
    public function storeLibrarian(Request $request)
    {
        $user = session('user');
        if (!$user || $user['role'] !== 'admin') {
            return redirect()->route('login')->with('error', 'You are not authorized to perform this action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $librarian = new User();
        $librarian->name = $request->name;
        $librarian->email = $request->email;
        $librarian->password = bcrypt($request->password);
        $librarian->role = 'librarian';  // Ensure librarian role
        $librarian->save();

        return redirect()->route('admin.dashboard')->with('success', 'Librarian created successfully.');
    }

    // Delete a librarian
    public function deleteLibrarian(User $user)
    {
        $admin = session('user');
        if (!$admin || $admin['role'] !== 'admin') {
            return redirect()->route('login')->with('error', 'You are not authorized to perform this action.');
        }

        // Ensure the admin cannot delete themselves
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('error', 'You cannot delete an admin.');
        }

        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Librarian deleted successfully.');
    }
// Show the edit form for a librarian
public function editLibrarian(User $user)
{
    return view('admin.librarians.edit', compact('user'));
}

public function updateLibrarian(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    // Update user details
    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->route('admin.manage-librarians')->with('success', 'Librarian updated successfully.');
}
    public function manageLibrarians()
    {
        // You can display a list of librarians or other admin-specific actions here
        $librarians = User::where('role', 'librarian')->get();
        return view('admin.librarians.index', compact('librarians'));
    }

    // Approve inventory update request
    public function approveInventory(InventoryApproval $approval)
    {
        $admin = session('user');
        if (!$admin || $admin['role'] !== 'admin') {
            return redirect()->route('login')->with('error', 'You are not authorized to perform this action.');
        }

        $approval->status = 'approved';
        $approval->save();

        return redirect()->route('admin.dashboard')->with('success', 'Inventory update approved.');
    }

    public function viewInventoryApprovals()
{
    $user = session('user'); // Get the logged-in user from session

    if (!$user || $user['role'] !== 'admin') {
        return redirect()->route('login')->with('error', 'You are not authorized to access this page.');
    }

    // Get all pending inventory update requests
    $pendingApprovals = InventoryApproval::where('status', 'pending')->get();

    return view('admin.collection-requests', compact('pendingApprovals'));
}

public function systemOverview()
    {
        $user = session('user'); // Get the logged-in user from session

        if (!$user || $user['role'] !== 'admin') {
            return redirect()->route('login')->with('error', 'You are not authorized to access this page.');
        }

        // Get the total counts of various resources
        $totalUsers = User::count();
        $totalBooks = Buku::count();
        $totalCDs = CD::count();  // Count the number of CDs
        $totalJournals = Jurnal::count();  // Count the number of Journals
        $totalTheses = Skripsi::count();  // Count the number of Theses (Skripsi)
        $totalNewspapers = Koran::count();  // Count the number of Newspapers (Koran)

        // Return the view with the data
        return view('admin.system-overview', compact(
            'totalUsers', 'totalBooks', 'totalCDs', 'totalJournals', 'totalTheses', 'totalNewspapers'
        ));
    }

public function editPermission(User $user)
{
    return view('admin.permissions.edit', compact('user'));
}


public function managePermissions()
{
    $user = Auth::user();  // Get the logged-in user using Auth

    // $user = session('user');  // Retrieve the user from the session
    
    
    // dd($user);  // This will dump the session data and stop further execution

    if (!$user || strtolower(trim($user['role'])) !== 'admin') {
        return redirect()->route('login')->with('error', 'You are not authorized to access this page.');
    }
    
    $users = User::all();  // Fetch users to manage permissions for

    return view('admin.manage-permissions', compact('users'));
}


    // Reject inventory update request
    public function rejectInventory(InventoryApproval $approval)
    {
        $admin = session('user');
        if (!$admin || $admin['role'] !== 'admin') {
            return redirect()->route('login')->with('error', 'You are not authorized to perform this action.');
        }

        $approval->status = 'rejected';
        $approval->save();

        return redirect()->route('admin.dashboard')->with('success', 'Inventory update rejected.');
    }
}


