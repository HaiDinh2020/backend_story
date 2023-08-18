
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/pages/update/{{$page->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="story_id" class="form-label">ID story</label>
                            <input type="text"
                                   class="form-control"
                                   id="story_id"
                                   name="story_id" value="{{$page->story_id}}">
                        </div>
                        <div class="mb-3">
                            <label for="background" class="form-label">background page</label>

                            <img src="{{asset('/storage/backgrounds/'.$page->background)}}" alt="{{$page->background}}"
                                 width="100px"
                                 height="100px">

                            <input type="file"
                                   class="form-control"
                                   id="background"
                                   accept=".png, .jpg, .jpeg"
                                   name="background" >
                        </div>


                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
