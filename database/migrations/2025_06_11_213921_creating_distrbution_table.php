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
        Schema::create('distribution_document', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'user_id')->nullable();
            $table->string('the_late_name');
            $table->string('farmanga');
            $table->string('date_of_death');
            $table->string('location');
            $table->string('demander')->nullable();
            $table->string('page');
            $table->string('record');
            $table->string('judge');
            $table->string('phone')->nullable();
            $table->string('witness1_name')->nullable();
            $table->string('witness2_name')->nullable();
            $table->string('details')->nullable();
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
