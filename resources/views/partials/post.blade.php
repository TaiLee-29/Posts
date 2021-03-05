<h1>{{$post->title}}</h1></a></p><td><form action="/post/{{$post->id}}/update" >
                               <input type="submit" value="update" >@csrf</form>
</td><td><form action="/post/{{$post->id}}/delete" method="post">
        <input type="submit" value="delete" >@csrf</form></td>
<p><a href="{{route('post-by-author', $post->user->id)}}">{{$post->user->name}}
<p><a href="{{route('post-by-category', $post->category->id)}}">{{$post->category->title}}</a></p>
<p>{{$post->created_at->diffforhumans()}}</p>
<ul>
@foreach($post->tags as $tag)
    <li><p><a href="{{route('post-by-tag',$tag->id)}}" >{{$tag->title}}</a></p></li>
@endforeach
</ul>
<p>{{$post->body}}</p>
