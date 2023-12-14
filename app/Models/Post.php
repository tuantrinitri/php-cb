<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
            'id',
            'title',
            'url',
            'description',
            'content',
            'category_id',
            'tags',
            'author',
            'source',
            'status',
            'created_at',
            'update_at'
    ];
}