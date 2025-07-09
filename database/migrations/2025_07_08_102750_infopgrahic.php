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
        Schema::create('infographic', function (Blueprint $table) {
            $table->id();
            $table->string('publishdate');
            $table->string('titleID');
            $table->string('titleEN');
            $table->string('imgID');
            $table->string('imgEN');
            $table->text('descriptionID')->nullable();
            $table->text('descriptionEN')->nullable();
            $table->string('slug')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infographic');
    }
};
