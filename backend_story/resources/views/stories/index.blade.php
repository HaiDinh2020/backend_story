
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Story') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($stories as $stories)
                        <li class="list-group-item d-flex justify-content-between align-items-center" >

                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{$stories->name}}</div>

                                <img src="{{asset('/storage/thumbnails/'.$stories->thumbnail)}}" alt="{{$stories->thumbnail}}"
                                     width="100px"
                                     height="100px">
                                <div>
                                    <span>ID: {{$stories->id}}</span>
                                    <span class="m-1"> Author: {{$stories->author}}</span>
                                </div>
                            </div>


                            <a href="stories/edit/{{$stories->id}}"
                               class="m-1">
                                <button  class="badge bg-primary rounded-pill">
                                    Edit
                                </button>
                            </a>
                            <a href="stories/delete/{{$stories->id}}">
                                <button  class="badge bg-primary rounded-pill">
                                    Delete
                                </button>
                            </a>
                        </li>

                    @endforeach
                    <a href="/stories/create" >
                        <button class="btn btn-primary m-1">add story</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
