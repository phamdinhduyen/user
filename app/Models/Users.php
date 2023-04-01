<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Users extends Model
{
    use HasFactory;
    protected $table = 'user';
    public function LearnQueryBuilder($filters, $keywords = null, $sortArr = null,  $perPage = null){
        $users = DB::table($this->table)
            ->select('user.*', 'groups.name as group_name')
            ->join('groups', 'user.group_id', '=', 'groups.id');

        $orderBy = 'user.id';
        $orderType = 'desc';

        if(!empty($sortArr) && is_array($sortArr)){
            if(!empty($sortArr['sortBy']) && !empty($sortArr['sortType']) ){
                $orderBy  = trim($sortArr['sortBy']);
                $orderType = trim($sortArr['sortType']);
            }
        };
        
        $users = $users ->orderBy($orderBy, $orderType);
        
        if(!empty($filters)){
            $users = $users->where($filters);
        }
        
        if(!empty($keywords)){
            $users = $users->where(function ($query) use ($keywords) {
                $query->orwhere('fullname', 'like', '%' . $keywords . '%');
            });
        }
        $users = $users ->orderBy('id', 'desc');
     
        if(!empty($perPage)){
            $users = $users->paginate($perPage)->withQueryString();
        } else {
            $users = $users->get(); 
        }
        return $users;
    }
    public function addUser($data){
        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id){
        $user = DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ? ', [$id]);
        return $user;
    }

    public function updateUser($data, $id){
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    public function deleteUser($id){
        return DB::table($this->table)->where('id', $id)->delete();
    }
   
}