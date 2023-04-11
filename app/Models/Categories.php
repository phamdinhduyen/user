<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function post(){
        return $this->belongsToMany(
            Post::class,
            'categories_posts',
            'categorie_id',
            'post_id'
        );
    }
}