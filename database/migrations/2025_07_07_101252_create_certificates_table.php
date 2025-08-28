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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Название сертификата
            $table->text('description')->nullable(); // Описание
            $table->string('image_path'); // Путь к изображению сертификата
            $table->string('recipient_name')->nullable(); // Имя получателя
            $table->string('organization')->nullable(); // Организация выдавшая сертификат
            $table->date('issued_date')->nullable(); // Дата выдачи
            $table->string('category')->default('general'); // Категория: course, seminar, workshop, etc.
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
        Schema::dropIfExists('certificates');
    }
};
