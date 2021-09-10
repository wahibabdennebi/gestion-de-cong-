<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class CongeController extends Controller
{
    public function show()
    {  
        $events =Event::Where([['valid','1']])->get();
    #dd($events);
        
        return view('Vue_conge')->with ('events',$events);
        
    }
     public function search(Request $request)
    {
       # dd($request);
        $search=$request->get('search');
       # $events =Event::Where([['titre','like','%'.$search. '%'],['valid','1']])->orWhere([['start_date','like','%'.$search. '%'],['valid','1']])->paginate(5);
       $events=Event::whereBetween('start_date', [$request->firstDate, $request->secondDate])->Where([['titre','like','%'.$request->name. '%'],['valid','1']])->get();
      # dd($events);
        return view('Vue_conge',['events'=>$events ]);

    }
    //
}
