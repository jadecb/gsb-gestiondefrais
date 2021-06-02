<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FicheDeFrais extends Model
{
    use HasFactory;

    protected $table = 'FicheDeFrais';
    protected $primaryKey = 'id';
    public $timestamps = false;

    
    public function user()
    {
        return $this->hasOne('App\Models\User','id','userid')->select('nom', 'prenom');

    }

    public function etat()
    {
        return $this->hasOne('App\Models\Etat','id','etatid')->select('libelle');

    }

}
