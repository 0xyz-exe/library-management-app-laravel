<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Borrow Book</h2></x-slot>
    <div class="py-12"><div class="max-w-2xl mx-auto sm:px-6 lg:px-8"><div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        @if($errors->has('error'))<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">{{ $errors->first('error') }}</div>@endif
        <h3 class="text-xl font-semibold mb-4">{{ $book->title }}</h3>
        <p class="mb-4 text-gray-600">by {{ $book->author }}</p>
        <form action="{{ route('borrowings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <div class="mb-4"><label class="block text-sm font-medium text-gray-700">Borrowed Date</label><input type="date" name="borrowed_date" value="{{ old('borrowed_date', date('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>@error('borrowed_date')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror</div>
            <div class="mb-4"><label class="block text-sm font-medium text-gray-700">Due Date</label><input type="date" name="due_date" value="{{ old('due_date', date('Y-m-d', strtotime('+14 days'))) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>@error('due_date')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror</div>
            <div class="flex gap-2"><button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Borrow</button><a href="{{ route('books.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancel</a></div>
        </form>
    </div></div></div>
</x-app-layout>
