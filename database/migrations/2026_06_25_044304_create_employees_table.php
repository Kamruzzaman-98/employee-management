<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('employee_code')->unique();

            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->date('dob')->nullable();
            $table->date('joining_date')->nullable();

            $table->foreignId('department_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('designation_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->decimal('salary', 10, 2)->nullable();

            $table->string('image')->nullable();

            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
