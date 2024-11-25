<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koran extends Model
{
    use HasFactory;public $timestamps = false;

    // Tentukan tabel yang digunakan oleh model ini (opsional jika namanya sesuai konvensi Laravel)
    protected $table = 'korans';

    // Tentukan kolom-kolom yang bisa diisi secara massal
    protected $fillable = [
        'title',
        'publisher',
        'publication_date',
        'description',
    ];
    public function reservations()
    {
        return $this->morphMany(Reservation::class, 'collection');
    }
    
  
}
