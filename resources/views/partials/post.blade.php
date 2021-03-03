<h1>{{$post->title}}</h1>

<p><a href="{{route('post-by-author', $post->user->id)}}">{{$post->user->name}}</a></p>
<p><a href="{{route('post-by-author', $post->category->id)}}">{{$post->category->title}}</a></p>
<p>{{$post->created_at->diffforhumans()}}</p>
<ul>
@foreach($post->tags as $tag)
        <li><p><a href="/category/{{$post->tag->id}}" >{{$tag->title}}</a></p></li>
@endforeach
</ul>
<p>{{$post->body}}</p>
