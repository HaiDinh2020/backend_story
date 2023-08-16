
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Audio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/audios" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-3">
                            <label for="text_id" class="form-label">Text ID</label>
                            <input type="number"
                                   class="form-control"
                                   min="0"
                                   id="text_id"
                                   name="text_id">
                        </div>
                        <div class=" mb-3">
                            <label for="audio" class="form-label">new audio</label>
                            <input type="file"
                                   class="form-control"
                                   accept=".audio, .mpeg, .mp3"
                                   id="audio"
                                   name="audio" >
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

