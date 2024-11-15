<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key for users
            $table->string('inventory_type');  // The type of inventory (book, cd, etc.)
            $table->unsignedBigInteger('inventory_id'); // Foreign key for inventory items
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status of the reservation
            $table->date('due_date'); // The due date for the reserved item
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
