@extends('layouts.app')

@section('content')

    <h1> This is my story </h1>
    @if(session('status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey!</strong> {{session('status')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @foreach($stories as $stories)
        <li class="list-group-item d-flex justify-content-between align-items-center" >

            <div class="ms-2 me-auto">
                <div class="fw-bold">{{$stories->name}}</div>

                <img src="{{asset('/storage/thumbnails/'.$stories->thumbnail)}}" alt="{{$stories->thumbnail}}"
                     width="100px"
                     height="100px">
                <div>
                    <span>ID: {{$stories->id}}</span>
                    <span class="m-1"> Author: {{$stories->author}}</span>
                </div>
            </div>


            <a href="stories/edit/{{$stories->id}}"
               class="m-1">
                <button  class="badge bg-primary rounded-pill">
                    Edit
                </button>
            </a>
            <a href="stories/delete/{{$stories->id}}">
                <button  class="badge bg-primary rounded-pill">
                    Delete
                </button>
            </a>
        </li>

    @endforeach
    <a href="/stories/create" >
        <button class="btn btn-primary m-1">add story</button>
    </a>
@endsection
