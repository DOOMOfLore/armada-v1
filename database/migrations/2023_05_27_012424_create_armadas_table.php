<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armada', function (Blueprint $table) {
            $table->increments('armada_id');
            $table->string('armada_name', 150);
            $table->text('armada_desc');
            $table->enum('status', ['1', '2'])->comment('"Active", "Inactive"' )->default('1');
            $table->string('kategori_name', 200);
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
        Schema::dropIfExists('armadas');
    }
}
