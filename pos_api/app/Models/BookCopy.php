<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'copy_code',
        'shelf_location',
        'status', // 'AVAILABLE', 'BORROWED', 'MAINTENANCE'
    ];

    // Each copy belongs to a master Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // A copy can have multiple loan records over time
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    // Current active loan (if currently borrowed)
    public function currentLoan()
    {
        return $this->hasOne(Loan::class)->where('status', 'ACTIVE');
    }
}
