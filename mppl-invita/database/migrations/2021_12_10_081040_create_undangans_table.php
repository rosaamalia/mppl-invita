<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jenis_undangan')->references('id')->on('jenis_undangans');
            $table->foreignId('id_order')->references('id')->on('orders');
            $table->string('tema_undangan');
            $table->date('tanggal_mulai_acara');
            $table->date('tanggal_berakhir_acara');
            $table->time('waktu_mulai_acara', $precision = 0);
            $table->time('waktu_berakhir_acara', $precision = 0);
            $table->string('lokasi_acara');
            $table->string('alamat_acara');
            $table->boolean('peta_google')->default(0);
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
        Schema::dropIfExists('undangans');
    }
}