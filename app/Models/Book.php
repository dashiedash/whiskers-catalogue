<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['author_last_name', 'author_first_name', 'publish_year', 'title', 'subtitle', 'genre', 'publisher', 'publish_city', 'publish_state', 'publish_country', 'description', 'cover', 'stock', 'isbn', 'price'];

    public function scopeFilter($query, array $filters) {

    }
}
