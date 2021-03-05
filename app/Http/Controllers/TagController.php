<?php


namespace  App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;




class TagController
{
    public function listT(){
        $pages = \App\Models\Tag::paginate(3);
        $link_main="";
        return view('tag/table', compact('pages','link_main'));
    }
    public function createT()
    {

        $tag = new \App\Models\Tag();




        return view('tag/form',compact('tag'));


    }
    public function updateT($id)
    {
        //$data = request()->all();
        $tag= \App\Models\Tag::find($id);


        return view('tag/form',['tag'=>$tag]);

    }
    public function editT($id)
    {
        $data = request()->all();
        $tag = \App\Models\Tag::find($id);
        $tag->title=$data['title'];
        $tag->slug=$data['slug'];
        $tag->save();
        return new RedirectResponse('/tag/list');

    }
    public function destroyT($id)
    {
        $data = request()->all();
        $tag =  \App\Models\Tag::find($id);
        $tag->delete();
        return new RedirectResponse('/tag/list');
    }
    public function storeT()
    {
        $data = request()->all();
        $validator = validator()->make($data,[
            'title' => ['required', 'min:5'],
            'slug' => ['required', 'min:5'],
        ]);

        $error = $validator->errors();
        if(count($error)>0){
            $_SESSION['data'] = $data;
            $_SESSION['errors'] = $error->toArray();

            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $tag = new \App\Models\Tag();

        $tag->title = $data['title'];
        $tag->slug = $data['slug'];
        $tag->save();

        $_SESSION['message'] = [
            'status' => 'success',
            'text' => "Tag \" {$data['title']} \" saved"
        ];

        return new RedirectResponse('/tag/list');
    }
}
