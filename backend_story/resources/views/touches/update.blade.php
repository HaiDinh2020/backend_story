@extends('layouts.app')

@section('content')

    <form action="/touches/update/{{$touch->id}}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="page_id" class="form-label">Page Id</label>
            <input type="number"
                   class="form-control"
                   id="page_id"
                   name="page_id"
                   value="{{$touch->page_id}}">
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="text"
                   class="form-control"
                   id="data"
                   name="data"
                   value="{{$touch->data}}">
        </div>
        <div class="mb-3">
            <label for="text_id" class="form-label">Text Id</label>
            <input type="number"
                   class="form-control"
                   id="text_id"
                   name="text_id"
                   value="{{$touch->text_id}}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
