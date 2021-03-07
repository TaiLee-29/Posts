<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PostController

{    public function listP(){
    $pages = \App\Models\Post::paginate(3);
    $link_main="";
    return view('post/table', compact('pages','link_main'));
}

    public function createP()
    {
        $posts = \App\Models\Post::all();
        $post = new \App\Models\Post();
        $tags = \App\Models\Tag::all();
        $categories = \App\Models\Category::all();


        return view('posts.form',compact('posts','post','tags','categories'));


    }
    public function updateP($id)
    {
        //$data = request()->all();
        $post= \App\Models\Post::find($id);
        $tags = \App\Models\Tag::all();
        $categories = \App\Models\Category::all();
        return view('posts.form',compact('post','tags','categories'));

    }
    public function editP($id)
    {
        $data = request()->all();
        $validator = validator()->make($data,[
            'title' => ['required', 'min:5'],
            'body' => ['required', 'min:10'],
            'category_id' => ['required' ],
            'tags' => ['required' ],
        ]);

        $error = $validator->errors();
        if(count($error)>0){
            $_SESSION['data'] = $data;
            $_SESSION['errors'] = $error->toArray();

            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $post = \App\Models\Post::find($id);
        $post->title=$data['title'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];
        $post->user_id = $data['user_id'] = Auth::id();
        $post->save();
        $post->tags()->sync( $data['tags']);

        return redirect()->route('home');

    }
    public function destroyP($id)
    {
        $data = request()->all();
        $post =  \App\Models\Post::find($id);
        $post->delete();
        return redirect()->route('home');
    }
    public function storeP()
    {
        $data = request()->all();
        $validator = validator()->make($data,[
            'title' => ['required', 'min:5'],
            'body' => ['required', 'min:10'],
            'category_id' => ['required' ],
            'tags' => ['required' ],
        ]);

        $error = $validator->errors();
        if(count($error)>0){
            $_SESSION['data'] = $data;
            $_SESSION['errors'] = $error->toArray();

            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $post = new \App\Models\Post();

        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];
        $post->user_id = $data['user_id'] = Auth::id();

        $post->save();
        $post->tags()->attach( $data['tags']);

        $_SESSION['message'] = [
            'status' => 'success',
            'text' => "Post \" {$data['title']} \" saved"
        ];

        return redirect()->route('home');
    }


}
