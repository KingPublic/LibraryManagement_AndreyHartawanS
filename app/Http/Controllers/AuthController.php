<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
    
class AuthController extends Controller
    {
        // Menampilkan halaman login
        public function showLoginForm()
        {
            return view('auth.login');
        }
    
        // Menangani proses login
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
        
                // Redirect based on role
                return redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'librarian.dashboard');
            } else {
                return redirect()->back()->with('error', 'Invalid username or password');
            }
        }
        

    
        // Menangani proses logout
        public function logout()
        {
            // Hapus session user
            session()->forget('user');
            return redirect()->route('login')->with('success', 'Logged out successfully');
        }
    }
    

    
