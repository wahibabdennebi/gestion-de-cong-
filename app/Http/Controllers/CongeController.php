<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use Illuminate\Support\Facades\DB;

class CongeController extends Controller
{
    public function show()
    {  
        $events =Event::Where([['valid','1']])->get();
        $users=User::Where('equipe_id',auth()->user()->equipe_id)->get();
        //dd($users);
        $userss = DB::table('users')->join('events', 'user_id', '=', 'events.user_id')->join('equipes', 'equipe_id', '=', 'users.equipe_id')->get();
        dd($userss);
        $eventsArray = [];
        foreach ($events as $event) {
        foreach ($users as $user) {
           
                    if($event->user_id==$user->id){
                        array_push($eventsArray,$event);
                        
                    }
            }
        }
       // dd($eventsArray);
        return view('Vue_conge')->with ('events',$eventsArray);
        
    }
     public function search(Request $request)
    {
        //dd($request);
        if($request->affiche==1){
            $events =Event::Where([['valid','1']])->get();
            return view('Vue_conge',['events'=>$events ]);
        }else{
            $search=$request->get('search');
            $events=Event::whereBetween('start_date', [$request->firstDate, $request->secondDate])->Where([['titre','like','%'.$request->name. '%'],['valid','1']])->get();
           # dd($events);
             return view('Vue_conge',['events'=>$events ]);
        }
      

    }
    //
}
