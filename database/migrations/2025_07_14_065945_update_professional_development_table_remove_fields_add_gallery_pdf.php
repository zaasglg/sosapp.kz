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
        Schema::table('professional_development', function (Blueprint $table) {
            // Удаляем старые поля
            $table->dropColumn([
                'type',
                'start_date',
                'end_date',
                'location',
                'participants_count',
                'objectives'
            ]);
            
            // Добавляем новые поля
            $table->json('gallery_images')->nullable()->after('image_path');
            $table->string('pdf_file')->nullable()->after('gallery_images');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('professional_development', function (Blueprint $table) {
            // Возвращаем старые поля
            $table->string('type')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('location')->nullable();
            $table->integer('participants_count')->nullable();
            $table->json('objectives')->nullable();
            
            // Удаляем новые поля
            $table->dropColumn(['gallery_images', 'pdf_file']);
        });
    }
};
