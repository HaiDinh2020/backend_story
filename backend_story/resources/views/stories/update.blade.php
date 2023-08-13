@extends('layouts.app')

@section('content')

    <form action="/stories/update/{{$story->id}}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="storyName" class="form-label">Name story</label>
            <input type="text"
                   class="form-control"
                   id="storyName"
                   name="name"
                   value="{{$story->name}}">
        </div>
        <div class=" mb-3">
            <label for="storyThumbnail" class="form-label">Thumbnail story</label>
            <img src="{{asset('/storage/thumbnails/'.$story->thumbnail)}}" alt="{{$story->thumbnail}}"
                 width="100px"
                 height="100px">

            <input type="file"
                   class="form-control"
                   accept=".png, .jpg, .jpeg"
                   name="storyThumbnail">

        </div>
        <div class="mb-3">
            <label for="authorName" class="form-label">Author4 story</label>
            <input type="text"
                   class="form-control"
                   id="authorName"
                   name="author" value="{{$story->author}}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
