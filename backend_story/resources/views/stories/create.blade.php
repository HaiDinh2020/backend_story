@extends('layouts.app')

@section('content')

    <form action="/stories" method="post" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label for="storyName" class="form-label">Name story</label>
            <input type="text"
                   class="form-control"
                   id="storyName"
                   name="name">
        </div>
        <div class=" mb-3">
            <label for="storyThumbnail" class="form-label">Thumbnail story</label>
            <input type="file"
                   class="form-control"
                   accept=".png, .jpg, .jpeg"
                   name="storyThumbnail" >
        </div>
        <div class="mb-3">
            <label for="authorName" class="form-label">Author4 story</label>
            <input type="text"
                   class="form-control"
                   id="authorName"
                   name="author">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
