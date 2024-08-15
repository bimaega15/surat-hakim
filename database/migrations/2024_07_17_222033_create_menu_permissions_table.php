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
        Schema::create('menu_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('root_mpermissions')->nullable();
            $table->integer('no_mpermissions')->nullable();
            $table->string('nama_mpermissions')->nullable();
            $table->string('link_mpermissions');
            $table->boolean('isnode_mpermissions')->default(0);
            $table->boolean('ischildren_mpermissions')->default(0);
            $table->json('childrenmenu_mpermissions')->nullable();
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
        Schema::dropIfExists('menu_permissions');
    }
};
