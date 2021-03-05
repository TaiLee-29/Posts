<?php


namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
class PostByAuthorAndCategoryController
{

    public function __invoke($authorid, $categoryid)
    {
        $posts = Post::where('user_id', $authorid)->where('category_id',$categoryid)->get();


        return view('pages.posts', compact('posts'));
    }

}
