<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;public $timestamps = false;

    // Define the table name (optional if it follows Laravel's conventions)
    protected $table = 'reservations';

    // Define the fillable fields (attributes that can be mass assigned)
    protected $fillable = [
        'user_id',
        'inventory_type', // Book, CD, Newspaper, etc.
        'inventory_id',   // The ID of the specific inventory item (e.g., book, CD)
        'status',          // Pending, Approved, Rejected
        'due_date',        // The due date for the reservation
    ];

    // Define relationships, assuming a reservation belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship for inventory, depending on the inventory type
    public function inventory()
    {
        return $this->morphTo();
    }
}
