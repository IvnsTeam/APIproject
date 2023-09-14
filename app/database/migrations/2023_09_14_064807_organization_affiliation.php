<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('organization_affiliation', function (Blueprint $table) {
            $table->id();
            $table->string('user_id'); // ID-пользователя
            $table->string('organization_id'); // ID-организации
        });
    }

    public function down()
    {
        Schema::dropIfExists('organization_affiliation');
    }
};
