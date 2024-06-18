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
        Schema::table('integration', function (Blueprint $table) {
            $table->string('username')->default('');
            $table->string('password')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('integration', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('password');
        });
    }
};
