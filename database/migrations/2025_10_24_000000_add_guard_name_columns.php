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
        // Add guard_name to permissions table if missing
        if (! Schema::hasColumn('permissions', 'guard_name')) {
            Schema::table('permissions', function (Blueprint $table) {
                $table->string('guard_name')->nullable()->default('');
                // ensure uniqueness with name when guard exists
                try {
                    $table->unique(['name', 'guard_name']);
                } catch (\Throwable $e) {
                    // ignore if index exists
                }
            });
        }

        // Add guard_name to roles table if missing
        if (! Schema::hasColumn('roles', 'guard_name')) {
            Schema::table('roles', function (Blueprint $table) {
                $table->string('guard_name')->nullable()->default('');
                try {
                    $table->unique(['name', 'guard_name']);
                } catch (\Throwable $e) {
                    // ignore if index exists
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('permissions', 'guard_name')) {
            Schema::table('permissions', function (Blueprint $table) {
                // drop unique index if exists
                try {
                    $table->dropUnique(['name', 'guard_name']);
                } catch (\Throwable $e) {
                }
                $table->dropColumn('guard_name');
            });
        }

        if (Schema::hasColumn('roles', 'guard_name')) {
            Schema::table('roles', function (Blueprint $table) {
                try {
                    $table->dropUnique(['name', 'guard_name']);
                } catch (\Throwable $e) {
                }
                $table->dropColumn('guard_name');
            });
        }
    }
};