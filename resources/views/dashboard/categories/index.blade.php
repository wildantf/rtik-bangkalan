@extends('dashboard.layouts.main')
@section('content')

    <div class="m-5 bg-cyan-50 dark:bg-gray-800 p-5 rounded-lg shadow-lg">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white mb-5">Categories</h2>
        <div class="block">
            @if (session()->has('success'))
                <x-alert type="success" message="{{ session('success') }}" />
            @endif
        </div>
        <div class="flex flex-col" id="row-category">
            @foreach ($categories as $category)
                <form action="/dashboard/categories/{{ $category->slug }}" method="POST">
                    @method('put')
                    @csrf
                    {{-- FIXME: perbaiki error message --}}
                    <div
                        class="flex-col md:flex-row inline-flex w-full md:items-end bg-opacity-90 bg-{{ $category->color }}-400 rounded-lg p-3 my-1">
                        <div class="flex-1 px-0.5 md:px-1">
                            <label class="text-gray-900 text-sm">
                            </label>
                            Name
                            <input type="text"
                                class="w-full ring-1 rounded-lg border-transparent appearance-none border border-gray-300 py-1 px-2 bg-{{ $category->color }}-200 text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                id="name_{{ $category->id }}" name="name" value="{{ $category->name }}"
                                onkeyup="createSlug({{ $category->id }})" required/>
                            @error('name')
                                <p class="flex text-sm text-red-500 -bottom-6">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>
                        <div class="flex-1 px-0.5 md:px-1">
                            <label class="text-gray-800 text-sm">
                                Slug
                            </label>
                            <input type="text"
                                class="w-full ring-1 rounded-lg border-transparent appearance-none border border-gray-300 py-1 px-2 bg-gray-200 text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                id="slug_{{ $category->id }}" name="slug" value="{{ $category->slug }}"
                                oninput="showSaveBtn({{ $category->id }})" readonly required/>
                            @error('slug')
                                <p class="absolute text-sm text-red-500 -bottom-6">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="flex-1 px-0.5 md:px-1 ">
                            <label class="text-gray-900 text-sm">
                                Color
                            </label>
                            <input type="text"
                                class="w-full ring-1 rounded-lg border-transparent appearance-none border border-gray-300 py-1 px-2 bg-{{ $category->color }}-200 text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                id="color_{{ $category->id }}" name="color" value="{{ $category->color }}"
                                onkeypress="showSaveBtn({{ $category->id }})" required/>
                            @error('color')
                                <p class="absolute text-sm text-red-500 -bottom-6">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="px-0.5 my-2 md:my-0 md:px-1">
                            <button id="btn_{{ $category->id }}"
                                class="rounded-lg bg-opacity-90 bg-cyan-500 px-4 py-1 border text-white font-semibold hover:bg-cyan-700 hover:text-gray-200 disabled:opacity-50"
                                type="submit" disabled> Update </button>
                            <form action="dashboard/categories/{{ $category->slug }}" method="POST">
                                @method('delete')
                                @csrf
                                <button id="btn_{{ $category->id }}"
                                    class="rounded-lg bg-opacity-90 bg-red-500 px-4 py-1 border text-white font-semibold hover:bg-red-700 hover:text-gray-200"
                                    type="submit"> Delete </button>
                            </form>
                        </div>

                    </div>
                </form>
            @endforeach

            {{-- FORM NEW CATEGORY --}}
            <form action="/dashboard/categories" method="POST" id="form-new-category" class="hidden">
                @csrf
                <div class="flex-col md:flex-row inline-flex w-full md:items-end bg-gray-400 rounded-lg p-3 my-1">
                    <div class="flex-1 px-0.5 md:px-1">
                        <label class="text-gray-900 text-sm">
                            Name
                        </label>
                        <input type="text"
                            class="w-full ring-1 rounded-lg border-transparent appearance-none border border-gray-300 py-1 px-2 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                            name="name" id="name_new_store" value="{{ old('name') }}"
                            onkeypress="createSlug('new_store')" required/>
                        @error('name')
                            <p class="flex text-sm text-red-500 -bottom-6">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex-1 px-0.5 md:px-1">
                        <label class="text-gray-900 text-sm">
                            Slug
                        </label>
                        <input type="text"
                            class="w-full ring-1 rounded-lg border-transparent appearance-none border border-gray-300 py-1 px-2 bg-gray-200 text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                            name="slug" id="slug_new_store" value="{{ old('slug') }}" readonly required/>
                        @error('slug')
                            <p class="absolute text-sm text-red-500 -bottom-6">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex-1 px-0.5 md:px-1">
                        <label class="text-gray-900 text-sm">
                            Color
                        </label>
                        <input type="text"
                            class="w-full ring-1 rounded-lg border-transparent appearance-none border border-gray-300 py-1 px-2 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                            name="color" value="{{ old('color') }}" required/>
                        @error('color')
                            <p class="absolute text-sm text-red-500 -bottom-6">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="px-0.5 my-2 md:my-0 md:px-1">
                        <button
                            class="rounded-lg bg-opacity-90 bg-cyan-500 px-4 py-1 border text-white font-semibold hover:bg-cyan-700 hover:text-gray-200"
                            type="submit"> Add </button>
                    </div>

                </div>
            </form>
        </div>


        <div class="mt-4 flex w-auto justify-center">
            <button id="add-btn"
                class="text-gray-400 flex items-center text-center px-6 py-2  transition ease-in duration-200 uppercase rounded-full hover:bg-gray-300 dark:hover:bg-gray-800 hover:text-white hover:border-white border-2 border-gray-300 dark:border-gray-400 focus:outline-none"
                value="add">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
            </button>
        </div>

        <div class="my-5">
            {{ $categories->links() }}
        </div>

    </div>

    <script>
        // FIXME: pindah function kedalam jquery
        function createSlug(categ_id) {
            const name = document.querySelector('#name_' + categ_id);
            const slug = document.querySelector('#slug_' + categ_id);

            name.addEventListener('change', function() {
                fetch('/dashboard/categories/checkSlug?name=' + name.value)
                    .then(response => response.json())
                    .then(data => slug.value = data.slug)
            });
        }

        function showSaveBtn(categ_id) {
            document.querySelector('#btn_' + categ_id).disabled = false;
        }

        $(document).ready(function() {
            $('#add-btn').on('click', function() {
                // $(this).toggleClass()
                $('#form-new-category').fadeToggle(1500);
                if ($(this).val() == 'add') {
                    $(this).val('back');
                    $(this).html(
                        ` <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>`
                    );

                } else {
                    $(this).val('add');
                    $(this).html(
                        ` <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>`
                    );
                }
            })
        });
    </script>
@endsection
