<?php


namespace App\Http\Controllers;


use App\Models\Tag;

class PostByTagController
{
    public function __invoke($tag){

        $tag = Tag::find($tag) ;
        $posts = $tag->posts()->paginate(15);


        return view('posts.posts', compact('posts'));

    }
}
