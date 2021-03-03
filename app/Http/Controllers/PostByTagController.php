<?php


namespace App\Http\Controllers;


class PostByTagController
{
    public function __invoke($id){
        $posts = \App\Models\Post::where('tag_id',$id)->paginate(15);


        return view('pages.posts', compact('posts'));

    }
}
