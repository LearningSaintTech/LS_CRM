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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('siteId')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('course')->nullable();
            $table->string('phone')->nullable();
            $table->string('supportType')->nullable();
            $table->timestamp('meetingDate')->nullable();
            $table->text('meetingLink')->nullable();
            $table->text('message')->nullable();
            $table->string('level')->nullable();
            $table->bigInteger('vendor_id')->nullable();
            $table->boolean('status')->default(1)->comment('1=Active, 0=Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
