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
        Schema::create('gym_locator', function (Blueprint $table) {
            $table->id();
            $table->integer('gym_id');
            $table->string('nama_gym');
            $table->string('foto_gym')->nullable();
            $table->string('alamat');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('deskripsi_gym');
            $table->integer('nomor_telepon');
            $table->string('nama_fasilitas');
            $table->string('deskripsi_fasilitas');
            $table->string('jenis_member');
            $table->string('harga_member');
            $table->string('harga_visit');
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
        Schema::dropIfExists('gym_locator');
    }
};
