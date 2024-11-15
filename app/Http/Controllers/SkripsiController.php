<?php



namespace App\Http\Controllers;

use App\Models\Skripsi;
use Illuminate\Http\Request;

class SkripsiController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->input('sort_by', 'title');
        $order = $request->input('order', 'asc');

        $skripsi = Skripsi::orderBy($sortBy, $order)->get();

        return view('skripsi.index', compact('skripsi', 'sortBy', 'order'));
    }
}

