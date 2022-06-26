<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('output')->nullable();
            $table->decimal('credit')->nullable();
            $table->foreignId('element_id')->constrained('elements');
            $table->foreignId('sub_element_id')->constrained('sub_elements');
            $table->enum('type', ['TUGAS', 'PPP'])->default('TUGAS');
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
        Schema::dropIfExists('activities');
    }
}
