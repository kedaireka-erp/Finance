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
        Schema::create('wos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fppp_id')->nullable();
            $table->date('tgl_terima_fppp')->nullable();
            $table->string('no_fppp')->nullable();
            $table->date('deadline')->nullable();
            $table->string('project')->nullable();
            $table->string('aplikator')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('kode_op')->nullable();
            $table->string('kode_unit')->nullable();
            $table->string('tipe_barang')->nullable();
            $table->date('tgl_process_kaca')->nullable();
            $table->string('user_kaca')->nullable();
            $table->date('tgl_cutting')->nullable();
            $table->string('user_cutting')->nullable();
            $table->enum('proses_cutting',['processing','completed'])->nullable();
            $table->string('keterangan')->nullable();
            $table->date('tgl_machining')->nullable();
            $table->string('user_machining')->nullable();
            $table->date('tgl_asembly')->nullable();
            $table->string('user_asembly')->nullable();
            $table->string('subcon_asembly')->nullable();
            $table->date('finish_qc')->nullable();
            $table->string('user_qc')->nullable();
            $table->date('tgl_pack')->nullable();
            $table->integer('qty_pack')->nullable();
            $table->string('user_pack')->nullable();
            $table->enum('acc_pengiriman',['ACCEPT','PENDING','ACCEPT WITH NOTE'])->default('PENDING');
            $table->text('note')->nullable();
            $table->date('tgl_tagih')->nullable();
            $table->boolean('status_tagih')->default('0');
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
        Schema::dropIfExists('wos');
    }
};
