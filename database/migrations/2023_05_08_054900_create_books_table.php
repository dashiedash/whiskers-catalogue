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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('author_last_name');
            $table->string('author_first_name');
            $table->year('publish_year');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('publisher');
            $table->string('publish_city');
            $table->string('publish_state');
            $table->string('publish_country');
            $table->longText('description');
            $table->string('cover')->nullable();
            $table->unsignedInteger('stock');
            $table->unsignedBigInteger('isbn');
            $table->decimal('price', $precision = 6, $scale = 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
