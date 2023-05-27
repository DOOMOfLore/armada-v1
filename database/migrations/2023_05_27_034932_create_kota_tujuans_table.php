<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotaTujuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kota_tujuan', function (Blueprint $table) {
            $table->increments('kota_id');
            $table->string('kota_name');
            $table->string('lokasi_berhenti');
            $table->string('kota_desc');
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
        Schema::dropIfExists('kota_tujuans');
    }
}
