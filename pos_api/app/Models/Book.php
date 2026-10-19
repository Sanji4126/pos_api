<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
        'title',
        'author',
        'category',
        'description',
        'cover_image',
    ];

    // One Book has many physical copies
    public function copies()
    {
        return $this->hasMany(BookCopy::class);
    }

    // Helper: count available copies
    public function availableCopiesCount(): int
    {
        return $this->copies()->where('status', 'AVAILABLE')->count();
    }
}