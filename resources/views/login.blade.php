@extends('layout')

@section('content')

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
