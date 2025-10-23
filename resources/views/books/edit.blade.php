<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Kontainer Formulir -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl sm:rounded-lg">
                <div class="p-8 md:p-10 text-gray-900 dark:text-gray-100">
                    
                    <h3 class="text-2xl font-bold mb-6 border-b pb-2 border-gray-200 dark:border-gray-700">
                        Mengubah Detail Buku: <span class="text-red-600 dark:text-red-400">{{ $book->title }}</span>
                    </h3>
                    
                    <form action="{{ route('books.update', $book) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <!-- Title-->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" required
                                class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm w-full p-3">
                            @error('title')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Author -->
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Author</label>
                            <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" required
                                class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm w-full p-3">
                            @error('author')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Genre -->
                        <div>
                            <label for="genre" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Genre</label>
                            <input type="text" name="genre" id="genre" value="{{ old('genre', $book->genre) }}"
                                class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm w-full p-3">
                            @error('genre')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Stock-->
                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Stock</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock', $book->stock) }}" required min="0"
                                class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm w-full p-3">
                            @error('stock')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                            <textarea name="description" id="description" rows="3"
                                class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm w-full p-3">{{ old('description', $book->description) }}</textarea>
                            @error('description')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        
                        <div class="flex justify-end space-x-3 pt-4">
                            <!-- Tombol Batal -->
                            <a href="{{ route('books.index') }}" 
                               class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 shadow-sm transition duration-150">
                                Batal
                            </a>
                            
                            <!-- Tombol Update  -->
                            <button type="submit" 
                                class="inline-flex items-center px-6 py-2 border border-transparent text-sm font-medium rounded-md shadow-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150">
                                 Update Book
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>