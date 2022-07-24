<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('jenjang_pendidikan')->nullable();
            $table->string('institusi')->nullable();
            $table->string('no_karpeg')->nullable();
            $table->date('tmt')->nullable();
            $table->integer('bulan_lama')->nullable();
            $table->integer('tahun_lama')->nullable();
            $table->integer('bulan_baru')->nullable();
            $table->integer('tahun_baru')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('jenjang_pendidikan');
            $table->dropColumn('institusi');
            $table->dropColumn('no_karpeg');
            $table->dropColumn('tmt');
            $table->dropColumn('bulan_lama');
            $table->dropColumn('tahun_lama');
            $table->dropColumn('bulan_baru');
            $table->dropColumn('tahun_baru');
        });
    }
}
