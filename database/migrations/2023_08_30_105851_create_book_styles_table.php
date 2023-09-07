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
        Schema::create('book_styles', function (Blueprint $table) {

            $table->foreignId('book_id')
                ->constrained('books')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('style_id')
                ->nullable()
                ->constrained('styles')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_styles');
    }
};
