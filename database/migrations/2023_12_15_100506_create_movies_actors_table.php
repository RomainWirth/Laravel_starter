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
        Schema::create('movies_actors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('movies_id')->unsigned();
            $table->unsignedBiginteger('actors_id')->unsigned();

            $table->foreign('movies_id')->references('id')
                ->on('movies')->onDelete('cascade');
            $table->foreign('actors_id')->references('id')
                ->on('actors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies_actors');
    }
};
