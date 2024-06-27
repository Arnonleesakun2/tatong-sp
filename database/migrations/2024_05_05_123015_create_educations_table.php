<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('yearstart')->nullable();
            $table->string('yearend')->nullable();
            $table->string('location')->nullable();
            $table->string('degree')->nullable();
            $table->string('gpa')->nullable();
            $table->string('major')->nullable();
            $table->string('employee_id',10)->nullable();
            $table->string('status',1)->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
