<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            //            $table->engine = 'InnoDB'; //Add this line, solve General error: 1824 Failed to open the referenced table
            $table->id();
            $table->bigInteger('kategori_id')->unsigned();
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->string('namabarang')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('stok')->nullable();
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
        Schema::dropIfExists('barangs');
    }
}
