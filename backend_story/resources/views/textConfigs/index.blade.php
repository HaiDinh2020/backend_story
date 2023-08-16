
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Text_Config') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table">
                        <caption>List of text-configs</caption>
                        <thead>
                        <tr>
                            <th scope="col">Page_id</th>
                            <th scope="col">Text_id</th>
                            <th scope="col">Position</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($textConfigs as $textConfigs)
                            <tr>
                                <td>{{$textConfigs->page_id}}</td>
                                <td>{{$textConfigs->text_id}}</td>
                                <td>{{$textConfigs->position}}</td>
                                <td>
                                    <a href="/textConfigs/edit/{{$textConfigs->id}}"><button class="btn btn-primary">Edit</button> </a>
                                    <a href="/textConfigs/delete/{{$textConfigs->id}}"><button class="btn btn-danger">Delete</button> </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <a href="/textConfigs/create" >
                        <button class="btn btn-success m-1">Create new text</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
