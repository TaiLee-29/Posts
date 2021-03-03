<?php


namespace App\Http\Controllers;


class PostByCategoryController
{
    public function __invoke($id){
        $posts = \App\Models\Post::where('category_id',$id)->paginate(15);


        return view('pages.posts', compact('posts'));

    }

}
