<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = auth()->user()->borrowings()
            ->with('book')
            ->orderBy('borrowed_date', 'desc')
            ->paginate(15);
        
        return view('borrowings.index', compact('borrowings'));
    }

    public function create(Book $book)
    {
        if (!$book->isAvailable()) {
            return back()->withErrors(['error' => 'Book is not available.']);
        }

        return view('borrowings.create', compact('book'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrowed_date' => 'required|date',
            'due_date' => 'required|date|after:borrowed_date',
        ]);

        $book = Book::findOrFail($validated['book_id']);

        if (!$book->isAvailable()) {
            return back()->withErrors(['error' => 'Book is not available.']);
        }

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'borrowed';

        Borrowing::create($validated);
        $book->decrementAvailable();

        return redirect()->route('borrowings.index')
            ->with('success', 'Book borrowed successfully.');
    }

    public function returnBook(Borrowing $borrowing)
    {
        if ($borrowing->user_id !== auth()->id()) {
            abort(403);
        }

        if ($borrowing->status === 'returned') {
            return back()->withErrors(['error' => 'Book already returned.']);
        }

        $borrowing->update([
            'returned_date' => now(),
            'status' => 'returned',
        ]);

        $borrowing->book->incrementAvailable();

        return redirect()->route('borrowings.index')
            ->with('success', 'Book returned successfully.');
    }
}
