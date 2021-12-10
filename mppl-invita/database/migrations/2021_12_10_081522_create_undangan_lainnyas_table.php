<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndanganLainnyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangan_lainnyas', function (Blueprint $table) {
            $table->bigIncrements('id_undangan_lainnya');
            $table->foreignId('id_undangan')->references('id_undangan')->on('undangans');
            $table->string('judul_acara');
            $table->text('deskripsi_acara');
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
        Schema::dropIfExists('undangan_lainnyas');
    }
}