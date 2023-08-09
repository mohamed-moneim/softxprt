<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Borrow extends Model
{
    use HasFactory;
    public function Customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class);
    }
    public function Books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
