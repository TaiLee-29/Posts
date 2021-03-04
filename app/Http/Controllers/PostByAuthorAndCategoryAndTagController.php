<?php


namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
class PostByAuthorAndCategoryAndTagController
{
    public function __invoke($authorid, $categoryid, $tagid)
    {
        $posts = Post::where('user_id', $authorid)->where('category_id',$categoryid)->get();


        return view('pages.posts', compact('posts'));
    }
}
