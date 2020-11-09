<?php

use Illuminate\Database\Seeder;
use App\Article;
use Faker\Generator;
use App\User;

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
          $newArticle->title = $faker->
          $newArticle->subtitle = $faker->
          $newArticle->content = $faker->
          $newArticle->excerpt = $faker->
          $newArticle->slug = $faker->
          $newArticle->keywords = $faker->
        }
    }
}
