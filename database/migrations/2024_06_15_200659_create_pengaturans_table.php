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
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->id();
            $table->string('namaaplikasi_pengaturan');
            $table->string('namainstansi_pengaturan');
            $table->string('alamat_pengaturan')->nullable();
            $table->string('notelepon_pengaturan')->nullable();
            $table->string('deskripsi_pengaturan')->nullable();
            $table->string('logoaplikasi_pengaturan')->nullable();
            $table->string('video_pengaturan')->nullable();
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
        Schema::dropIfExists('pengaturan');
    }
};
