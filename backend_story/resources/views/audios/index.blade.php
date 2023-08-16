
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Audio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table">
                        <caption>List of audio</caption>
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Text_id</th>
                            <th scope="col">Text</th>
                            <th scope="col">Audio</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($audios as $audios)
                            <tr>
                                <th scope="row">{{$audios->id}}</th>
                                <th scope="row">{{$audios->text_id}}</th>
                                <td>{{$audios->audio}}</td>
                                <td>
                                    <audio controls >
                                        <source src="/storage/audios/{{$audios->audio}}" type="audio/mpeg">
                                    </audio>
                                </td>
                                <td>
                                    <a href="/audios/edit/{{$audios->id}}"><button class="btn btn-primary">Edit</button> </a>
                                    <a href="/audios/delete/{{$audios->id}}"><button class="btn btn-danger">Delete</button> </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <a href="/audios/create" >
                        <button class="btn btn-success m-1">Create new audio</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

