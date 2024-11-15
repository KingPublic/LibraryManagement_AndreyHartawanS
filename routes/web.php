<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KoranController;
use App\Http\Controllers\CdController;
use App\Http\Controllers\SkripsiController;


// Home route - redirects to login page
Route::get('/', function () {
    return view('auth.login');
});

// Authentication Routes (Login and Logout)
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Manage Librarians Routes
Route::get('admin/manage-librarians', [AdminController::class, 'manageLibrarians'])->name('admin.manage-librarians');
Route::get('admin/create-librarian', [AdminController::class, 'createLibrarian'])->name('admin.create-librarian');
Route::post('admin/store-librarian', [AdminController::class, 'storeLibrarian'])->name('admin.store-librarian');
Route::delete('admin/delete-librarian/{user}', [AdminController::class, 'deleteLibrarian'])->name('admin.delete-librarian');
// System Overview Route
Route::get('admin/system-overview', [AdminController::class, 'systemOverview'])->name('admin.system-overview');
// Manage Permissions Route
Route::get('admin/manage-permissions', [AdminController::class, 'managePermissions'])->name('admin.manage-permissions');
Route::get('admin/edit-librarian/{user}', [AdminController::class, 'editLibrarian'])->name('admin.edit-librarian');
Route::get('admin/edit-librarian/{user}', [AdminController::class, 'editLibrarian'])->name('admin.edit-librarian');
Route::put('admin/update-librarian/{user}', [AdminController::class, 'updateLibrarian'])->name('admin.update-librarian');
Route::get('admin/edit-permission/{user}', [AdminController::class, 'editPermission'])->name('admin.edit-permission');


// Librarian Dashboard Route
Route::get('/librarian/dashboard', [LibrarianController::class, 'dashboard'])->name('librarian.dashboard');
// Route::get('/manage-library', [LibraryController::class, 'index'])->name('manage-library');


// Collection Update Requests Routes (for Admin)
Route::get('admin/collection-requests', [AdminController::class, 'viewInventoryApprovals'])->name('admin.collection-requests');
Route::post('admin/approve-inventory/{approval}', [AdminController::class, 'approveInventory'])->name('admin.approve-inventory');
Route::post('admin/reject-inventory/{approval}', [AdminController::class, 'rejectInventory'])->name('admin.reject-inventory');

// Librarian Reservation Routes
Route::get('librarian/reservation/create', [LibrarianController::class, 'showCreateReservationForm'])->name('librarian.create-reservation-form');
Route::post('librarian/reservation/create', [LibrarianController::class, 'createReservation'])->name('librarian.create-reservation');

// Librarian Inventory Management Routes
Route::get('librarian/inventory', [LibrarianController::class, 'manageInventory'])->name('librarian.inventory');
// Librarian Routes for Managing Library Inventory
Route::get('librarian/manage-library', [LibrarianController::class, 'manageLibrary'])->name('librarian.manage-library');

// Librarian Reservation Approval/Reject Routes
Route::post('librarian/approve-reservation/{reservation}', [LibrarianController::class, 'approveReservation'])->name('librarian.approve-reservation');

Route::post('librarian/reject-reservation/{reservation}', [LibrarianController::class, 'rejectReservation'])->name('librarian.reject-reservation');

// Librarian Route to Handle Overdue Books
Route::get('librarian/overdue-books', [LibrarianController::class, 'handleOverdueBooks'])->name('librarian.handle-overdue');
// Book Routes
Route::get('librarian/edit-book/{id}', [LibrarianController::class, 'editBook'])->name('librarian.edit-book');
Route::post('librarian/update-book/{id}', [LibrarianController::class, 'updateBook'])->name('librarian.update-book');

// CD Routes
Route::get('librarian/edit-cd/{id}', [LibrarianController::class, 'editCD'])->name('librarian.edit-cd');
Route::post('librarian/update-cd/{id}', [LibrarianController::class, 'updateCD'])->name('librarian.update-cd');

// Journal Routes
Route::get('librarian/edit-journal/{id}', [LibrarianController::class, 'editJournal'])->name('librarian.edit-journal');
Route::post('librarian/update-journal/{id}', [LibrarianController::class, 'updateJournal'])->name('librarian.update-journal');

// Newspaper Routes
Route::get('librarian/edit-newspaper/{id}', [LibrarianController::class, 'editNewspaper'])->name('librarian.edit-newspaper');
Route::post('librarian/update-newspaper/{id}', [LibrarianController::class, 'updateNewspaper'])->name('librarian.update-newspaper');

// Thesis Routes
Route::get('librarian/edit-thesis/{id}', [LibrarianController::class, 'editThesis'])->name('librarian.edit-thesis');
Route::post('librarian/update-thesis/{id}', [LibrarianController::class, 'updateThesis'])->name('librarian.update-thesis');

// Routes for Buku
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::resource('buku', BukuController::class);

// Routes for Jurnal
Route::get('/jurnal/create', [JurnalController::class, 'create'])->name('jurnal.create');
Route::post('/jurnal', [JurnalController::class, 'store'])->name('jurnal.store');
Route::get('/jurnal/{id}/edit', [JurnalController::class, 'edit'])->name('jurnal.edit');
Route::put('/jurnal/{id}', [JurnalController::class, 'update'])->name('jurnal.update');
Route::delete('/jurnal/{id}', [JurnalController::class, 'destroy'])->name('jurnal.destroy');

// Routes for CD
Route::get('/cd/create', [CDController::class, 'create'])->name('cd.create');
Route::post('/cd', [CDController::class, 'store'])->name('cd.store');
Route::get('/cd/{id}/edit', [CDController::class, 'edit'])->name('cd.edit');
Route::put('/cd/{id}', [CDController::class, 'update'])->name('cd.update');
Route::delete('/cd/{id}', [CDController::class, 'destroy'])->name('cd.destroy');

// Routes for Koran
Route::get('/koran/create', [KoranController::class, 'create'])->name('koran.create');
Route::post('/koran', [KoranController::class, 'store'])->name('koran.store');
Route::get('/koran/{id}/edit', [KoranController::class, 'edit'])->name('koran.edit');
Route::put('/koran/{id}', [KoranController::class, 'update'])->name('koran.update');
Route::delete('/koran/{id}', [KoranController::class, 'destroy'])->name('koran.destroy');
Route::get('/koran', [KoranController::class, 'index'])->name('koran.index');

// Routes for Skripsi
Route::get('/skripsi/create', [SkripsiController::class, 'create'])->name('skripsi.create');
Route::post('/skripsi', [SkripsiController::class, 'store'])->name('skripsi.store');
Route::get('/skripsi/{id}/edit', [SkripsiController::class, 'edit'])->name('skripsi.edit');
Route::put('/skripsi/{id}', [SkripsiController::class, 'update'])->name('skripsi.update');
Route::delete('/skripsi/{id}', [SkripsiController::class, 'destroy'])->name('skripsi.destroy');

// Route untuk menghapus Buku
Route::delete('/librarian/book/{id}', [BukuController::class, 'destroy'])->name('buku.delete');

// Route untuk menghapus CD
Route::delete('/librarian/cd/{id}', [CdController::class, 'destroy'])->name('cd.delete');

// Route untuk menghapus Journal
Route::delete('/librarian/journal/{id}', [JurnalController::class, 'destroy'])->name('jurnal.delete');

// Route untuk menghapus Newspaper
Route::delete('/librarian/newspaper/{id}', [KoranController::class, 'destroy'])->name('newspaper.delete');

// Route untuk menghapus Thesis
Route::delete('/librarian/thesis/{id}', [SkripsiController::class, 'destroy'])->name('thesis.delete');

// Route untuk menampilkan daftar Buku
// Route::get('/librarian/books', [BukuController::class, 'index'])->name('buku.index');

//kemungkinan salah itu get mu yg ()