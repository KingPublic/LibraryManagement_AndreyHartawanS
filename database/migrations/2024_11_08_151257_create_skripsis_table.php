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
        Schema::create('skripsis', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul skripsi
            $table->string('author'); // Nama penulis skripsi
            $table->year('submit_year'); // Tahun serah skripsi
            $table->string('field_of_study')->nullable(); // Bidang studi
            $table->text('abstract')->nullable(); // Abstrak dari skripsi
            $table->string('supervisor')->nullable(); // Nama pembimbing skripsi
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skripsis');
    }
};
