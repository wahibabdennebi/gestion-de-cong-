<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class CongeController extends Controller
{
    public function show()
    {  
        
        $events =Event::Where([['valid','1'],['user_id',auth()->user()->id]])->get();
        
        return view('Vue_conge')->with ('events',$events);
        
    }
    //
}
