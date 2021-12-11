<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndanganUlangTahunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangan_ulang_tahuns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_undangan')->references('id')->on('undangans');
            $table->char('honorific_ulangtahun', 5);
            $table->date('tanggal_lahir_ulangtahun');
            $table->text('deskripsi_ulangtahun')->nullable();
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
        Schema::dropIfExists('undangan_ulang_tahuns');
    }
}