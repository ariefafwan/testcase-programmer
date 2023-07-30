<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_penduduks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kartu_keluarga_id')->unsigned();
            $table->foreign('kartu_keluarga_id')->references('id')->on('kartu_keluargas')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('nik')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->char('village_id');
            $table->foreign('village_id')->references('id')->on('villages')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nomor_hp');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penduduks');
    }
};
