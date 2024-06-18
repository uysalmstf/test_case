<?php

use App\Enums\IntegrationEnums;
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
        Schema::create('integration', function (Blueprint $table) {
            $table->id();

            $integrationEnumValues = array_column(IntegrationEnums::cases(), 'value');
            $table->enum('integration', $integrationEnumValues);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integration');
    }
};
