<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pen_activities', function (Blueprint $table) {
            $table->id();
            $table->year('year')->nullable();
            $table->string('semester')->nullable();
            $table->enum('match_position', ['SESUAI', 'DIBAWAH', 'DIATAS'])->default('SESUAI');
            $table->integer('jumlah')->nullable();
            $table->decimal('total_credit')->nullable();
            $table->decimal('approve_credit')->nullable();
            $table->text('description')->nullable();
            $table->string('file_spt')->nullable();
            $table->string('file_bukti1')->nullable();
            $table->string('file_bukti2')->nullable();
            $table->string('file_bukti3')->nullable();
            $table->foreignId('submission_id')->constrained('submissions')->onDelete('cascade');
            $table->foreignId('pen_activity_id')->constrained('pen_activities')->onDelete('cascade');
            // $table->foreignId('element_id')->nullable()->constrained('elements')->nullOnDelete();
            // $table->foreignId('sub_element_id')->nullable()->constrained('sub_elements')->nullOnDelete();
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
        Schema::dropIfExists('detail_pen_activities');
    }
}
