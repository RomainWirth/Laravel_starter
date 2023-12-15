<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = DB::table('movies');

        foreach ($movies->get() as $movie) {
            $actorNames = explode(',', $movie->actors);

            foreach ($actorNames as $name) {
                $trimmedName = trim($name);

                if (!empty($trimmedName)) {
                    // Vérifie si l'acteur existe déjà
                    $existingActor = DB::table('actors')->where('name', $trimmedName)->first();

                    if ($existingActor) {
                        $actorId = $existingActor->id;
                    } else {
                        // Si l'acteur n'existe pas, l'insérer dans la table actors
                        $actorId = DB::table('actors')->insertGetId(['name' => $trimmedName]);
                    }

                    // Maintenant, vous pouvez insérer dans la table de relation movies_actors
                    DB::table('movies_actors')->insert([
                        'movies_id' => $movie->id,
                        'actors_id' => $actorId,
                    ]);
                }
            }
        }
    }
}
