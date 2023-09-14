<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_type'); // Тип пользователя
            $table->string('name'); // Имя
            $table->string('surname'); // Фамилия
            $table->string('email')->unique(); // email
            $table->timestamp('email_verified_at')->nullable(); // Подтвержден ли email
            $table->string('password'); // Пароль
            $table->rememberToken(); // токен авторизации
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
