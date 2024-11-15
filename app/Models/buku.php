<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;public $timestamps = false;

    protected $table = 'bukus';

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'publication_year',
        'pages',
    ];

    public function reservations()
{
    return $this->morphMany(Reservation::class, 'inventory');
}

}
