@extends('layouts.app')

@if(session('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> {{session('status')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')

    <table class="table">
        <caption>List of audio</caption>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Text_id</th>
            <th scope="col">Text</th>
            <th scope="col">Audio</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        @foreach($audios as $audios)
            <tr>
                <th scope="row">{{$audios->id}}</th>
                <th scope="row">{{$audios->text_id}}</th>
                <td>{{$audios->audio}}</td>
                <td>
                    <audio controls >
                        <source src="/storage/audios/{{$audios->audio}}" type="audio/mpeg">
                    </audio>
                </td>
                <td>
                    <a href="/audios/edit/{{$audios->id}}"><button class="btn btn-primary">Edit</button> </a>
                    <a href="/audios/delete/{{$audios->id}}"><button class="btn btn-danger">Delete</button> </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="/audios/create" >
        <button class="btn btn-success m-1">Create new audio</button>
    </a>

@endsection

