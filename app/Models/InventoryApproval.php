<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryApproval extends Model
{
    use HasFactory;

    // Define the table name if it is not the plural form of the model name
    protected $table = 'inventory_approvals'; // Adjust if necessary

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        'item_name',       // Name of the item being requested for update
        'requested_by',    // Who requested the update (can be librarian, admin, etc.)
        'status',          // 'pending', 'approved', 'rejected'
    ];

    // If you need to define the status as constants (optional)
    const PENDING = 'pending';
    const APPROVED = 'approved';
    const REJECTED = 'rejected';

    // Optionally, you can define the available status values for validation or any use
    public static function statusOptions()
    {
        return [
            self::PENDING => 'Pending',
            self::APPROVED => 'Approved',
            self::REJECTED => 'Rejected',
        ];
    }
}
