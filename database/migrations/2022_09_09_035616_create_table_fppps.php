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
        Schema::create('fppps', function (Blueprint $table) {
            $table->id();
            $table->string('fppp_no')->nullable();
            $table->unsignedBigInteger('quotation_id')->nullable();
            $table->string('applicator_name')->nullable();
            $table->string('project_name')->nullable();
            $table->unsignedBigInteger('order_status')->default('1');
            $table->enum('acc_produksi',['ACCEPT','PENDING'])->default('PENDING');
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
        Schema::dropIfExists('fppps');
    }
};
