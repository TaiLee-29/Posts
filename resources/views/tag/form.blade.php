@extends('layout')

@section('title', 'Homepage')

@section('content')
    <h1>New Tag</h1>
    <br><br>
    <form  method="post" >
        @csrf
        @if(isset($_SESSION['errors']['title']))
            @foreach($_SESSION['errors']['title'] as $eror)
                <div class="alert alert-warning" role="alert">
                    <p>{{ $error }}</p>
                </div>
            @endforeach
        @endif
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value ="{{ $_SESSION['data']['title'] ?? $tag->title }}" >
            </div>
            @if(isset($_SESSION['errors']['slug']))
                @foreach($_SESSION['errors']['slug'] as $eror)
                    <div class="alert alert-warning" role="alert">
                        <p>{{ $error }}</p>
                    </div>
                @endforeach
            @endif

            <div class="mb-3">
                <label for="slug"> Slug</label>
                <input type="text" name="slug" id="slug" value ="{{ $_SESSION['data']['slug'] ?? $tag->slug }}" >
            </div>
            <br><br>
            <div class="btn btn-primary">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    <a href="/post/list">List-Tags</a>
    @php
        unset($_SESSION['errors']);
        unset($_SESSION['data']);
    @endphp
@endsection
