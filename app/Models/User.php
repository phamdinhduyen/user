<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Phone;
use App\Models\Groups;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name','email','password','fullname', 'email', 'group_id','status','country_id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $table ='users';
    public $timestamps = true;


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