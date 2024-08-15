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
        Schema::create('permintaan_surat', function (Blueprint $table) {
            $table->id();
            $table->string('users_permintaan_surat')->nullable();
            $table->bigInteger('form_surat_id')->unsigned();
            $table->json('data_permintaan_surat');
            $table->timestamps();

            $table->foreign('form_surat_id')->references('id')->on('form_surat')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaan_surat');
    }
};
