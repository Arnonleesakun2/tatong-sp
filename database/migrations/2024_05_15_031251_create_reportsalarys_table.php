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
        Schema::create('reportsalarys', function (Blueprint $table) {
            $table->id();
            $table->date('datecal')->nullable();
            $table->integer('bonus')->nullable();
            $table->integer('missingwork')->nullable();
            $table->integer('lostproduct')->nullable();
            $table->integer('poicefine')->nullable();
            $table->integer('transportfine')->nullable();
            $table->integer('welfareloan')->nullable();
            $table->integer('ava')->nullable();
            $table->integer('drivinginsurance')->nullable();
            $table->integer('storefront')->nullable();
            $table->integer('total')->nullable();
            $table->string('status',1)->default('1');
            $table->string('employee_id',20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportsalarys');
    }
};
