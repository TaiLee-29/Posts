@extends('layout')

@section('title', 'Tags')

@section('content')
    <h1>List of Tags</h1>
    @if(isset($_SESSION['message'] ))
        <div class="alert alert-success" role="alert">
            <p> {{$_SESSION ?? ''['message']['text']}}</p>
        </div>
    @endif
    <a href="/tag/create">Create</a>
    @foreach($pages as $page)
        <table align="left" width="1000" border="2" bgcolor="silver" class="table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Created-at</th>
                <th>Updated-at</th>
            </tr>
            <tr>
                <td>{{$page->id}}</td>
                <td>{{$page->title}}</td>
                <td>{{$page->slug}}</td>
                <td>{{$page->created_at}}</td>
                <td>{{$page->updated_at}}</td><td><form action="/tag/{{$page->id}}/update" >@csrf
                        <input type="submit" value="update" ></form></td><td><form action="/tag/{{$page->id}}/delete" method="post">@csrf
                        <input type="submit" value="delete" ></form></td>
            </tr>
        </table>
    @endforeach
    @unset($_SESSION )
@endsection

@include('paginate')
