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
        Schema::table('faq', function (Blueprint $table) {
            $table->longText('answerID')->change();
            $table->longText('answerEN')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faq', function (Blueprint $table) {
            $table->string('answerID')->change();
            $table->string('answerEN')->change();
        });

    }
};
