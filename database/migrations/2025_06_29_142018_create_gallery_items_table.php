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
        Schema::create("gallery_items", function (Blueprint $table) {
            $table->id();
            $table->string("title"); // Название изображения
            $table->text("description")->nullable(); // Описание
            $table->string("image_path"); // Путь к изображению
            $table->string("category")->nullable(); // Категория
            $table->integer("sort_order")->default(0); // Порядок сортировки
            $table->boolean("is_featured")->default(false); // Рекомендуемое
            $table
                ->foreignId("event_id")
                ->nullable()
                ->constrained()
                ->onDelete("cascade"); // Связь с мероприятием
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("gallery_items");
    }
};
