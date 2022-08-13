<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('submission_id')->nullable()->constrained('submissions')->onDelete('cascade');
            $table->float('nilai_lama1')->nullable();
            $table->float('nilai_baru1')->nullable();
            $table->float('nilai_lama2')->nullable();
            $table->float('nilai_baru2')->nullable();
            $table->float('nilai_lama3')->nullable();
            $table->float('nilai_baru3')->nullable();
            $table->float('nilai_lama4')->nullable();
            $table->float('nilai_baru4')->nullable();
            $table->float('nilai_lama5')->nullable();
            $table->float('nilai_baru5')->nullable();
            $table->boolean('isNew')->nullable();
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
        Schema::dropIfExists('nilais');
    }
}
