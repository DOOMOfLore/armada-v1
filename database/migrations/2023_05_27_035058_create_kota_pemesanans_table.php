<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotaPemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kota_pemesanan', function (Blueprint $table) {
            $table->increments('pemesanan_id');
            $table->string('nama_pemesanan');
            $table->string('email_pemesanan');
            $table->integer('nomor_pemesanan');
            $table->string('bukti_bayar');
            $table->unsignedInteger('armada_id')->length(10);
            $table->unsignedInteger('kategori_id')->length(10);
            $table->unsignedInteger('kota_id')->length(10);
            $table->unsignedInteger('agen_id')->length(10);
            $table->enum('status', ['1', '2'])->comment('"Active", "Inactive"' )->default('1');
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
        Schema::dropIfExists('kota_pemesanans');
    }
}
