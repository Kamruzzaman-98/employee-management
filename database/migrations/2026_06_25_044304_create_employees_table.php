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

            // link to login user
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // employee identity
            $table->string('employee_code')->unique();

            // personal info
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->string('image')->nullable();

            // job info
            $table->foreignId('department_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('designation_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->date('joining_date')->nullable();
            $table->decimal('salary', 10, 2)->nullable();

            $table->enum('status', ['active', 'inactive', 'terminated'])
                ->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
