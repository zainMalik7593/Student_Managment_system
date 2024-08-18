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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('father_name')->nullable(false);
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->integer('age')->default(18)->nullable();
            $table->string('cnic')->nullable(false);
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable(false);
            $table->date('dob')->nullable();
            $table->string('address',255)->nullable(false);
            $table->string('image')->nullable(false);
            $table->boolean('status')->nullable(false)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
