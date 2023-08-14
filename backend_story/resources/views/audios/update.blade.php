@extends('layouts.app')

@section('content')

    <form action="/audios/update/{{$audio->id}}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="text" class="form-label">old audio</label>
            <br>
            <audio controls >
                <source src="/storage/audios/{{$audio->audio}}" type="audio/mpeg">
            </audio>
            <br>
            <label for="audio" class="form-label">new audio</label>
            <input type="file"
                   class="form-control"
                   accept=".audio, .mpeg, .mp3"
                   id="audio"
                   name="audio">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
