
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Text') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table">
                        <caption>List of texts</caption>
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Text</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($texts as $texts)
                            <tr>
                                <td>{{$texts->id}}</td>
                                <td>{{$texts->text}}</td>
                                <td>
                                    <a href="/texts/edit/{{$texts->id}}"><button class="btn btn-primary">Edit</button> </a>
                                    <a href="/texts/delete/{{$texts->id}}"><button class="btn btn-danger">Delete</button> </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <a href="/texts/create" >
                        <button class="btn btn-success m-1">Create new text</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
