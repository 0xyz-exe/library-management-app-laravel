<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Library Books') }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('borrowings.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    My Borrowings
                </a>
                <a href="{{ route('books.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Book
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    {{ $errors->first('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="GET" action="{{ route('books.index') }}" class="mb-4">
                        <div class="flex gap-2">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by title, author, ISBN, category..."
                                   class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <input type="text" name="category" value="{{ request('category') }}" placeholder="Category"
                                   class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Search
                            </button>
                            @if(request('search') || request('category'))
                                <a href="{{ route('books.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                    Clear
                                </a>
                            @endif
                        </div>
                    </form>

                    @if ($books->isEmpty())
                        <p class="text-gray-500 text-center py-8">No books found.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($books as $book)
                                <div class="border rounded-lg p-4">
                                    <h3 class="font-semibold text-lg mb-2">{{ $book->title }}</h3>
                                    <p class="text-sm text-gray-600 mb-1"><strong>Author:</strong> {{ $book->author }}</p>
                                    <p class="text-sm text-gray-600 mb-1"><strong>ISBN:</strong> {{ $book->isbn }}</p>
                                    <p class="text-sm text-gray-600 mb-1"><strong>Category:</strong> {{ $book->category }}</p>
                                    <p class="text-sm text-gray-600 mb-1"><strong>Publisher:</strong> {{ $book->publisher }} ({{ $book->publication_year }})</p>
                                    <p class="text-sm mb-3">
                                        <strong>Available:</strong> 
                                        <span class="{{ $book->isAvailable() ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $book->available }} / {{ $book->quantity }}
                                        </span>
                                    </p>
                                    <div class="flex gap-2 flex-wrap">
                                        <a href="{{ route('books.show', $book) }}" class="text-blue-600 hover:text-blue-900 text-sm">View</a>
                                        @if($book->isAvailable())
                                            <a href="{{ route('borrowings.create', $book) }}" class="text-green-600 hover:text-green-900 text-sm">Borrow</a>
                                        @endif
                                        <a href="{{ route('books.edit', $book) }}" class="text-yellow-600 hover:text-yellow-900 text-sm">Edit</a>
                                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline" onsubmit="return confirm('Delete this book?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 text-sm">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            {{ $books->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
