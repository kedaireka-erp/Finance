<?php

use App\Models\Item_type;
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
        Schema::table('item', function (Blueprint $table) {
            $table ->unsignedBigInteger('item_type_id')->default(1)->after('id');
            $table -> foreign('item_type_id')->references('id')->on('item_types')->after('id')->default(1);
            // di delete ga bisa, di update bisa (onDelete dan on Cascade)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item', function (Blueprint $table) {
        // $table ->dropForeign('item_item_type_id_foreign');
        // $table -> dropColumn('item_type_id');
        });
    }
};
