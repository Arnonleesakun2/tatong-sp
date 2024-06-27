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
        Schema::create('salarys', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('event_id')->nullable();
            $table->string('status',1)->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salarys');
    }
};
