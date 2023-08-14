@extends('layouts.app')

@if(session('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> {{session('status')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')


    @foreach($pages as $pages)
        <li class="list-group-item d-flex justify-content-between align-items-center">

            <div class="ms-2 me-auto d-flex">
                <div class="m-2">
                    <div class="fw-bold">Page_id : {{$pages->id}}</div>
                    <div class="fw-bold">Story_id : {{$pages->story_id}}</div>
                </div>
                <img src="{{asset('/storage/backgrounds/'.$pages->background)}}" alt="{{$pages->background}}"
                     width="300px"
                     height="200px">
            </div>


            <a href="pages/edit/{{$pages->id}}"
               class="m-1">
                <button class="badge bg-primary rounded-pill">
                    Edit
                </button>
            </a>
            <a href="pages/delete/{{$pages->id}}">
                <button class="badge bg-primary rounded-pill">
                    Delete
                </button>
            </a>
        </li>

    @endforeach
    <a href="/pages/create">
        <button class="btn btn-primary">Create new page</button>
    </a>

    <br>

    {{--    <audio controls >--}}
    {{--        <source src="storage/{{$file}}.mp3" type="audio/mpeg">--}}
    {{--    </audio>--}}
@endsection
