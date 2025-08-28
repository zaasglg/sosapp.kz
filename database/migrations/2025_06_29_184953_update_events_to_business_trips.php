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
        Schema::table("events", function (Blueprint $table) {
            $table->dropColumn(["event_datetime", "location"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("events", function (Blueprint $table) {
            $table->datetime("event_datetime")->nullable();
            $table->string("location")->nullable();
        });
    }
};
