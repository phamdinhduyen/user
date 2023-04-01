<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    private $groups;
     public function __construct(){
        $this -> groups = new Groups;
    }
    public function index(){
        $title = 'create group';
        return view('clients.user.groups', compact('title'));
    }

    public function add(Request $request){
        $rules = [
            'name' => 'required|min:3',
        ];
        $messages = [
            'name.required' => 'Trường này bắt buộc phải nhập'
        ];
    
        $request->validate($rules, $messages);

        $data = [
            'name' => $request->name,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->groups->create($data);
        return redirect()->route('user.index')->with('msg', 'Tạo nhóm thành công');
    }
}