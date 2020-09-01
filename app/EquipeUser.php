<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipeUser extends Model
{
    //
    protected $table='equipes_users';
    protected $fillable = ['user_id','equipe_id'];
}
