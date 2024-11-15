<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\CD;
use App\Models\Koran;
use App\Models\Jurnal;
use App\Models\Skripsi;
use App\Models\Reservation;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class LibrarianController extends Controller
{

    public function createReservation(Request $request)
{
    // Validate the reservation data
    $request->validate([
        'user_id' => 'required|exists:users,id', // Ensure the user exists
        'inventory_id' => 'required|exists:books,id', // Assuming it's a book reservation
        'due_date' => 'required|date',
    ]);

    // Create a new reservation record
    $reservation = Reservation::create([
        'user_id' => $request->user_id, // Student who is making the reservation
        'inventory_type' => 'book', // You can adjust this if it's another inventory type
        'inventory_id' => $request->inventory_id, // The ID of the book
        'status' => 'pending', // Status is pending initially
        'due_date' => $request->due_date, // The due date for the item
    ]);

    // Use $reservation to do something further, such as redirecting or logging
    // You can log the reservation data for debugging purposes
    Log::info('Reservation created:', ['reservation' => $reservation->toArray()]);


    // Optionally, pass the $reservation data to a view for confirmation (if needed)
    // return view('reservation.confirmation', compact('reservation'));

    return redirect()->back()->with('success', 'Reservation created successfully!');
}

    // Manage Inventory - Get all inventory items (books, CDs, journals, newspapers, theses)
    public function manageInventory()
    {
        // Fetch inventory items for all types
        $books = Buku::all();
        $cds = CD::all();
        $newspapers = Koran::all();
        $journals = Jurnal::all();
        $theses = Skripsi::all();

        return view('librarian.inventory.index', compact('books', 'cds', 'newspapers', 'journals', 'theses'));
    }

    public function manageLibrary()
    {
        // Get all inventory items for each type
        $books = Buku::all();
        $cds = CD::all();
        $journals = Jurnal::all();
        $newspapers = Koran::all();
        $theses = Skripsi::all();
    
        // Pass the data to the view
        return view('librarian.manage-library', compact('books', 'cds', 'journals', 'newspapers', 'theses'));
    }
    
    public function editBook($id)
    {
        $book = Buku::findOrFail($id); // Find the book by ID

        return view('librarian.edit-book', compact('book')); // Pass the book data to the view
    }

    // Update the book information
    public function updateBook(Request $request, $id)
    {
        $book = Buku::findOrFail($id);

        // Validate and update the book
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
        ]);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
        ]);

        return redirect()->route('librarian.manage-library')->with('success', 'Book updated successfully!');
    }

    public function dashboard()
    {
        // Return librarian dashboard view
 
        $reservation = Reservation::latest()->first(); // Example: Get the latest reservation

        return view('librarian.dashboard', compact('reservation'));
    }

    // Approve Student Reservation - Approve reservation for books, CDs, etc.
    public function approveReservation(Reservation $reservation)
    {
        // Update the reservation status to 'approved'
        $reservation->status = 'approved';
        $reservation->save();

        return redirect()->route('librarian.dashboard')->with('success', 'Reservation approved successfully.');
    }
    public function showReservations()
{
    // Get all reservations, or specific ones
    $reservations = Reservation::all(); // or any logic you have

    return view('librarian.reservations.index', compact('reservations'));
}
    public function showCreateReservationForm()
{
    $users = User::all(); // Get all users (students)
    $books = Buku::all(); // Get all books (you can add CDs, journals, etc. similarly)

    return view('librarian.create-reservation', compact('users', 'books'));
}

    // Reject Student Reservation - Reject a reservation
    public function rejectReservation(Reservation $reservation)
    {
        // Update the reservation status to 'rejected'
        $reservation->status = 'rejected';
        $reservation->save();

        return redirect()->route('librarian.dashboard')->with('success', 'Reservation rejected.');
    }

    // Handle Overdue Books - List overdue books
    public function handleOverdueItems()
{
    // Dapatkan tanggal sekarang
    $now = Carbon::now();

    // Menentukan waktu 1 bulan yang lalu
    $oneMonthAgo = $now->subMonth();

    // Cek buku, CD, jurnal, dan koran yang sudah lebih dari 1 bulan
    $overdueBooks = Buku::where('publication_date', '<', $oneMonthAgo)->get();
    $overdueCDs = CD::where('publication_date', '<', $oneMonthAgo)->get();
    $overdueJournals = Jurnal::where('publication_date', '<', $oneMonthAgo)->get();
    $overdueKorans = Koran::where('publication_date', '<', $oneMonthAgo)->get();

    // Gabungkan hasilnya ke dalam satu koleksi untuk memudahkan pengolahan
    $overdueItems = $overdueBooks->merge($overdueCDs)->merge($overdueJournals)->merge($overdueKorans);

    // Kembalikan hasil ke view
    return view('librarian.overdue.', compact('overdueItems'));
}

public function handleOverdueBooks()
    {
        // Ambil semua buku yang sudah lebih dari satu bulan
        $overdueBooks = Buku::where('publication_date', '<', Carbon::now()->subMonth())
                            ->get();

        // Ambil semua koran yang sudah lebih dari satu bulan
        $overdueKorans = Koran::where('publication_date', '<', Carbon::now()->subMonth())
                             ->get();

        // Ambil semua jurnal yang sudah lebih dari satu bulan
        $overdueJournals = Jurnal::where('publication_date', '<', Carbon::now()->subMonth())
                                  ->get();

        // Gabungkan semua item yang sudah lebih dari satu bulan
        $overdueItems = $overdueBooks->merge($overdueKorans)->merge($overdueJournals);

        return view('librarian.overdue', compact('overdueItems'));
    }
}
