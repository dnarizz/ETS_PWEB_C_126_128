<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $table = 'borrowings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_user',
        'id_book',
        'borrow_date',
        'due_date',
        'return_date',
        'fine',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'id');
    }
}
