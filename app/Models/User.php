<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class User extends Model implements Authenticatable
{
    use HasFactory;
    use BasicAuthenticatable;

    protected $table = 'User';
    protected $primaryKey = 'id';
    public $timestamps = false;    

    public function permiss()
    {
        return $this->hasOne('App\Models\Permiss','userid','id');
    }

}
