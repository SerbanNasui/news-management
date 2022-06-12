<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleView;
use App\Models\User;
use App\Services\UploadImageService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $body = "<h2 style='margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);'><span style='font-family: &quot;Courier New&quot;;'>What is Lorem Ipsum?</span></h2><p style='margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;'><strong style='margin: 0px; padding: 0px;'>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h2 style='margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);'>Why do we use it?</h2><p style='margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;'>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p style='margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;'><br></p><h2 style='margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);'>Where does it come from?</h2><p style='margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;'>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of 'de Finibus Bonorum et Malorum' (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, 'Lorem ipsum dolor sit amet..', comes from a line in section 1.10.32.</p><p style='margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;'>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from 'de Finibus Bonorum et Malorum' by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p style='margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;'><br></p><p style='margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;'><br></p>";

        $img1 = public_path('seeders/articles/img1.jpeg');
        $img2 = public_path('seeders/articles/img2.jpeg');
        $img3 = public_path('seeders/articles/img3.jpeg');
        $img4 = public_path('seeders/articles/img4.jpeg');
        $img5 = public_path('seeders/articles/img5.jpeg');
        $img6 = public_path('seeders/articles/img6.jpeg');
        $img7 = public_path('seeders/articles/img7.jpeg');
        $img8 = public_path('seeders/articles/img8.jpeg');
        $img9 = public_path('seeders/articles/img9.jpeg');

        $opt1 = (new Request())->merge(['thumbnail' => new UploadedFile($img1, 'img1')]);
        $opt2 = (new Request())->merge(['thumbnail' => new UploadedFile($img2, 'img2')]);
        $opt3 = (new Request())->merge(['thumbnail' => new UploadedFile($img3, 'img3')]);
        $opt4 = (new Request())->merge(['thumbnail' => new UploadedFile($img4, 'img4')]);
        $opt5 = (new Request())->merge(['thumbnail' => new UploadedFile($img5, 'img5')]);
        $opt6 = (new Request())->merge(['thumbnail' => new UploadedFile($img6, 'img6')]);
        $opt7 = (new Request())->merge(['thumbnail' => new UploadedFile($img7, 'img7')]);
        $opt8 = (new Request())->merge(['thumbnail' => new UploadedFile($img8, 'img8')]);
        $opt9 = (new Request())->merge(['thumbnail' => new UploadedFile($img9, 'img9')]);

        $array = [$opt1, $opt2, $opt3, $opt4, $opt5, $opt6, $opt7, $opt8, $opt9];


        $location1 = '{"ip":"154.14.44.160","countryName":"Romania","countryCode":"RO","regionCode":"B","regionName":"Bucharest","cityName":"Bucharest","zipCode":"052829","isoCode":null,"postalCode":null,"latitude":"44.4268","longitude":"26.1025","metroCode":null,"areaCode":"B","timezone":"Europe\/Bucharest","driver":"Stevebauman\\Location\\Drivers\\IpApi"}';
        $location2 = '{"ip":"188.240.8.0","countryName":"Romania","countryCode":"RO","regionCode":"B","regionName":"Bucharest","cityName":"Bucharest","zipCode":"010034","isoCode":null,"postalCode":null,"latitude":"44.4846","longitude":"26.0916","metroCode":null,"areaCode":"B","timezone":"Europe\/Bucharest","driver":"Stevebauman\\Location\\Drivers\\IpApi"}';
        $location3 = '{"ip":"154.54.78.222","countryName":"Romania","countryCode":"RO","regionCode":"B","regionName":"Bucharest","cityName":"Bucharest","zipCode":"052829","isoCode":null,"postalCode":null,"latitude":"44.4268","longitude":"26.1025","metroCode":null,"areaCode":"B","timezone":"Europe\/Bucharest","driver":"Stevebauman\\Location\\Drivers\\IpApi"}';
        $location4 = '{"ip":"185.144.80.1","countryName":"Romania","countryCode":"RO","regionCode":"B","regionName":"Bucharest","cityName":"Bucharest","zipCode":"052829","isoCode":null,"postalCode":null,"latitude":"44.4268","longitude":"26.1025","metroCode":null,"areaCode":"B","timezone":"Europe\/Bucharest","driver":"Stevebauman\\Location\\Drivers\\IpApi"}';

        $locations = [$location1, $location2, $location3, $location4];

        for($i = 1; $i <= 40; $i++){
            $articleTitle = 'Article ' . $i;
            $users = [2,3,4];
            $categories = [1,2,3,4,5,6,7,8,9];
            $published = [0,1];
            $highlight = [0,1];
            $isPublished = $published[array_rand($published)];
            $isHighlight = $highlight[array_rand($highlight)];
            $user = $users[array_rand($users)];
            Article::firstOrCreate(['title' =>$articleTitle],[
                'title' => $articleTitle,
                'body' => $body,
                'user_id' => $user,
                'category_id' => $categories[array_rand($categories)],
                'published' => $isPublished,
                'is_highlighted' => $isHighlight,
                'slug' => strtolower(str_replace(' ', '-', $articleTitle)).'-'.$user.'-'.Carbon::now()->timestamp,
                'short_description' => "Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of ",
                'thumbnail' => (new UploadImageService())->uploadThumbnail($array[array_rand($array)], strtolower(str_replace(' ', '-', $articleTitle)).'-'.$user.'-'.Carbon::now()->timestamp, User::find($user))
            ]);

            if($isPublished == 1){
                ArticleView::create([
                    'article_id' => $i,
                    'location' => $locations[array_rand($locations)]
                ]);
            }
        }
    }
}
