<?php

use Illuminate\Database\Seeder;
use App\Article;
use Faker\Generator as Faker;
use App\User;
use Illuminate\Support\Str;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++){

          $user = User::inRandomOrder()->first();

          $newArticle = new Article;
          $newArticle->user_id = $user->id;
          $newArticle->title = $faker->sentence(6, true);
          $newArticle->subtitle = $faker->sentence(12, true);
          $newArticle->content = $faker->text;
          $newArticle->excerpt = $faker->sentence(12, true);
          $newArticle->slug = Str::of($newArticle->title)->slug('-');
          $newArticle->keywords = $faker->sentence(4);
          $newArticle->save();
        }
    }
}
