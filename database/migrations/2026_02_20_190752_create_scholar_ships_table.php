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
        Schema::create('scholar_ships', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vendor_id');
            $table->bigInteger('vendor_user_id');
            $table->bigInteger('siteId');
            $table->string('source')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('address1')->nullable();
            $table->string('city1')->nullable();
            $table->string('state1')->nullable();
            $table->string('zip1')->nullable();
            $table->string('citizenShip')->nullable();
            $table->string('ssn')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('motherName')->nullable();
            $table->string('education')->nullable();
            $table->string('institute')->nullable();
            $table->string('degree')->nullable();
            $table->string('graduationYear')->nullable();
            $table->string('scholarship')->nullable();
            $table->string('scholarshipDetails')->nullable();
            $table->string('financialAid')->nullable();
            $table->string('financialAidDetails')->nullable();
            $table->string('employment')->nullable();
            $table->string('employer')->nullable();
            $table->string('job')->nullable();
            $table->string('employmentType')->nullable();
            $table->string('annualIncome')->nullable();
            $table->string('incomeFrequency')->nullable();
            $table->string('expenses')->nullable();
            $table->string('course')->nullable();
            $table->string('reason')->nullable();
            $table->string('goals')->nullable();
            $table->string('dlFront')->nullable();
            $table->string('dlBack')->nullable();
            $table->string('utilityBill')->nullable();
            $table->string('payStubs')->nullable();
            $table->string('w2Form')->nullable();
            $table->string('unemploymentStatement')->nullable();
            $table->string('bankStatement')->nullable();
            $table->string('bankHolderName')->nullable();
            $table->string('bankName')->nullable();
            $table->string('bankAddress')->nullable();
            $table->string('bankStreet')->nullable();
            $table->string('bankCity')->nullable();
            $table->string('bankState')->nullable();
            $table->string('bankZip')->nullable();
            $table->string('accountNo')->nullable();
            $table->string('routingNo')->nullable();
            $table->string('swiftBicCode')->nullable();
            $table->string('accountType')->nullable();
            $table->string('bankContact')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholar_ships');
    }
};
