<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author_name', 'publisher_name', 'publisher_year'];
}