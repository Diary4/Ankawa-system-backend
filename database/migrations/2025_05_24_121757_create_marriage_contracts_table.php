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
          Schema::create('marriage_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Who entered it
            $table->enum('type', ['muslim', 'christian', 'daraki']);
            $table->string('judge_name');
            $table->string('phone');
            $table->date('marriage_date');
            $table->string('witness1_name');
            $table->string('witness2_name');
            $table->string('marray_peshaki');
            $table->string('marray_pashaki');
            $table->boolean('peshaki_wargirawa');
            $table->boolean('pashaki_wargirawa');
            $table->string('tayfa')->nullable(); 
            $table->string('kanisa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriage_contracts');
    }
};
