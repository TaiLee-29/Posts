@extends('layout')

@section('title', '   Post')

@section('content')
    <h1>New Post</h1>
    <br><br>
    <form  method="post" >
        @csrf
        @if(isset($_SESSION['errors']['title']))
            @foreach($_SESSION['errors']['title'] as $error)
                <div class="alert alert-warning" role="alert">
                    <p>{{ $error }}</p>
                </div>
            @endforeach
        @endif
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value ="{{ $_SESSION['data']['title'] ?? $post->title }}" >
            </div>
            @if(isset($_SESSION['errors']['slug']))
                @foreach($_SESSION['errors']['slug'] as $error)
                    <div class="alert alert-warning" role="alert">
                        <p>{{ $error }}</p>
                    </div>
                @endforeach
            @endif

            @if(isset($_SESSION['errors']['body']))
                @foreach($_SESSION['errors']['body'] as $error)
                    <div class="alert alert-warning" role="alert">
                    <p>{{ $error }}</p>
                    </div>
                @endforeach
            @endif
            <div class="mb-3">
                <label for="body"> Body</label>
                <textarea  class="form-control" name="body" id="body"  rows="15">{{ $_SESSION['data']['body'] ?? $post->body}}</textarea>
            </div>
            <br><br>
            @if(isset($_SESSION['errors']['category_id']))
                @foreach($_SESSION['errors']['category_id'] as $error)
                    <div class="alert alert-warning" role="alert">
                        <p>{{ $error }}</p>
                    </div>
                @endforeach
            @endif
            <div class="mb-3">
                <label for="category_id"> Category </label>
            <select id="category_id" name="category_id" class="form-select" >
                @if(isset($_SESSION['data']['category_id']))
                    {{$select_id=$_SESSION['data']['category_id']}}
                @else {{$select_id=$post->category_id}}
                @endif
              @foreach($categories as $category)
                        <option @if ($category->id==$select_id): selected @endif value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            </div>


            @if(isset($_SESSION['errors']['tags']))
                @foreach($_SESSION['errors']['tags'] as $error)
                    <div class="alert alert-warning" role="alert">
                        <p>{{ $error }}</p>
                    </div>
                @endforeach
            @endif
                <div class="mb-3">
                <div class="form-check">
                    @foreach($tags as $tag)
                        <div class="input-group">
                            @if(isset($_SESSION['data']['tags']))
                                <input @if(array_search($tag->id,$_SESSION['data']['tags'])!==false) checked @endif class = "input-checkbox" type="checkbox" name="tags[]" value={{$tag->id}}>{{$tag->title}}
                            @else
                                <input @if(array_search($tag->id,$post->tags->pluck('id')->toArray())!==false) checked @endif class = "input-checkbox" type="checkbox" name="tags[]" value={{$tag->id}}>{{$tag->title}}
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>
            <div class="btn btn-primary">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    <a href="/post/list">List-Posts</a>
    @php
        unset($_SESSION['errors']);
        unset($_SESSION['data']);
    @endphp
@endsection
