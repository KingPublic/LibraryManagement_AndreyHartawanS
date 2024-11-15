<?php

namespace App\Http\Controllers;

use App\Models\Koran;
use Illuminate\Http\Request;

class KoranController extends Controller
{
    // Menampilkan semua data koran
    public function index(Request $request)
    {
        
        // Ambil semua data koran
        $korans = Koran::all();  // Mengambil semua koran
        // dd($korans);
        return view('koran.index', compact('korans'));  // Menampilkan view dengan data koran
    }

    // Menyimpan data koran baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'publisher' => 'required|string',
            'publication_date' => 'required|date',
            'description' => 'required|string',
        ]);

        Koran::create($validated);
        session()->flash('success', 'Koran berhasil ditambahkan!');
        return redirect()->route('librarian.dashboard');
    }

    // Menampilkan form untuk membuat koran baru
    public function create()
    {
        return view('koran.create'); // Pastikan view 'koran/create.blade.php' ada
    }

    // Menampilkan form untuk edit koran
    public function edit($id)
    {
        $koran = Koran::findOrFail($id);
        return view('koran.edit', compact('koran'));
    }

    // Mengupdate data koran
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'publisher' => 'required|string',
            'publication_date' => 'required|date',
            'description' => 'required|string',
        ]);

        $koran = Koran::findOrFail($id);
        $koran->update($validated);

        session()->flash('success', 'Koran berhasil diupdate!');
        return redirect()->route('librarian.dashboard');
    }

    // Menghapus data koran
    public function destroy($id)
    {
        Koran::destroy($id);
        session()->flash('success', 'Koran berhasil dihapus!');
        return redirect()->route('librarian.dashboard');
    }
}
