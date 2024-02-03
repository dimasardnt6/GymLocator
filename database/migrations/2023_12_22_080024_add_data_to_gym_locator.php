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
        Schema::table('gym_locator', function (Blueprint $table) {
            $table->string('jam_operasional');
            $table->string('fasilitas_gym');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gym_locator', function (Blueprint $table) {
            $table->string('nama_fasilitas');
            $table->string('deskripsi_fasilitas');
            $table->string('jenis_member');
        });
    }
};
