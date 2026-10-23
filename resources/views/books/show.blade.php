<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Book Details</h2></x-slot>
    <div class="py-12"><div class="max-w-3xl mx-auto sm:px-6 lg:px-8"><div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h3 class="text-2xl font-bold mb-4">{{ $book->title }}</h3>
        <p class="mb-2"><strong>ISBN:</strong> {{ $book->isbn }}</p>
        <p class="mb-2"><strong>Author:</strong> {{ $book->author }}</p>
        <p class="mb-2"><strong>Publisher:</strong> {{ $book->publisher }} ({{ $book->publication_year }})</p>
        <p class="mb-2"><strong>Category:</strong> {{ $book->category }}</p>
        <p class="mb-2"><strong>Available:</strong> <span class="{{ $book->isAvailable() ? 'text-green-600' : 'text-red-600' }}">{{ $book->available }} / {{ $book->quantity }}</span></p>
        @if($book->description)<p class="mb-4"><strong>Description:</strong> {{ $book->description }}</p>@endif
        <div class="flex gap-2 mt-6">
            @if($book->isAvailable())<a href="{{ route('borrowings.create', $book) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Borrow</a>@endif
            <a href="{{ route('books.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Back</a>
        </div>
    </div></div></div>
</x-app-layout>
