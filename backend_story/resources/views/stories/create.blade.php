
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Story') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/stories" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-3">
                            <label for="storyName" class="form-label">Name story</label>
                            <input type="text"
                                   class="form-control"
                                   id="storyName"
                                   name="name">
                        </div>
                        <div class=" mb-3">
                            <label for="storyThumbnail" class="form-label">Thumbnail story</label>
                            <input type="file"
                                   class="form-control"
                                   accept=".png, .jpg, .jpeg"
                                   name="storyThumbnail" >
                        </div>
                        <div class="mb-3">
                            <label for="authorName" class="form-label">Author4 story</label>
                            <input type="text"
                                   class="form-control"
                                   id="authorName"
                                   name="author">
                        </div>

                        <button  class="btn btn-primary m-1">Create story</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
