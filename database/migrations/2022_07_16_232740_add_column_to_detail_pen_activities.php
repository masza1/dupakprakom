<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToDetailPenActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_pen_activities', function (Blueprint $table) {
            $table->boolean('spt_valid')->default(false);
            $table->boolean('bukti1_valid')->default(false);
            $table->boolean('bukti2_valid')->default(false);
            $table->boolean('bukti3_valid')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_pen_activities', function (Blueprint $table) {
            $table->dropColumn('spt_valid');
            $table->dropColumn('bukti1_valid');
            $table->dropColumn('bukti2_valid');
            $table->dropColumn('bukti3_valid');
        });
    }
}
