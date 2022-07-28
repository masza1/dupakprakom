<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees');
            $table->string('number', 50)->nullable();
            $table->date('submission_date')->nullable();
            $table->enum('semester', ['Semester 1', 'Semester 2'])->default('Semester 1');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('surat_pengantar', 255)->nullable();
            $table->boolean('sp_valid')->default(false);
            $table->string('matriks_pengajuan', 255)->nullable();
            $table->boolean('matriks_valid')->default(false);
            $table->string('sk_pangkat', 255)->nullable();
            $table->boolean('pangkat_valid')->default(false);
            $table->string('sk_kenaikan', 255)->nullable();
            $table->boolean('kenaikan_valid')->default(false);
            $table->string('pak_terakhir', 255)->nullable();
            $table->boolean('pak_valid')->default(false);
            $table->string('skp1', 255)->nullable();
            $table->boolean('skp1_valid')->default(false);
            $table->string('skp2', 255)->nullable();
            $table->boolean('skp2_valid')->default(false);
            $table->string('ijazah', 255)->nullable();
            $table->boolean('ijazah_valid')->default(false);
            $table->string('spmk', 255)->nullable();
            $table->boolean('spmk_valid')->default(false);
            $table->text('catatan_penilai')->nullable();
            $table->enum('status', ['DRAFT', 'PENGAJUAN', 'TELAH DINILAI', 'TOLAK', 'REVISI'])->default('DRAFT');
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
        Schema::dropIfExists('submissions');
    }
}
