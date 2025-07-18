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
            $table->id()->autoIncrement();
            $table->foreignId('department_id')->nullable()->index();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('cpf')->nullable();
            $table->string('password', 200);
            $table->string('role', 50)->nullable();
            $table->string('permissions', 1000)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('user_id');
            $table->string('address');
            $table->string('number');
            $table->string('bairro' );
            $table->string('cidade', 45);
            $table->string('cep', 9);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_addresses');
        //Schema::dropIfExists('password_reset_tokens');
    }
};
