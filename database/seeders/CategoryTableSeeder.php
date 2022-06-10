<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::firstOrCreate(['name'=>'Esports'], [
            'name' => 'Esports',
            'slug' => 'e-sports',
            'description' => 'Esports is a category for games that are played on a computer, such as video games, board games, and other online games.',
            'image' => '',
        ]);

        Category::firstOrCreate(['name'=>'Gaming'], [
            'name' => 'Gaming',
            'slug' => 'gaming',
            'description' => 'Gaming is a category for games that are played on a computer, such as video games, board games, and other online games.',
            'image' => '',
        ]);

        Category::firstOrCreate(['name'=>'Movies'], [
            'name' => 'Movies',
            'slug' => 'movies',
            'description' => 'Movies is a category for movies that are played on a computer, such as video games, board games, and other online games.',
            'image' => '',
        ]);

        Category::firstOrCreate(['name'=>'TV'], [
            'name' => 'TV',
            'slug' => 'tv',
            'description' => 'TV is a category for TV shows that are played on a computer, such as video games, board games, and other online games.',
            'image' => '',
        ]);

        Category::firstOrCreate(['name'=>'Music'], [
            'name' => 'Music',
            'slug' => 'music',
            'description' => 'Music is a category for music that is played on a computer, such as video games, board games, and other online games.',
            'image' => '',
        ]);

        Category::firstOrCreate(['name'=>'Books'], [
            'name' => 'Books',
            'slug' => 'books',
            'description' => 'Books is a category for books that are played on a computer, such as video games, board games, and other online games.',
            'image' => '',
        ]);
    }
}
