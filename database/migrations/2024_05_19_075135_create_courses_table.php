<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('teacherid');
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->enum('language',['english', 'korean'])->default('english');
            $table->enum('type',['online', 'offline'])->default('online');
            $table->string('photo')->default('/images/avatar.jpg');
            $table->string('video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
