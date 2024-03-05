<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class DatabaseSeeder_movie extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Movie::insert([
            [
                'title' => 'The Avengers',
                'voteaverage' => '5',
                'overview' => 'avenger film bagus',
                'posterpath' => 'https://www.hotelmurah.com/ceritawisata/wp-content/uploads/2023/06/avengers-age-of-ultron.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Hulk the Movie',
                'voteaverage' => '5',
                'overview' => 'The movie Hulk seru',
                'posterpath' => 'https://www.thefactsite.com/wp-content/uploads/2021/05/the-hulk-facts.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Spiderman Comeback the Movie',
                'voteaverage' => '3',
                'overview' => 'The movie Spiderman luarbiasa',
                'posterpath' => 'https://images.tokopedia.net/img/KRMmCm/2023/10/18/f5e79ada-8ef6-4c10-928e-f53dc324dc9b.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ],
    );
    }
}
