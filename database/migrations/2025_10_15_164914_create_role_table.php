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
        // no-op: Spatie's migration creates the roles table
        return;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // no-op
        return;
    }
};
