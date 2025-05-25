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
        Schema::table('marriage_contracts', function (Blueprint $table) {
            $table->string('kanisa')->nullable()->after('pashaki_wargirawa'); // Adding kanisa column after tayfa
            $table->string('tayfa')->nullable()->after('kanisa'); // Adding tayfa column after kanisa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('marriage_contracts', function (Blueprint $table) {
            //
        });
    }
};
