<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        // // Get 'sort_by' and 'order' parameters from URL, default to 'title' and 'asc' if not provided
        // $sortBy = $request->input('sort_by', 'title');
        // $order = $request->input('order', 'asc');

        // // Retrieve and sort 'buku' data based on the given column and order
        // $buku = Buku::orderBy($sortBy, $order)->get();

        $bukus = Buku::all(); // Ambil semua data buku dari database
        return view('buku.index', compact('bukus')); // Pastikan variabel 'bukus' dipass ke view
    
    }

    
    // Menyimpan data buku baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'publication_year' => 'required|integer',
            'pages' => 'required|integer',
        ]);

        Buku::create($validated);
        session()->flash('success', 'Buku berhasil ditambahkan!');
        return redirect()->route('librarian.dashboard');
    }

    public function create()
    {
        session()->flash('success', 'Buku berhasil ditambahkan!');
        return view('buku.create'); // Pastikan view 'buku/create.blade.php' ada
    }

    // Menampilkan form untuk edit
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    // Mengupdate data buku
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'publication_year' => 'required|integer',
            'pages' => 'required|integer',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($validated);

        return redirect()->route('librarian.dashboard');
    }

    // Menghapus data buku
    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect()->route('librarian.dashboard');
    }
}