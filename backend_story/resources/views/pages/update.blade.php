@extends('layouts.app')

@section('content')

    <form action="/pages/update/{{$page->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="story_id" class="form-label">ID story</label>
            <input type="text"
                   class="form-control"
                   id="story_id"
                   name="story_id" value="{{$page->story_id}}">
        </div>
        <div class="mb-3">
            <label for="background" class="form-label">background page</label>

            <img src="{{asset('/storage/backgrounds/'.$page->background)}}" alt="{{$page->background}}"
                 width="100px"
                 height="100px">

            <input type="file"
                   class="form-control"
                   id="background"
                   accept=".png, .jpg, .jpeg"
                   name="background" >
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
