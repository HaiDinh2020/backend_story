
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Touch') }}
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
                            <th scope="col">Page_id</th>
                            <th scope="col">Data</th>
                            <th scope="col">Text_id</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($touches as $touches)
                            <tr>
                                <td>{{$touches->id}}</td>
                                <td>{{$touches->page_id}}</td>
                                <td>{{$touches->data}}</td>
                                <td>{{$touches->text_id}}</td>
                                <td>
                                    <a href="/touches/edit/{{$touches->id}}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                    <a href="/touches/delete/{{$touches->id}}">
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <a href="/touches/create">
                        <button class="btn btn-success m-1">Create new text</button>
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
