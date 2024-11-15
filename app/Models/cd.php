<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cd extends Model
{
    use HasFactory;
    public $timestamps = false;
    // Tentukan tabel yang digunakan oleh model ini (opsional jika namanya sesuai konvensi Laravel)
    protected $table = 'cds';


    protected $fillable = [
        'title',
        'artist',
        'release_date',
        'genre',
    ];

}
