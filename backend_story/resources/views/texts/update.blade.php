@extends('layouts.app')

@section('content')

    <form action="/texts/update/{{$text->id}}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <input type="text"
                   class="form-control"
                   id="text"
                   name="text"
                   value="{{$text->text}}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
