
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Story') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/stories/update/{{$story->id}}" method="post" enctype="multipart/form-data">

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

                        <button class="btn btn-primary m-1">Update story</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
