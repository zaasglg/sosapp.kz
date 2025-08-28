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
        Schema::table('project_members', function (Blueprint $table) {
            // Remove the specific social media fields
            $table->dropColumn(['linkedin_url', 'telegram_username', 'joined_date']);
            
            // Add a new JSON field for flexible social links
            $table->json('social_links')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_members', function (Blueprint $table) {
            // Restore the original columns
            $table->string('linkedin_url')->nullable();
            $table->string('telegram_username')->nullable();
            $table->date('joined_date')->nullable();
            
            // Remove the new column
            $table->dropColumn('social_links');
        });
    }
};
