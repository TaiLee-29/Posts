<?php


namespace App\Http\Controllers;


use App\Models\Post;

class HomeController
{
    public function __invoke(){
      $posts = Post::paginate(15);

      return view('posts.posts', compact('posts'));
    }

}
