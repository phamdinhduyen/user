<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Groups extends Model
{
    use HasFactory;
    protected $table = 'groups';

    //  quan he 1 nhieu
    public function users(){
        return $this->hasMany(
            User::class,
            'group_id',
            'id',
        );
    }

    public function create($data){
        return DB::table($this->table)->insert($data);
    }
    public function getAll(){
        $groups = DB::table($this->table)
        ->orderBy('name', 'ASC')
        ->get();
        return $groups;
    }
}