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
        Schema::create('professional_development', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Заголовок курса/мероприятия
            $table->text('description'); // Описание
            $table->string('type')->default('course'); // Тип: course, seminar, workshop, conference
            $table->string('image_path')->nullable(); // Путь к изображению
            $table->date('start_date')->nullable(); // Дата начала
            $table->date('end_date')->nullable(); // Дата окончания
            $table->string('location')->nullable(); // Место проведения
            $table->integer('participants_count')->nullable(); // Количество участников
            $table->text('objectives')->nullable(); // Цели курса (JSON или текст)
            $table->boolean('is_active')->default(true); // Активность
            $table->integer('sort_order')->default(0); // Порядок сортировки
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_development');
    }
};
