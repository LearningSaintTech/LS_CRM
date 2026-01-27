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
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('sitename' ,200)->nullable();
            $table->string('url')->nullable();
            $table->bigInteger('vendor_id');
            $table->string('email')->nullable();
            $table->boolean('status')->default(1)->comment('1=Active, 0=Inactive');
            $table->string('logoUrl')->nullable();
            $table->string('smtpPassword')->nullable();
            $table->string('smtpHost')->nullable();
            $table->string('smtpPort')->nullable();
            $table->string('smtpEmail')->nullable();
            $table->string('certificateAuthority')->nullable();
            $table->string('certificateUrl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('websites');
    }
};
