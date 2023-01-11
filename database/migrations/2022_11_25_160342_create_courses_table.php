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
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('category_type_id')->constrained('category_types');
            $table->string('type');
            $table->string('title');
            $table->text('description')->nullable();
            $table->json('params')->nullable();
            $table->integer('price')->comment('Цена за час');
            $table->integer('hours_per_day')->default(3)->comment('Часов обучения в день');
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
