<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Phone;
use App\Models\Groups;
class User extends Model
{
    use HasFactory;
    protected $table ='users';
    public $timestamps = true;
    protected $fillable = ['fullname', 'email', 'group_id','status'];

    // quan he 1 nhieu
    public function phone(){
        return $this->hasOne(
            Phone::class,
            'user_id',
            'id'
        );
    }



    //  lien ket nguoc
     public function group(){
        return $this->belongsTo(
            Groups::class,
            'group_id',
            'id'
        );
    }
    public function LearnQueryBuilder($filters, $keywords = null, $sortArr = null,  $perPage = null){
        $users = DB::table($this->table)
            ->select('users.*', 'groups.name as group_name')
            ->join('groups', 'users.group_id', '=', 'groups.id');

        $orderBy = 'users.id';
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