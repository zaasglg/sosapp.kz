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
        Schema::create('scientific_results', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Заголовок
            $table->text('description'); // Описание
            $table->string('type')->default('article'); // Тип: article, interview, social_media
            $table->string('source')->nullable(); // Источник (сайт, издание)
            $table->string('url')->nullable(); // Ссылка на статью/интервью
            $table->string('pdf_path')->nullable(); // Путь к PDF файлу
            $table->date('published_at')->nullable(); // Дата публикации
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
        Schema::dropIfExists('scientific_results');
    }
};
