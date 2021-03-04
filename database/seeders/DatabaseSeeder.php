<?php

namespace Database\Seeders;

use App\Models\User;
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
        $users = \App\Models\User::factory(20)->create();
         $categories =\App\Models\Category::factory(10)->create();
          $tags = \App\Models\Tag::factory(10)->create();


        $post =\App\Models\Post::factory(1000)->make(['category_id' => null, 'user_id' => null])->each(function ($post) use ($categories,$tags, $users) {
            $post->category_id = $categories->random()->id;
            $post->user_id = $users->random()->id;
            $post->save();
            $post->tags()->attach($tags->random(rand(5, 10))->pluck('id'));
            /*$post->tags()->attach($tags->random(rand(5,10)))->pluck('id');*/
        });


    }
}
