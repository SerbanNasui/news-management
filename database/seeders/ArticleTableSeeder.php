<?php

namespace Database\Seeders;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

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
        Article::firstOrCreate(['title' =>'Article 1'],[
            'title' => 'Article 1',
            'body' => $body,
            'user_id' => 2,
            'category_id' => 1,
            'published' => 0,
            'slug' => strtolower(str_replace(' ', '-', 'Article 1')).'-2-'.Carbon::now()->timestamp
        ]);

        Article::firstOrCreate(['title'=>'Article 2'],[
            'title' => 'Article 2',
            'body' => $body,
            'user_id' => 2,
            'category_id' => 3,
            'published' => 1,
            'slug' => strtolower(str_replace(' ', '-', 'Article 2')).'-2-'.Carbon::now()->timestamp
        ]);

        Article::firstOrCreate(['title'=>'Article 3'],[
            'title' => 'Article 3',
            'body' => $body,
            'user_id' => 3,
            'category_id' => 3,
            'published' => 0,
            'slug' => strtolower(str_replace(' ', '-', 'Article 3')).'-3-'.Carbon::now()->timestamp
        ]);

        Article::firstOrCreate(['title'=>'Article 4'],[
            'title' => 'Article 4',
            'body' => $body,
            'user_id' => 3,
            'category_id' => 3,
            'published' => 1,
            'slug' => strtolower(str_replace(' ', '-', 'Article 4')).'-3-'.Carbon::now()->timestamp
        ]);

        Article::firstOrCreate(['title'=>'Article 5'],[
            'title' => 'Article 5',
            'body' => $body,
            'user_id' => 3,
            'category_id' => 5,
            'published' => 1,
            'slug' => strtolower(str_replace(' ', '-', 'Article 5')).'-3-'.Carbon::now()->timestamp
        ]);
    }
}
