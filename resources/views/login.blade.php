@extends('layout')

@section('content')
    @if($errors->has('email'))
        @foreach($errors->get('email') as $error)
          <div class="alert alert-dark" role="alert">
              <p> {{$error}}</p>
          </div>

        @endforeach
        @endif

    <form action="" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
         <br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

         <input type="submit" value="Login">
    </form>

@endsection
