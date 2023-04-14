<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mechanic;
use App\Models\Country;
use App\Models\Categories;
use App\Models\Groups;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\DBAL\TimestampType;

class OrmController extends Controller
{
    public function index(){
        $owner = Mechanic::find(1)->carOwner;
        dd($owner);
    }

    // GET bai bai post co country 1
    // public function posts(){
    //     $post = Country::find(2)->posts;
    //     dd($post);
    // }

    // many to many
    // tim nhung bai post cua Categories voi id =1 
    // public function posts(){
    //     $post = Categories::find(1)->post;
    //     dd($post);
    // }

    // public function posts(){
    //     $Categories = Post::find(3)->Categories;
    //     dd($Categories);
    // }

    // public function posts(){
    //     $user = Groups::find(1)->users;
    //     dd($user);
    // }

    // public function posts(){
    //     $groups = User::find(1)->group;
    //     dd($groups);
    // }

    // public function posts(){
    //     $users = Groups::find(2)->users()->where('id', '=', '2')->get();
    //     dd($users);
    // }

    // public function posts(){
    //     $users = User::all();
    //     foreach($users as $user){
    //         if(!empty($user->group->name)){
    //             $groupName = $user->group->name;
    //         } else {
    //             echo " khong ton tai";
    //         }
    //         echo $groupName. '<br/>';
    //     }
    // }

    // lay bai post co it nhat 1 comment
    // public function posts(){
    //     $posts = Post::has('Comments')->get();
    //     dd($posts);
        
    // }

    // lay bai pos co it nhat 2 comment
    // public function posts(){
    //     $posts = Post::has('Comments', '>=2')->get();
    //     dd($posts);  
    // }
 
    // lay bai post co it nhat 1 comment va hinh anh
    // public function posts(){
    //     $posts = Post::whereHas('Comments', function ($sql) {
    //         $sql->whereNotNull('image');
    //     })->get();
    //     dd($posts);
    // }

    // lay bai post khong co comment or co comment khong có image
    // public function posts(){
    //     $posts = Post::whereDoesntHave('Comments', function ($sql) {
    //         $sql->whereNotNull('image');
    //     })->get();
    //     dd($posts);
    // }

    // Kiem tra so luong binh luan cua nhung bai post
    // public function posts(){
    //     $posts = Post::withCount('Comments')->get();
    //     foreach ($posts as $post) {
    //     echo $post->comments_count;
    //     }
    // }

    public function posts(){
        // $users = User::all();
        //     foreach($users as $user){
        //         if(!empty($user->group->name)){
        //         echo $user->group->name;
        //     }
        // }

        // $users = User::with('group')->get();
        //     foreach($users as $user){
        //         if(!empty($user->group->name)){
        //         echo $user->group->name. '<br/>';
        //     }
        // }

        //them du lieu Comment
        // $post = Post::find(2);
        // $comment = new Comment([
        //     'name' => 'Van A',
        //     'content' => 'duyen',
       
        // ]);
        // $post->comments()->save( $comment);

        //update
        $comment = Comment::find(6);
        $data = [
            'name' => 'Van A',
            'content' => 'duyeasdsan'
        ];
        $comment->update($data);
      
    }
}