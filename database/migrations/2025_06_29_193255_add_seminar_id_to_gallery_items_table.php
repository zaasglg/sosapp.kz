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
        Schema::table("gallery_items", function (Blueprint $table) {
            $table->unsignedBigInteger("seminar_id")->nullable();
            $table
                ->foreign("seminar_id")
                ->references("id")
                ->on("seminars")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("gallery_items", function (Blueprint $table) {
            $table->dropForeign(["seminar_id"]);
            $table->dropColumn("seminar_id");
        });
    }
};
