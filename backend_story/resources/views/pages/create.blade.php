@extends('layouts.app')

@section('content')

    <form action="/pages" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="story_id" class="form-label">ID story</label>
            <input type="text"
                   class="form-control"
                   id="story_id"
                   name="story_id">
        </div>
        <div class="mb-3">
            <label for="background" class="form-label">background page</label>

            <input type="file"
                   class="form-control"
                   id="background"
                   accept=".png, .jpg, .jpeg"
                   name="background" >
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
