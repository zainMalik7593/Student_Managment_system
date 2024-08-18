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
        Schema::create('super_admin', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('father_name')->nullable(false);
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->integer('age')->default(18)->nullable();
            $table->string('email')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('image')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('super_admin');
    }
};
