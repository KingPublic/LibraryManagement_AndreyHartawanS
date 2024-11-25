<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Mendapatkan daftar semua reservasi
    public function index()
    {
        return response()->json(Reservation::with('user', 'collection')->get());
    }

    // Membuat reservasi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'collection_id' => 'required',
            'collection_type' => 'required|in:App\\Models\\Cd,App\\Models\\Jurnal,App\\Models\\Skripsi',
        ]);

        $reservation = Reservation::create($validated);

        return response()->json($reservation, 201);
    }

    // Mendapatkan detail reservasi tertentu
    public function show($id)
    {
        $reservation = Reservation::with('user', 'collection')->find($id);

        if (!$reservation) {
            return response()->json(['error' => 'Reservation not found'], 404);
        }

        return response()->json($reservation);
    }

    // Memperbarui reservasi
    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['error' => 'Reservation not found'], 404);
        }

        $validated = $request->validate([
            'status' => 'in:pending,approved,rejected',
        ]);

        $reservation->update($validated);

        return response()->json($reservation);
    }

    // Menghapus reservasi
    public function destroy($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['error' => 'Reservation not found'], 404);
        }

        $reservation->delete();

        return response()->json(['message' => 'Reservation deleted successfully']);
    }
}
