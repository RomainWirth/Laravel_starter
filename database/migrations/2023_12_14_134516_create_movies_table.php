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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('name');
            $table->string('contenttype');
            $table->string('description');
            $table->string('contentrating');
            $table->string('genre');
            $table->string('poster');
            $table->string('formattedduration');
            $table->string('releaseddate');
            $table->string('actors');
            $table->string('director');
            $table->string('creator');
            $table->string('audio');
            $table->string('subtitle');
            $table->string('numberofseasons');
            $table->string('seasonstartdate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
