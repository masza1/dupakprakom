<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('level_id')->nullable()->constrained('levels')->onDelete('cascade');
            $table->string('nip', 20);
            $table->string('name');
            $table->foreignId('group_id')->nullable()->constrained('groups');
            $table->foreignId('position_id')->nullable()->constrained('positions');
            $table->foreignId('unit_id')->nullable()->constrained('units');
            $table->string('birthplace')->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('gender', ['L', 'P']);
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
        Schema::dropIfExists('employees');
    }
}
