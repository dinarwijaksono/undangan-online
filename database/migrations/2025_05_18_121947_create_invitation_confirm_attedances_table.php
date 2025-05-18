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
        Schema::create('invitation_confirm_attedances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitation_id');
            $table->string('name', 100);
            $table->enum('status', ['presen', 'not sure', 'not presen']);
            $table->string('content', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_confirm_attedances');
    }
};
