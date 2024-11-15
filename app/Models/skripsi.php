<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;

    protected $table = 'skripsis';

    // Tentukan kolom-kolom yang bisa diisi secara massal
    protected $fillable = [
        'title',
        'author',
        'submit_year',
        'field_of_study',
        'abstract',
        'supervisor',
    ];

}
