<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Categories;
use App\Models\Comment;
use App\Models\Votes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'posts';
    // Qui ước tên table
    //Tên Model: Post -> table: posts
    //Tên Model: ProductCategory: product_categories
    // Qui ước khóa chính mặc định id là khóa chính
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';
    public $timestamps = true;
    protected $fillable = ['title', 'content', 'status'];
    public function Categories(){
        return $this->belongsToMany(
            Categories::class,
            'categories_posts',
            'post_id',
            'categorie_id',
        );
    }


    public function Comments(){
        return $this->hasMany(
            Comment::class,
            'post_id',
            'id'
        );
    }

    public function votes(){
        return $this->hasMany(
            Votes::class,
            'post_id',
            'id'
        );
    }

}