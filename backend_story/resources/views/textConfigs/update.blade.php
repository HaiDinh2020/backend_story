@extends('layouts.app')

@section('content')

    <form action="/textConfigs/update/{{$textConfig->id}}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="page_id" class="form-label">Page ID</label>
            <input type="number"
                   class="form-control"
                   id="page_id"
                   name="page_id"
                   placeholder="input page_id"
                   value="{{$textConfig->page_id}}">
        </div>
        <div class="mb-3">
            <label for="text_id" class="form-label">Text ID</label>
            <input type="number"
                   class="form-control"
                   id="text_id"
                   name="text_id"
                   placeholder="input new text"
                   value="{{$textConfig->text_id}}">
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text"
                   class="form-control"
                   id="position"
                   name="position"
                   placeholder="input position"
                   value="{{$textConfig->position}}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
