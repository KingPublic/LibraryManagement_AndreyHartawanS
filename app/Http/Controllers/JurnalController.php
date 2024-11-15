<?php
namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function index(Request $request)
    {
        // // Ambil parameter 'sort_by' dan 'order' dari URL, defaultkan ke 'title' dan 'asc' jika tidak ada
        // $sortBy = $request->input('sort_by', 'title'); // Kolom yang digunakan untuk sorting
        // $order = $request->input('order', 'asc'); // Ascending atau descending
        // $journals = Jurnal::all(); 
         
        
        $journals = Jurnal::all();  // Mengambil semua jurnal
        return view('jurnal.index', compact('journals'));  // Menampilkan view dengan data jurnal
    
        // Ambil data jurnal dan sort berdasarkan kolom dan urutan yang diberikan
        // $jurnal = Jurnal::orderBy($sortBy, $order)->get();

        // Kembalikan view dengan data jurnal yang sudah disortir
        // return view('jurnal.index', compact('jurnal', 'sortBy', 'order'));
    }

    // Menyimpan data jurnal baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'publication_year' => 'required|integer',
            'description' => 'required|string',
        ]);

        Jurnal::create($validated);
        session()->flash('success', 'Jurnal berhasil ditambahkan!');
        return redirect()->route('librarian.dashboard');
    }

    // Menampilkan form untuk membuat jurnal baru
    public function create()
    {
        return view('jurnal.create'); // Pastikan view 'jurnal/create.blade.php' ada
    }

    // Menampilkan form untuk edit jurnal
    public function edit($id)
    {
        $jurnal = Jurnal::findOrFail($id);
        return view('jurnal.edit', compact('jurnal'));
    }

    // Mengupdate data jurnal
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'publication_year' => 'required|integer',
            'description' => 'required|string',
        ]);

        $jurnal = Jurnal::findOrFail($id);
        $jurnal->update($validated);

        session()->flash('success', 'Jurnal berhasil diupdate!');
        return redirect()->route('librarian.dashboard');
    }

    // Menghapus data jurnal
    public function destroy($id)
    {
        Jurnal::destroy($id);
        session()->flash('success', 'Jurnal berhasil dihapus!');
        return redirect()->route('librarian.dashboard');
    }
}

