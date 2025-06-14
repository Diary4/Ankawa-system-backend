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
            $table->integer('number_of_childs')->nullable()->after('tayfa'); // Add after 'tayfa' or adjust as needed
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
