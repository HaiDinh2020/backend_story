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
            <th scope="col">Text</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        @foreach($texts as $texts)
            <tr>
                <th scope="row">{{$texts->id}}</th>
                <td>{{$texts->text}}</td>
                <td>
                    <a href="/texts/edit/{{$texts->id}}"><button class="btn btn-primary">Edit</button> </a>
                    <a href="/texts/delete/{{$texts->id}}"><button class="btn btn-danger">Delete</button> </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="/texts/create" >
        <button class="btn btn-success m-1">Create new text</button>
    </a>

@endsection
