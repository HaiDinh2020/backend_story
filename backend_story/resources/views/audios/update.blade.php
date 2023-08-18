
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Audio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/audios/update/{{$audio->id}}" method="post" enctype="multipart/form-data">

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
                            <label for="text_id" class="form-label">Text Id</label>
                            <input type="number"
                                   class="form-control"
                                   id="text_id"
                                   name="text_id"
                                   value="{{$audio->text_id}}">
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">old audio</label>
                            <br>
                            <audio controls >
                                <source src="/storage/audios/{{$audio->audio}}" type="audio/mpeg">
                            </audio>
                            <br>
                            <label for="audio" class="form-label">new audio</label>
                            <input type="file"
                                   class="form-control"
                                   accept=".audio, .mpeg, .mp3"
                                   id="audio"
                                   name="audio">
                        </div>
                        <button type="submit" class="btn btn-primary bg-blue-500">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
