<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $table='equipes';
    protected $fillable = ['id','name'];


    //

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
  