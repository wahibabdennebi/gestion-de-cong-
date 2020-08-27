<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model 
{
    protected $table='events';
    protected $fillable=['titre','type','color','start_day','end_day','valid','user_id'];
    
}
