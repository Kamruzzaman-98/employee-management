<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->date('attendance_date');

            $table->dateTime('check_in')->nullable();
            $table->dateTime('check_out')->nullable();

            $table->integer('working_minutes')->default(0);
            $table->integer('late_minutes')->default(0);
            $table->integer('overtime_minutes')->default(0);

            $table->enum('status', [
                'present',
                'late',
                'absent',
                'leave',
                'holiday',
                'weekend',
                'half_day'
            ])->default('present');

            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->unique(['employee_id', 'attendance_date']);
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
