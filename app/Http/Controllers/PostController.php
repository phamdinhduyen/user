<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
 

    public function index(){
        // $allPost = Post::all();
        $allPost = Post::withTrashed()->orderBy('id','DESC')->get();
        // if($allPost -> count() > 0) {
        //     foreach($allPost as $item) {
        //         echo $item->title . '<br/>';
        //     }
        // }

        // $post = Post::where('status', 0)->get();
        // if($post -> count() > 0) {
        //     foreach($post as $item) {
        //         echo $item->title . '<br/>';
        //     }
        // }

        // $posts = $allPost->reject(function ($allPost) {
        //     return $allPost->status==1;
        // });

        // Post::chunk(2, function ($posts) {
        //  foreach ($posts as $post) {
        //         echo $post->title . "<br>";
        //     }
        //     echo 'ketThuc';
        // });
        $title = 'List post';
       
     
        return view('clients.posts.list', compact('title','allPost'));

    }

    public function add(){
        $title = 'Create post';
        return view('clients.posts.add', compact('title'));
    }

    public function postAdd(Request $request){
        $rules = [
            'title' => 'required|min:3',
            'content' => 'required|min:3',
        ];
        $messages = [
            'title.required' => 'Trường này bắt buộc phải nhập',
            'content.required' => 'Trường này bắt buộc phải nhập'
        ];
        $request->validate($rules, $messages);
          $data = [
            'title' => $request->title,
            'content' => $request->content,
            
        ];
        $post = Post::create($data);
        return redirect()->route('posts.index')->with('msg', 'Thêm thành công');
    }

    public function update($id){
        $post = Post::find($id);
        $data = [
            'title' => 'Thong bao',
            'content' => 'cap nhat',
        ];
        $post->update($data);
 
    }

    public function delete($id){
        Post::destroy($id);
    }

    public function handleDeleteAny(Request $request){
        $deleteArr = $request->delete;
    
        if(!empty($deleteArr)){
            $status = Post::destroy($deleteArr);
            if($status){
                $msg = 'Bạn đã xóa thành công' . count($deleteArr) . 'bài viết';
            } else {
                $msg = 'Bạn không thể xóa bài viết vào lúc này';
            }
        } else {
           $msg = 'Bạn cần chọn vào ô cần xóa';
        }
        return redirect()->route('posts.index')->with('msg', $msg);
    }

    public function restore($id){
        $post = Post::onlyTrashed()->where('id', $id)->first();
        if(!empty($post)){
            $post->restore();
            return redirect()->route('posts.index')->with('msg', 'Khôi phục thành công');
        } else {
            return redirect()->route('posts.index')->with('msg', 'Khôi phục thất bại');
        }
    }
}