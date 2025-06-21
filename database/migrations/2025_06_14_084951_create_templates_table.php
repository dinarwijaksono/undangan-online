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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();
            $table->string('name', 100);
            $table->json('thumbnail_path')->nullable()->default('[]');
            $table->string('html_path', 20)->nullable()->unique();
            $table->json('css_path')->nullable()->default('[]');
            $table->json('js_path')->nullable()->default('[]');
            $table->json('img_path')->nullable()->default('[]');
            $table->boolean('is_publish')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
