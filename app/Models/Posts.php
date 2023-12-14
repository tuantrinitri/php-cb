<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table='posts';
    protected $fillable=[
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
        'create_at',
        'update_at',
    ];
}
