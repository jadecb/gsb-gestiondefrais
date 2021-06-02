<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'Role';
    protected $primaryKey = 'id';

    public function permiss(){
        
        return $this->hasMany('App\Models\Permiss','roleid','id');
    }
}
