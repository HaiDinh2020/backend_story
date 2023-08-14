@extends('layouts.app')

@section('content')

    <form action="/audios" method="post" enctype="multipart/form-data">

        @csrf
        <div class=" mb-3">
            <label for="audio" class="form-label">new audio</label>
            <input type="file"
                   class="form-control"
                   accept=".audio, .mpeg, .mp3"
                   id="audio"
                   name="audio" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
