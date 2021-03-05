@extends('layout')

@section('title', 'Category')

@section('content')
    <h1>New Category</h1>
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
          <input type="text" name="title" id="title" value ="{{ $_SESSION['data']['title'] ?? $category->title }}">
        </div>
          @if(isset($_SESSION['errors']['slug']))
              @foreach($_SESSION['errors']['slug'] as $error)
                  <div class="alert alert-warning" role="alert" >
                      <p>{{ $error }}</p>
                  </div>
              @endforeach
          @endif

          <div class="mb-3">
              <label for="slug"> Slug</label>
                 <input type="text" name="slug" id="slug" value ="{{ $_SESSION['data']['slug'] ?? $category->slug }}" >
          </div>
        <br><br>
          <div class="btn btn-primary">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
    </form>

    <a href="/category/list">List-Categories</a>
    @php
        unset($_SESSION['errors']);
        unset($_SESSION['data']);
    @endphp
@endsection
