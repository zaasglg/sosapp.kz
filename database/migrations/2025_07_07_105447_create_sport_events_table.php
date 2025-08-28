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
        Schema::create('sport_events', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Название мероприятия
            $table->text('description'); // Описание
            $table->string('type'); // Тип: tournament, competition, marathon, training, etc.
            $table->json('images')->nullable(); // Массив путей к изображениям
            $table->string('location')->nullable(); // Место проведения
            $table->date('start_date'); // Дата начала
            $table->date('end_date')->nullable(); // Дата окончания
            $table->time('start_time')->nullable(); // Время начала
            $table->integer('participants_limit')->nullable(); // Лимит участников
            $table->integer('participants_count')->default(0); // Текущее количество участников
            $table->decimal('entry_fee', 10, 2)->nullable(); // Стоимость участия
            $table->text('requirements')->nullable(); // Требования к участникам
            $table->text('prizes')->nullable(); // Призы
            $table->string('contact_person')->nullable(); // Контактное лицо
            $table->string('contact_phone')->nullable(); // Телефон для связи
            $table->string('contact_email')->nullable(); // Email для связи
            $table->boolean('is_active')->default(true); // Активность
            $table->boolean('is_featured')->default(false); // Рекомендуемое
            $table->integer('sort_order')->default(0); // Порядок сортировки
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sport_events');
    }
};
