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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("fppp_id")->constrained("fppps")->onUpdate("cascade");
            $table->string("kode_op")->nullable();
            $table->string("kode_unit")->nullable();
            $table->string("nama_item")->nullable();
            $table->string("jenis_kaca")->nullable();
            $table->date("tanggal_kaca")->nullable();
            $table->string("user_kaca")->nullable();
            $table->datetime("tanggal_cutting")->nullable();
            $table->string("subkon1_cutting")->nullable();
            $table->string("lead1_cutting")->nullable();
            $table->string("subkon2_cutting")->nullable();
            $table->string("lead2_cutting")->nullable();
            $table->enum("proses_cutting", ["progress", "completed"])->nullable();
            $table->datetime("tanggal_machining")->nullable();
            $table->string("subkon1_machining")->nullable();
            $table->string("lead1_machining")->nullable();
            $table->string("subkon2_machining")->nullable();
            $table->string("lead2_machining")->nullable();
            $table->datetime("tanggal_assembly1")->nullable();
            $table->string("subkon1_assembly1")->nullable();
            $table->string("lead1_assembly1")->nullable();
            $table->string("subkon2_assembly1")->nullable();
            $table->string("lead2_assembly1")->nullable();
            $table->enum("process_assembly1", ["Assembly", "Las", "Cek Opening", "Pasang Kaca", "Sealant Kaca"])->nullable();
            $table->datetime("tanggal_assembly2")->nullable();
            $table->string("subkon1_assembly2")->nullable();
            $table->string("lead1_assembly2")->nullable();
            $table->string("subkon2_assembly2")->nullable();
            $table->string("lead2_assembly2")->nullable();
            $table->enum("process_assembly2", ["Assembly", "Las", "Cek Opening", "Pasang Kaca", "Sealant Kaca"])->nullable();
            $table->datetime("tanggal_assembly3")->nullable();
            $table->string("subkon1_assembly3")->nullable();
            $table->string("lead1_assembly3")->nullable();
            $table->string("subkon2_assembly3")->nullable();
            $table->string("lead2_assembly3")->nullable();
            $table->enum("process_assembly3", ["Assembly", "Las", "Cek Opening", "Pasang Kaca", "Sealant Kaca"])->nullable();
            $table->datetime("tanggal_packing")->nullable();
            $table->string("subkon1_packing")->nullable();
            $table->string("lead1_packing")->nullable();
            $table->string("subkon2_packing")->nullable();
            $table->string("lead2_packing")->nullable();
            $table->integer("qty_packing")->nullable();
            $table->integer('qty')->nullable();
            $table->enum("status_hold", ["hold", "revisi", "cancel"])->nullable();
            $table->enum("last_process", ["queued", "cutting", "machining", "assembly", "qc", "packing", "on delivery", "delivered"])->nullable();
            $table->date("tanggal_kirim")->nullable();
            $table->string("no_surat_jalan")->nullable();
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
        Schema::dropIfExists('work_orders');
    }
};
