<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("events", function (Blueprint $table) {
            $table->id();
            $table->string("name"); // Название мероприятия
            $table->text("description"); // Описание
            $table->datetime("event_datetime"); // Дата и время проведения
            $table->string("location")->nullable(); // Место проведения
            $table->integer("duration")->nullable(); // Продолжительность в минутах
            $table->string("cover_image")->nullable(); // Обложка мероприятия
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("events");
    }
};
