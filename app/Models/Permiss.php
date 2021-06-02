<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiss extends Model
{
    use HasFactory;

    protected $table = 'Permiss';
    protected $primaryKey = 'userid';
    public $timestamps = false;

    public function role()
    {
        return $this->hasOne('App\Models\Role','id','roleid');
    }

    public function user()
    {
        return $this->hasMany('App\Models\User','id','userid');
    }
}
