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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role'); // Make sure the role column is here
            $table->timestamps();
        });
    }

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('username');  // Menghapus kolom username
        $table->dropColumn('role');  // Menghapus kolom role
    });
}

};
