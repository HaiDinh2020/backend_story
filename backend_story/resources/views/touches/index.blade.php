@extends('layouts.app')

@if(session('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> {{session('status')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')

    <table class="table">
        <caption>List of texts</caption>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Page_id</th>
            <th scope="col">Data</th>
            <th scope="col">Text_id</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        @foreach($touches as $touches)
            <tr>
                <td>{{$touches->id}}</td>
                <td>{{$touches->page_id}}</td>
                <td>{{$touches->data}}</td>
                <td>{{$touches->text_id}}</td>
                <td>
                    <a href="/touches/edit/{{$touches->id}}">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                    <a href="/touches/delete/{{$touches->id}}">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="/touches/create">
        <button class="btn btn-success m-1">Create new text</button>
    </a>

@endsection
