<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;public $timestamps = false;

    protected $table = 'jurnals';

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'publication_year',
        'description',
    ];
}
