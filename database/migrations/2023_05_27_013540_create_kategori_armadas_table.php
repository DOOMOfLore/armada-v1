<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriArmadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_armada', function (Blueprint $table) {
            $table->increments('kategori_id');
            $table->string('kategori_name');
            $table->enum('kategori_kelas', ['1', '2'])->comment('"Regular", "Eksekutif"' );
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
        Schema::dropIfExists('kategori_armadas');
    }
}
