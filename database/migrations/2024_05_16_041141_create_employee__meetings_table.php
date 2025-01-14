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
        Schema::create('employee__meetings', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id',20)->nullable();
            $table->string('meeting_id',20)->nullable();
            $table->string('image',)->nullable();
            $table->string('status',1)->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee__meetings');
    }
};
