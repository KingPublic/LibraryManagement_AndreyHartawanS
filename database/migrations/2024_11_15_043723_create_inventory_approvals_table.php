<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_approvals', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');  // Name of the item being requested
            $table->string('requested_by');  // Who requested the update (admin or librarian)
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');  // Status of the request
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_approvals');
    }
};
