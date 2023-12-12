<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            'name' => 'Lord of the Rings - The Fellowship of the Ring',
            'img_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXNLb5uCvGEjHo40z2fpEi77x9k3JuIb1wwA&usqp=CAU',
            'description' => 'A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful One Ring and save Middle-earth from the Dark Lord Sauron.',
            'director' => 'Peter Jackson',
            'date' => '19-12-2001'
        ]);

        DB::table('movies')->insert([
            'name' => 'Lord of the Rings - The Two Towers',
            'img_url' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTQskuRwDUSBxpaxtowJJEbwSEuzv9D2R5ehcju0lljFKRgaJuj',
            'description' => 'While Frodo and Sam edge closer to Mordor with the help of the shifty Gollum, the divided fellowship makes a stand against Sauron\'s new ally, Saruman, and his hordes of Isengard.',
            'director' => 'Peter Jackson',
            'date' => '10-12-2002'
        ]);

        DB::table('movies')->insert([
            'name' => 'Lord of the Rings - The Return of the King',
            'img_url' => 'https://static.posters.cz/image/750webp/11969.webp',
            'description' => 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.',
            'director' => 'Peter Jackson',
            'date' => '17-12-2003'
        ]);

        DB::table('movies')->insert([
            'name' => 'The Hobbit - An Unexpected Journey',
            'img_url' => 'https://fullerstudio.fuller.edu/wp-content/uploads/2018/08/hobbit_unexpected_poster.jpeg',
            'description' => 'A reluctant Hobbit, Bilbo Baggins, sets out to the Lonely Mountain with a spirited group of dwarves to reclaim their mountain home, and the gold within it from the dragon Smaug.',
            'director' => 'Peter Jackson',
            'date' => '12-12-2012'
        ]);

        DB::table('movies')->insert([
            'name' => 'The Hobbit - Desolation of Smaug',
            'img_url' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTDXW_j-P_Ttu2r3YW2dZmA-vKpZs7ZrDLB75dX1hGi2O8c7G6j',
            'description' => 'The dwarves, along with Bilbo Baggins and Gandalf the Grey, continue their quest to reclaim Erebor, their homeland, from Smaug. Bilbo Baggins is in possession of a mysterious and magical ring.',
            'director' => 'Peter Jackson',
            'date' => '11-12-2013'
        ]);

        DB::table('movies')->insert([
            'name' => 'The Hobbit - The Battle of the Five Armies',
            'img_url' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQ5kA8VIg9Kd4ZPwyLQv2MVYBr-ttb653yTDYjzfi_ekdNWAIcv',
            'description' => 'Bilbo and company are forced to engage in a war against an array of combatants and keep the Lonely Mountain from falling into the hands of a rising darkness.',
            'director' => 'Peter Jackson',
            'date' => '11-12-2013'
        ]);
    }
}
