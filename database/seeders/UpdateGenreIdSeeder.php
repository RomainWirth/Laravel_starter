<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateGenreIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = DB::table('movies')->get();
        foreach ($movies as $movie) {
            $genre = DB::table('genres')->where('name', $movie->genre)->first();

            if ($genre) {
                DB::table('movies')
                    ->where('id', $movie->id)
                    ->update(['genre_id' => $genre->id]);
            }
        }
    }
}
