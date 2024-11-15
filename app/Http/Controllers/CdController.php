<?php


namespace App\Http\Controllers;

use App\Models\Cd;
use Illuminate\Http\Request;

class CdController extends Controller
{
    public function index(Request $request)
{
   $cds = Cd::all(); // Ambil semua data cd dari database
   return view('cd.index', compact('cds')); // Pastikan variabel 'cds' dipass ke view
}

public function create()
{
   return view('cd.create');
}

public function store(Request $request)
{
   $validated = $request->validate([
       'title' => 'required|string',
       'artist' => 'required|string',
       'release_date' => 'required|date',
       'genre' => 'required|string',
   ]);

   Cd::create($validated);
   session()->flash('success', 'CD berhasil ditambahkan!');
   return redirect()->route('librarian.dashboard');
}

public function edit($id)
{
   $cd = Cd::findOrFail($id);
   return view('cd.edit', compact('cd'));
}

public function update(Request $request, $id)
{
   $validated = $request->validate([
       'title' => 'required|string',
       'artist' => 'required|string',
       'release_date' => 'required|date',
       'genre' => 'required|string',
   ]);

   $cd = Cd::findOrFail($id);
   $cd->update($validated);

   return redirect()->route('librarian.dashboard');
}

public function destroy($id)
{
   Cd::destroy($id);
   return redirect()->route('librarian.dashboard');
}
}

