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
        Schema::create('detail_quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quotation_id')->default(1);
            $table->foreign('quotation_id')->references('id')->on('quotations')->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->integer('id_kode_gambar')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('kode_item')->nullable();
            $table->string('kode_tipe')->nullable();
            $table->string('daun')->nullable();
            $table->string('kode_warna')->nullable();
            $table->double('keliling')->nullable();
            $table->double('panjang')->nullable();
            $table->double('lebar')->nullable();
            $table->double('harga')->nullable();
            $table->integer('qty')->nullable();
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
        Schema::dropIfExists('detail_quotations');
    }
};
