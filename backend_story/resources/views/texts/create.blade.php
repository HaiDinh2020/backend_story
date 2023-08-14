@extends('layouts.app')

@section('content')

    <form action="/texts" method="post" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <input type="text"
                   class="form-control"
                   id="text"
                   name="text"
                   placeholder="input new text">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
