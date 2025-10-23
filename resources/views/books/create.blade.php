<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Add New Book</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Title" class="border p-2 w-full mb-2">
            <input type="text" name="author" placeholder="Author" class="border p-2 w-full mb-2">
            <input type="text" name="genre" placeholder="Genre" class="border p-2 w-full mb-2">
            <input type="text" name="stock" placeholder="Stock" class="border p-2 w-full mb-2">
            <input type="text" name="description" placeholder="Description" class="border p-2 w-full mb-2">
            <button class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</x-app-layout>
