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
        Schema::create('ChangePassword_request', function (Blueprint $table) {
            $table->id();
            $table->integer('changeid')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('old_password')->nullable(false);
            $table->string('new_password')->nullable(false);
            $table->enum('user_type',['admin','student'])->nullable(false);
            $table->enum('request_status',['Pending','Accept','Reject'])->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ChangePassword_request');
    }
};
