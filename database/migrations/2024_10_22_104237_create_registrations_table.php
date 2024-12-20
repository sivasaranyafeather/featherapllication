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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no')->unique(); 
            $table->string('working_type')->nullable(); 
            $table->string('name_domain')->nullable(); 
            $table->string('name'); 
            $table->date('date_of_birth'); 
            $table->string('mobile', 10)->nullable(); 
            $table->string('mail'); 
            $table->string('working_status')->nullable(); 
            $table->string('parents_contact', 10)->nullable(); 
            $table->string('branch')->nullable(); 
            $table->text('address')->nullable(); 
            $table->text('reason')->nullable(); 
            $table->unsignedBigInteger('college_id')->nullable();
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('set null');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null'); 
            $table->string('year')->nullable(); 
            $table->date('date_of_joining'); 
            $table->integer('intern_days')->nullable(); 
            $table->string('lead_source')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
      */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
