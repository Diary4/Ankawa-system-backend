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
        Schema::create('death_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('gender')->nullable();
            $table->string('death_location')->nullable();
            $table->string('date_of_death')->nullable();
            $table->string('religion')->nullable(); 
            $table->date('nationality')->nullable();
            $table->string('demander')->nullable();
            $table->string('location')->nullable();
            $table->string('related_to_death')->nullable(); // Type of death document (e.g., natural, accidental)
            $table->string('judge')->nullable();
            $table->string('phone')->nullable(); // Default phone number if not provided
            $table->string('witness1_name')->nullable();
            $table->string('witness2_name')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
