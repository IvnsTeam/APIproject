<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('api_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('issued_user')->nullable(); // Пользователь выдавший ключ
            $table->string('accepted_user')->nullable(); // Пользователь получивший ключ
            $table->string('api_token')->unique(); // API-Ключ
            $table->boolean('token_activity')->default(true); // Активность ключа
        });
    }

    public function down()
    {
        Schema::dropIfExists('api_tokens');
    }
};
