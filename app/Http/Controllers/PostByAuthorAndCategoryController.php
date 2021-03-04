<?php


namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
class PostByAuthorAndCategoryController
{
    public function __invoke($authorid, $categoryid, $tagid)
    {
        $posts = Post::where('user_id', $authorid)
            ->where('category_id',$categoryid)
            ->whereHas('tags', function (Builder $query) use($tagid){
             $query->where('tag_id',$tagid);
            })
            ->get();


        return view('pages.posts', compact('posts'));
    }
}
