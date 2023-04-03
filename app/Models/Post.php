<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}