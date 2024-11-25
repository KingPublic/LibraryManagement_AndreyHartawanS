<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'collection_id',
        'collection_type', // Menyimpan tipe koleksi (Cd, Jurnal, Skripsi)
        'status', // Misalnya: pending, approved, rejected
        'reserved_at', // Tanggal pemesanan
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function collection()
    {
        return $this->morphTo();
    }
}
