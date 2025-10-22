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
        // Disabled duplicate migration: the package's migration creates these tables.
        // Leaving the file in place but turning it into a no-op prevents duplicate table errors during tests.
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
