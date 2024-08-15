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
        Schema::create('informasi_sebelum', function (Blueprint $table) {
            $table->id();
            $table->string('judul_isebelum')->nullable();
            $table->text('deskripsi_isebelum')->nullable();
            $table->string('gambar_isebelum')->nullable();
            $table->bigInteger('form_surat_id')->unsigned();
            $table->timestamps();

            $table->foreign('form_surat_id')->references('id')->on('form_surat')->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi_sebelum');
    }
};
