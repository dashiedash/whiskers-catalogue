<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listings extends Model
{
    use HasFactory;

    /*
             $table->string('author_last_name');
            $table->string('author_first_name');
            $table->year('publish_year');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('publisher');
            $table->string('publish_place');
            $table->string('distributor');
            $table->longText('description');
            $table->string('cover');
            $table->integer('stock');
            $table->decimal('price', $precision = 6, $scale = 2);
            */

    protected $fillable = ['author_last_name', 'author_first_name', 'publish_year', 'title', 'subtitle', 'publisher', 'publish_city','publish_state','publish_country', 'description', 'cover', 'stock', 'isbn', 'price'];
}
