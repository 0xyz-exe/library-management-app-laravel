<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Book</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('books.update', $book) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div><label class="block text-sm font-medium text-gray-700">ISBN</label><input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>@error('isbn')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror</div>
                        <div><label class="block text-sm font-medium text-gray-700">Title</label><input type="text" name="title" value="{{ old('title', $book->title) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>@error('title')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror</div>
                        <div><label class="block text-sm font-medium text-gray-700">Author</label><input type="text" name="author" value="{{ old('author', $book->author) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>@error('author')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror</div>
                        <div><label class="block text-sm font-medium text-gray-700">Publisher</label><input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>@error('publisher')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror</div>
                        <div><label class="block text-sm font-medium text-gray-700">Year</label><input type="number" name="publication_year" value="{{ old('publication_year', $book->publication_year) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>@error('publication_year')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror</div>
                        <div><label class="block text-sm font-medium text-gray-700">Category</label><input type="text" name="category" value="{{ old('category', $book->category) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>@error('category')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror</div>
                        <div><label class="block text-sm font-medium text-gray-700">Quantity</label><input type="number" name="quantity" value="{{ old('quantity', $book->quantity) }}" min="1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>@error('quantity')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror</div>
                        <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700">Description</label><textarea name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description', $book->description) }}</textarea>@error('description')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror</div>
                    </div>
                    <div class="flex gap-2 mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                        <a href="{{ route('books.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
