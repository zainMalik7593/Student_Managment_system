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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('grNo')->nullable(false)->unique();
            $table->string('name')->nullable(false);
            $table->string('father_name')->nullable(false);
            $table->string('email')->nullable();
            $table->integer('age')->default(18)->nullable();
            $table->string('course')->nullable();
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->date('dob')->nullable();
            $table->string('phone_number')->nullable(false);
            $table->string('cnic')->nullable(false);
            $table->integer('timeid')->nullable(false);
            $table->integer('classid')->nullable(false);
            $table->integer('seatid')->nullable(false);
            $table->string('address',255)->nullable(false);
            $table->string('image')->nullable(true);
            $table->enum('status',[1,2,3,4])->default(1)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
