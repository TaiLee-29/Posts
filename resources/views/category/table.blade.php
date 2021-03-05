@extends('layout')

@section('title', 'Category')

@section('content')
    <h1>List of categories</h1>
    @if(isset($_SESSION['message']))
        <div class="alert alert-success" role="alert">
         <p> {{$_SESSION['message']['text']}}</p>
        </div>
    @endif
    @unset($_SESSION['message'])
    <a href="/category/create">Create</a>
    <div>
    @foreach($pages as $category)
       <table align="left" width="1000" border="2" bgcolor="silver">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Created-at</th>
                <th>Updated-at</th>
            </tr>

                <td>{{$category->id}}</td>

                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td><td><form action="/category/{{$category->id}}/update" >@csrf
                <input type="submit" value="update" ></form></td><td><form action="/category/{{$category->id}}/delete" method="post">@csrf

                <input type="submit" value="delete" ></form></td>
            </tr>
        </table>


    @endforeach
       </div>

@endsection

@include('paginate')
