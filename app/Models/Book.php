<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'book_category_id',
        'description',
        'quantity',
        'file_path',
        'cover_path',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookCategory()
    {
        return $this->belongsTo(BookCategory::class);
    }

    public function scopeUncategorized($query)
    {
        return $query->whereNull('book_category_id');
    }
}
