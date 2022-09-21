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
        Schema::create('rekap_subkons', function (Blueprint $table) {
            $table->id();
            $table->foreignId("work_order_id")->constrained("work_orders")->onUpdate("cascade");
            $table->unsignedBigInteger('assembly_id')->nullable();
            $table->integer('kode_assembly')->nullable();
            $table->date('tgl_tagih')->nullable();
            $table->boolean('status_tagih')->default('0');
            $table->double('jumlah_daun')->default('0');
            $table->double('keliling_kaca')->default('0');
            $table->double('harga_jasa')->default('0');
            $table->double('total_biaya')->default('0');
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
        Schema::dropIfExists('rekap_subkons');
    }
};
