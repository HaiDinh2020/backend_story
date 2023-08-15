@extends('layouts.app')

@if(session('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> {{session('status')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')

    <table class="table">
        <caption>List of text-configs</caption>
        <thead>
        <tr>
            <th scope="col">Page_id</th>
            <th scope="col">Text_id</th>
            <th scope="col">Position</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        @foreach($textConfigs as $textConfigs)
            <tr>
                <td>{{$textConfigs->page_id}}</td>
                <td>{{$textConfigs->text_id}}</td>
                <td>{{$textConfigs->position}}</td>
                <td>
                    <a href="/textConfigs/edit/{{$textConfigs->id}}"><button class="btn btn-primary">Edit</button> </a>
                    <a href="/textConfigs/delete/{{$textConfigs->id}}"><button class="btn btn-danger">Delete</button> </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="/textConfigs/create" >
        <button class="btn btn-success m-1">Create new text</button>
    </a>

@endsection
