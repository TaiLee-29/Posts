@extends('layout')

@section('title', 'Posts')


@section('content')
    <a href="/post/create">Create</a>
    @foreach($posts as $post)
        <div class="border border-primary">
    @include('partials.post', ['post' => $post])
        </div>
  <br>
@endforeach


    @include('paginate', ['pages' =>$posts])
@endsection
