<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // no-op: handled by Spatie package migration
        return;
    }

    public function down(): void
    {
        Schema::dropIfExists('model_has_permissions');
        // no-op
        return;
    }
};
