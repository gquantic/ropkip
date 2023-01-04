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
        Schema::create('buyed_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('user_requisite_id')->constrained('user_requisites');
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('course_plan_id')->constrained('course_plans');
            $table->integer('price');
            $table->integer('payed')->default(0);
            $table->boolean('installment')->default(0)->comment('Оплата в рассрочку?');
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
        Schema::dropIfExists('buyed_courses');
    }
};
