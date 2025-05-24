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
        Schema::create('grooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('marriage_contract_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->date('dob');
            $table->string('nationality');
            $table->string('occupation');
            $table->string('address');
            $table->string('religion');
            $table->string('marital_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grooms');
    }
};
