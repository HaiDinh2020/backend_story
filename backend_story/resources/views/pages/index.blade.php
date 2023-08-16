
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($pages as $pages)
                        <li class="list-group-item d-flex justify-content-between align-items-center">

                            <div class="ms-2 me-auto d-flex">
                                <div class="m-2">
                                    <div class="fw-bold">Page_id : {{$pages->id}}</div>
                                    <div class="fw-bold">Story_id : {{$pages->story_id}}</div>
                                </div>
                                <img src="{{asset('/storage/backgrounds/'.$pages->background)}}" alt="{{$pages->background}}"
                                     width="300px"
                                     height="200px">
                            </div>


                            <a href="pages/edit/{{$pages->id}}"
                               class="m-1">
                                <button class="badge bg-primary rounded-pill">
                                    Edit
                                </button>
                            </a>
                            <a href="pages/delete/{{$pages->id}}">
                                <button class="badge bg-primary rounded-pill">
                                    Delete
                                </button>
                            </a>
                        </li>

                    @endforeach
                    <a href="/pages/create">
                        <button class="btn btn-primary">Create new page</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
