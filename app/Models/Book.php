<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = [
        'isbn',
        'title',
        'author',
        'publisher',
        'publication_year',
        'category',
        'quantity',
        'available',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'publication_year' => 'integer',
            'quantity' => 'integer',
            'available' => 'integer',
        ];
    }

    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class);
    }

    public function isAvailable(): bool
    {
        return $this->available > 0;
    }

    public function decrementAvailable(): void
    {
        $this->decrement('available');
    }

    public function incrementAvailable(): void
    {
        $this->increment('available');
    }
}
