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
            $table->unsignedBigInteger('fppp_type')->nullable();
            $table->string('production_phase')->nullable();
            $table->unsignedBigInteger('quotation_no')->nullable();
            $table->string('applicator_name')->nullable();
            $table->string('project_name')->nullable();
            $table->string('project_address')->nullable();
            $table->string('sales_name')->nullable();
            $table->unsignedBigInteger('order_status')->default('1');
            $table->string('production_time')->nullable();
            $table->string('color')->nullable();
            $table->unsignedBigInteger('glass')->nullable();
            $table->string('glass_type')->nullable();
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
