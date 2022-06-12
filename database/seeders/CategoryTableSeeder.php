<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Services\UploadImageService;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $esportImage = public_path('seeders/categories/esport.jpeg');
        $foodImage = public_path('seeders/categories/food.jpeg');
        $gamesImage = public_path('seeders/categories/gaming.jpeg');
        $healthImage = public_path('seeders/categories/health.jpeg');
        $moviesImage = public_path('seeders/categories/movies.jpeg');
        $sportImage = public_path('seeders/categories/sport.png');
        $techImage = public_path('seeders/categories/tech.jpeg');
        $tvImage = public_path('seeders/categories/tv.jpeg');
        $warImage = public_path('seeders/categories/war.jpeg');
        $artImage = public_path('seeders/categories/art.jpeg');
        $educationImage = public_path('seeders/categories/education.jpeg');
        $musicImage = public_path('seeders/categories/music.jpeg');

        $esport = (new Request())->merge(['image' => new UploadedFile($esportImage, 'esport')]);
        $food = (new Request())->merge(['image' => new UploadedFile($foodImage, 'food')]);
        $games = (new Request())->merge(['image' => new UploadedFile($gamesImage, 'games')]);
        $health = (new Request())->merge(['image' => new UploadedFile($healthImage, 'health')]);
        $movies = (new Request())->merge(['image' => new UploadedFile($moviesImage, 'movies')]);
        $sport = (new Request())->merge(['image' => new UploadedFile($sportImage, 'sport')]);
        $tech = (new Request())->merge(['image' => new UploadedFile($techImage, 'tech')]);
        $tv = (new Request())->merge(['image' => new UploadedFile($tvImage, 'tv')]);
        $war = (new Request())->merge(['image' => new UploadedFile($warImage, 'war')]);
        $art = (new Request())->merge(['image' => new UploadedFile($artImage, 'art')]);
        $education = (new Request())->merge(['image' => new UploadedFile($educationImage, 'education')]);
        $music = (new Request())->merge(['image' => new UploadedFile($musicImage, 'music')]);


        Category::firstOrCreate(['name'=>'Esports'], [
            'name' => 'Esports',
            'slug' => 'e-sports',
            'description' => 'Esports is a category for games that are played on a computer, such as video games, board games, and other online games.',
            'image' => (new UploadImageService())->uploadThumbnail($esport, 'e-sports')
        ]);

        Category::firstOrCreate(['name'=>'Food'], [
            'name' => 'Food',
            'slug' => 'food',
            'description' => 'Food is a category for recipes and food related content.',
            'image' => (new UploadImageService())->uploadThumbnail($food, 'food')
        ]);

        Category::firstOrCreate(['name'=>'Games'], [
            'name' => 'Games',
            'slug' => 'games',
            'description' => 'Games is a category for games that are played on a computer, such as video games, board games, and other online games.',
            'image' => (new UploadImageService())->uploadThumbnail($games, 'games')
        ]);

        Category::firstOrCreate(['name'=>'Health'], [
            'name' => 'Health',
            'slug' => 'health',
            'description' => 'Health is a category for health related content.',
            'image' => (new UploadImageService())->uploadThumbnail($health, 'health')
        ]);

        Category::firstOrCreate(['name'=>'Movies'], [
            'name' => 'Movies',
            'slug' => 'movies',
            'description' => 'Movies is a category for movies and TV shows.',
            'image' => (new UploadImageService())->uploadThumbnail($movies, 'movies')
        ]);

        Category::firstOrCreate(['name'=>'Sport'], [
            'name' => 'Sport',
            'slug' => 'sport',
            'description' => 'Sport is a category for sports related content.',
            'image' => (new UploadImageService())->uploadThumbnail($sport, 'sport')
        ]);

        Category::firstOrCreate(['name'=>'Tech'], [
            'name' => 'Tech',
            'slug' => 'tech',
            'description' => 'Tech is a category for technology related content.',
            'image' => (new UploadImageService())->uploadThumbnail($tech, 'tech')
        ]);

        Category::firstOrCreate(['name'=>'TV'], [
            'name' => 'TV',
            'slug' => 'tv',
            'description' => 'TV is a category for TV shows.',
            'image' => (new UploadImageService())->uploadThumbnail($tv, 'tv')
        ]);

        Category::firstOrCreate(['name'=>'War'], [
            'name' => 'War',
            'slug' => 'war',
            'description' => 'War is a category for war related content.',
            'image' => (new UploadImageService())->uploadThumbnail($war, 'war')
        ]);

        Category::firstOrCreate(['name'=>'Art'], [
            'name' => 'Art',
            'slug' => 'art',
            'description' => 'Art is a category for art related content.',
            'image' => (new UploadImageService())->uploadThumbnail($art, 'art')
        ]);

        Category::firstOrCreate(['name'=>'Education'], [
            'name' => 'Education',
            'slug' => 'education',
            'description' => 'Education is a category for education related content.',
            'image' => (new UploadImageService())->uploadThumbnail($education, 'education')
        ]);

        Category::firstOrCreate(['name'=>'Music'], [
            'name' => 'Music',
            'slug' => 'music',
            'description' => 'Music is a category for music related content.',
            'image' => (new UploadImageService())->uploadThumbnail($music, 'music')
        ]);
    }
}
