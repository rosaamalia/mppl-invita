<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndanganPernikahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangan_pernikahans', function (Blueprint $table) {
            $table->bigIncrements('id_undangan_pernikahan');
            $table->foreignId('id_undangan')->references('id_undangan')->on('undangans');
            $table->char('honorific_mempelai_lk', 5);
            $table->string('nama_mempelai_lk');
            $table->text('deskripsi_mempelai_lk');
            $table->string('orangtua_mempelai_lk')->nullable();
            $table->char('honorific_mempelai_pr', 5);
            $table->string('nama_mempelai_pr');
            $table->text('deskripsi_mempelai_pr');
            $table->string('orangtua_mempelai_pr')->nullable();
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
        Schema::dropIfExists('undangan_pernikahans');
    }
}