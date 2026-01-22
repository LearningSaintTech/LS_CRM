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
        Schema::create('vendoruser', function (Blueprint $table) {
            $table->id();
            $table->string('name' ,200)->nullable();
            $table->string('email' ,100)->nullable();
            $table->string('phone' ,20)->nullable();
            $table->string('description' ,500)->nullable();
            $table->boolean('status')->default(1)->comment('1=Active, 0=Inactive');
            $table->bigInteger('vendor_id');
            $table->bigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendoruser');
    }
};
