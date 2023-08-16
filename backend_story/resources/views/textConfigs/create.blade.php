
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Text_config') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/textConfigs" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-3">
                            <label for="page_id" class="form-label">Page ID</label>
                            <input type="number"
                                   class="form-control"
                                   id="page_id"
                                   name="page_id"
                                   placeholder="input page_id">
                        </div>
                        <div class="mb-3">
                            <label for="text_id" class="form-label">Text ID</label>
                            <input type="number"
                                   class="form-control"
                                   id="text_id"
                                   name="text_id"
                                   placeholder="input new text">
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text"
                                   class="form-control"
                                   id="position"
                                   name="position"
                                   placeholder="input position">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
