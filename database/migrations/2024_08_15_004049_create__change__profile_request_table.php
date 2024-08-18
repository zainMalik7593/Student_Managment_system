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
        Schema::create('change_profile_request', function (Blueprint $table) {
            $table->id();
            $table->integer('changeid')->nullable(false);
            $table->string('from_name')->nullable(false);
            $table->string('to_name')->nullable(false);
            $table->string('from_father')->nullable(false);
            $table->string('to_father')->nullable(false);
            $table->integer('from_age')->default(18)->nullable();
            $table->integer('to_age')->default(18)->nullable();
            $table->string('from_cnic')->nullable(false);
            $table->string('to_cnic')->nullable(false);
            $table->string('from_email')->nullable();
            $table->string('to_email')->nullable();
            $table->string('from_phoneNo')->nullable(false);
            $table->string('to_phoneNo')->nullable(false);
            $table->date('from_dob')->nullable();
            $table->date('to_dob')->nullable();
            $table->string('from_address',255)->nullable(false);
            $table->string('to_address',255)->nullable(false);
            $table->string('from_img')->nullable(true);
            $table->string('to_img')->nullable(true);
            $table->enum('usertype',['admin','student'])->nullable(false);
            $table->enum('gender',['Male','Female','Other'])->nullable(false);
            $table->enum('request_status',['Pending','Accept','Reject'])->default('Pending')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('change_profile_request');
    }
};
