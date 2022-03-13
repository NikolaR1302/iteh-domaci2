<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Genre::truncate();
        User::truncate();
        Movie::truncate();


        $user =  User::factory()->create();
        $gen1 = Genre::factory()->create();
        $gen2 = Genre::factory()->create();

        Movie::factory(5)->create([
            'user_id' => $user->id,
            'genre_id' => $gen1->id
        ]);

        Movie::factory(2)->create([
            'user_id' => $user->id,
            'genre_id' => $gen2->id
        ]);

        // $user =  User::factory()->create();
        // $gen1 = Genre::create(['name' => 'akcija', 'slug' => 'akcija']);
        // $gen2 = Genre::create(['name' => 'drama', 'slug' => 'drama']);
        // $gen3 = Genre::create(['name' => 'horor', 'slug' => 'horor']);

        // $film1 = Movie::create([
        //     'title' => 'Titanik',
        //     'slug' => 'titanik',
        //     'year' => '1999',
        //     'director' => 'Adam',
        //     'user_id' => $user->id,
        //     'genre_id' => $gen2->id
        // ]);
        // $film2 = Movie::create([
        //     'title' => 'Paklene ulice',
        //     'slug' => 'ff',
        //     'year' => '2008',
        //     'director' => 'Mark',
        //     'user_id' => $user->id,
        //     'genre_id' => $gen1->id
        // ]);
    }
}
