@extends('layouts.app')

@section('content')

    <form action="/touches" method="post" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label for="page_id" class="form-label">Page Id</label>
            <input type="number"
                   class="form-control"
                   id="page_id"
                   name="page_id"
                   placeholder="input page_id">
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="text"
                   class="form-control"
                   id="data"
                   name="data"
                   placeholder="input data">
        </div>
        <div class="mb-3">
            <label for="text_id" class="form-label">Text Id</label>
            <input type="number"
                   class="form-control"
                   id="text_id"
                   name="text_id"
                   placeholder="input text_id">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
