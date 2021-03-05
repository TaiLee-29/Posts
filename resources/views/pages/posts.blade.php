@extends('layout')

@section('title', 'Posts')


@section('content')

    @foreach($posts as $post)

    @include('partials.post', ['post' => $post])
  <br>
@endforeach



@endsection
