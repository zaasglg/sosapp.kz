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
        Schema::create('project_members', function (Blueprint $table) {
            $table->id();
            $table->string('full_name'); // Полное имя участника
            $table->string('position'); // Должность/роль в проекте
            $table->text('description')->nullable(); // Описание/биография
            $table->string('avatar_path')->nullable(); // Путь к фото/аватару
            $table->string('department')->nullable(); // Отдел/подразделение
            $table->string('specialization')->nullable(); // Специализация
            $table->string('email')->nullable(); // Email
            $table->string('phone')->nullable(); // Телефон
            $table->string('linkedin_url')->nullable(); // LinkedIn профиль
            $table->string('telegram_username')->nullable(); // Telegram username
            $table->json('skills')->nullable(); // Навыки (массив)
            $table->json('projects')->nullable(); // Проекты (массив)
            $table->date('joined_date')->nullable(); // Дата присоединения к проекту
            $table->string('status')->default('active'); // Статус: active, inactive, alumni
            $table->boolean('is_featured')->default(false); // Выделенный участник
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
        Schema::dropIfExists('project_members');
    }
};
