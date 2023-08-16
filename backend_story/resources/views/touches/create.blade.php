
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Touch') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/touches" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-3">
                            <label for="page_id" class="form-label">Page Id</label>
                            <input type="number"
                                   class="form-control"
                                   id="page_id"
                                   name="page_id"
                                   placeholder="input page_id">
                        </div>
                        <div class="mb-3">
                            <label for="data" class="form-label">Data</label>
                            <input type="text"
                                   class="form-control"
                                   id="data"
                                   name="data"
                                   placeholder="input data">
                        </div>
                        <div class="mb-3">
                            <label for="text_id" class="form-label">Text Id</label>
                            <input type="number"
                                   class="form-control"
                                   id="text_id"
                                   name="text_id"
                                   placeholder="input text_id">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
