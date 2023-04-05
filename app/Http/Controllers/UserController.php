<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Phone;
use App\Models\Groups;
// use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    private $users;
    const _PER_PAGE = 5;
    protected $groups;
    public function __construct(){
        $this -> users = new User;
    }
    public function index(Request $request){
        $filters = [];
        $keywords = null;
        if(!empty($request->status)){
            $status = $request->status;
            if($status == 'active'){
                $status = 1;
            } else {
                $status = 0;
            }
            $filters[] = ['users.status', '=', $status];
            
        }
        if(!empty($request->group_id)){
            $group_id = $request->group_id;
            $filters[] = ['users.group_id', '=', $group_id];
            
        }
        if(!empty($request->keywords)){
            $keywords = $request->keywords; 
        }
        // xu ly  logic sap xep
        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type');
        $allowSort = ['asc', 'desc'];
        if(!empty($sortType) && in_array($sortType, $allowSort)){
            if($sortType == 'desc') {
                $sortType = 'asc';
            } else {
                $sortType = 'desc';
            }
        } else {
            $sortType = 'asc';
        }

        $sortArr = [
            'sortBy' => $sortBy,
            'sortType' => $sortType
        ];
        $userList= $this->users->LearnQueryBuilder($filters, $keywords , $sortArr, self::_PER_PAGE);
        // $userList = $this->users->getAll();
        $title = "list user";
        return view('clients.user.list', compact('title', 'userList','sortType'));
    }

    public function add(){
        $title = 'create User';
        $allGroups = getAllGroups();
        return view('clients.user.add', compact('title' , 'allGroups'));
    }

    public function postAdd(UserRequest $request){
        $dataInsert = [
            'fullname' =>  $request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
        ];
        $post = User::create($dataInsert);
        return redirect()->route('user.index')->with('msg','Thêm người dùng thành công');
    }

    public function getEdit($id){
        $allGroups = getAllGroups();
        $title = 'Edit user';
        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);
            if(!empty($userDetail)){
                $userDetail = $userDetail[0];
            }else{
                return redirect()->route('user.index')->with('msg', 'Người dùng không tồn tại');
            }
        }else{
            return redirect()->route('user.index')->with('msg', 'Liên kết kết không tồn tại');
        }
        return view('clients.user.edit', compact('title','userDetail',  'allGroups'));
    }

    public function postEdit(EditUserRequest $request, $id){
        // $data = [
        //     $request->fullname,
        //     $request->email,
        //     date('Y-m-d H:i:s')
        // ];

        $data = [
            'fullname' =>  $request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->users->updateUser($data,$id);
        return redirect()->route('user.index')->with('msg', 'update user thanh cong');
    }

    public function delete($id){
        if(!empty($id)){
            $this->users->deleteUser($id);
            return redirect()->route('user.index')->with('msg', 'xoa user thanh cong');
        }else{
            return redirect()->route('user.index')->with('msg', 'lien ket khong ton tai');
        }
    }

    public function relations(){
        // quan he 1:1
        // $user = User::find(4)->phone;
        // dd($user);

        // lien ket nguoc
        // $user = Phone::where('phone', '111')->first()->user;
        // dd($user);

        // Quan he 1 nhieu

        // $users = Groups::find(1)->users()->where('email', 'pdinhduyen@gmail.com')->get();
        // if($users -> count() > 0){
        //     foreach ($users as $user){
        //         echo $user->fullname. '<br/>';
        //     }
        // }

        $user = User::find(6)->group;
        dd($user);
    }
}