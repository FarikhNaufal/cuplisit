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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('gender', ['male', 'female', 'undefined']);
            $table->string('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->string('pob');
            $table->date('dob');
            $table->rememberToken();
            $table->timestamps();
        });
        // 'username',
        // 'name',
        // 'email',
        // 'password',
        // 'avatar',
        // 'bio',
        // 'gender',
        // 'pob',
        // 'dob',
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
