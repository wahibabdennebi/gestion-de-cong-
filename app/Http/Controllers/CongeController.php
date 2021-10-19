<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Equipe;
use Illuminate\Support\Facades\DB;

class CongeController extends Controller
{
    public function show()
    {  
        //$events =Event::Where([['valid','1']])->get();
       // $users=User::Where('equipe_id',auth()->user()->equipe_id)->get();
        
        $equipe=Equipe::find(auth()->user()->equipe_id);
        //dd(auth()->user()->myevent());
        //dd($equipe);
        $userss = DB::table('events')->join('users', 'users.id', '=', 'events.user_id')
        ->join('equipes', 'equipes.id', '=', 'users.equipe_id')
        ->select('equipes.name','events.titre','events.start_date','events.end_date','events.type')
        ->where([['valid','1'],['equipe_id',auth()->user()->equipe_id]])
        ->get();
       //dd($userss);
       /*//step 1 getCurrentUser
       //step 2 
        $eventsArray = [];
        foreach ($events as $event) {
        foreach ($users as $user) {
           
                    if($event->user_id==$user->id){
                        array_push($eventsArray,$event);
                        
                    }
            }
        }*/
       // dd($eventsArray);
        return view('Vue_conge')->with ('events',$userss)->with('equipe',$equipe);
        
    }
     public function search(Request $request)
    {
        $equipe=Equipe::find(auth()->user()->equipe_id);
        //dd($request);
        if($request->affiche==1){
            $events =DB::table('events')->join('users', 'users.id', '=', 'events.user_id')
            ->join('equipes', 'equipes.id', '=', 'users.equipe_id')
            ->select('equipes.name','events.titre','events.start_date','events.end_date','events.type')
            ->where([['valid','1']])
            ->get();
            return view('Vue_conge',['events'=>$events ])->with('equipe',$equipe);
        }else{
            $search=$request->get('search');
            $events =DB::table('events')->join('users', 'users.id', '=', 'events.user_id')
            ->join('equipes', 'equipes.id', '=', 'users.equipe_id')
            ->select('equipes.name','events.titre','events.start_date','events.end_date','events.type')
           -> whereBetween('start_date', [$request->firstDate, $request->secondDate])
            ->Where([['titre','like','%'.$request->name. '%'],['valid','1']])
            ->get();
           // $events=Event::whereBetween('start_date', [$request->firstDate, $request->secondDate])->Where([['titre','like','%'.$request->name. '%'],['valid','1']])->get();
           # dd($events);
             return view('Vue_conge',['events'=>$events ])->with('equipe',$equipe);
        }
      

    }
    //
}
