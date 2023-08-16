
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Text') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/texts/update/{{$text->id}}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="text" class="form-label">Text</label>
                            <input type="text"
                                   class="form-control"
                                   id="text"
                                   name="text"
                                   value="{{$text->text}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
