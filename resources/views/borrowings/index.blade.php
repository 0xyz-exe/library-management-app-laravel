<x-app-layout>
    <x-slot name="header"><div class="flex justify-between items-center"><h2 class="font-semibold text-xl text-gray-800 leading-tight">My Borrowings</h2><a href="{{ route('books.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Browse Books</a></div></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(session('success'))<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>@endif
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            @if($borrowings->isEmpty())<p class="text-gray-500 text-center py-8">No borrowings yet.</p>@else
            <table class="min-w-full divide-y divide-gray-200"><thead class="bg-gray-50"><tr><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Book</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Borrowed</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Due</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th></tr></thead><tbody class="bg-white divide-y divide-gray-200">
            @foreach($borrowings as $borrowing)<tr><td class="px-6 py-4"><div class="font-medium">{{ $borrowing->book->title }}</div><div class="text-sm text-gray-500">{{ $borrowing->book->author }}</div></td><td class="px-6 py-4 text-sm">{{ $borrowing->borrowed_date->format('M d, Y') }}</td><td class="px-6 py-4 text-sm">{{ $borrowing->due_date->format('M d, Y') }}</td><td class="px-6 py-4"><span class="px-2 py-1 text-xs rounded {{ $borrowing->status === 'returned' ? 'bg-green-100 text-green-800' : ($borrowing->isOverdue() ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">{{ ucfirst($borrowing->status) }}{{ $borrowing->isOverdue() ? ' (Overdue)' : '' }}</span></td><td class="px-6 py-4">
                @if($borrowing->status === 'borrowed')<form action="{{ route('borrowings.return', $borrowing) }}" method="POST" class="inline"><@csrf<button type="submit" class="text-blue-600 hover:text-blue-900 text-sm">Return</button></form>@else<span class="text-gray-400 text-sm">Returned {{ $borrowing->returned_date->format('M d, Y') }}</span>@endif
            </td></tr>@endforeach
            </tbody></table><div class="mt-4">{{ $borrowings->links() }}</div>@endif
        </div>
    </div></div>
</x-app-layout>
