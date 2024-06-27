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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('image',)->nullable();
            $table->date('date')->nullable();
            $table->date('brithday')->nullable();
            $table->string('name');
            $table->string('nickname');
            $table->string('address',);
            $table->string('cardaddress')->nullable();
            $table->string('tel',10);
            $table->string('idcard')->nullable();
            $table->string('pobirth')->nullable();
            $table->string('age')->nullable();
            $table->string('needsalary')->nullable();
            $table->string('towork')->nullable();
            $table->string('status',1)->default('1');

            $table->string('prefix_id',20);
            $table->string('nationlity_id',20);
            $table->string('race_id',20);
            $table->string('religion_id',20);
            $table->string('psts_id',20)->nullable();
            $table->string('typemilitary_id',20)->nullable();
            $table->string('divingcard_id',20)->nullable();
            $table->string('cartype_id',20)->nullable();
            $table->string('position_id',20);
            $table->string('tyepeducation_id',20)->nullable();
            $table->string('mainline_id',20)->nullable();
            $table->string('company_id',20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
