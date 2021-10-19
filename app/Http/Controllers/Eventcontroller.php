<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Equipe;
use DatePeriod;
use datetime;
use DateInterval,BusinessDayPeriodIterator ;
use Carbon\Carbon;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Notifications\InvoicePaid;
use App\Mail\MailtrapExample;
use App\Mail\ValidationConge;
use Illuminate\Support\Facades\Mail;



class Eventcontroller extends Controller
{

    public function index()
    { 
        //Event::Where('valid','1')->get()
        return $this ->eventsToArray(Event::Where('user_id',auth()->user()->id)->get());
        
        //return view('calend',["events"=>json_encode($events)]);
    }
public function eventsToArray($events){
$eventsArray = [];
foreach ($events as $event){
    $data= [
        "title"=> $event->titre,
        "type"=> $event->type,
        "start"=> $event->start_date,
        "end"=> $event->end_date,
        "color"=>$event->color,
        "user_id"=>$event->user_id
        
    ];
   // dd($eventsArray);
    array_push($eventsArray,$data);
  
    }
return response()->json($eventsArray);
}
public function display(){
  
    $events=null;
    if(auth()->user()->role=='admin'){$users=User::where('equipe_id',auth()->user()->equipe_id)->get();
        //dd($users);
        return view('addevent',compact('events','users'));
    }else{
        return view('addevent',compact('events'));
    }
    
   
}

public function store(Request $request){
    //dd($request);
    $this->validate($request,[
    'type' => 'required',
    'start_date' => 'required',
    'end_date' => 'required',
    'user_id' => 'required',
    ]);
    $date = new DateTime($request->input ('end_date'));
    $events = new Event;
    $events->type =$request->input ('type');
    if( $request->type=='Congé payant'){
        $events->color ='red';
    }elseif($request->type=='Récupération jour férié'){
        $events->color ='green';
    }else{
        $events->color ='black';
    }
    $events->start_date =$request->input ('start_date');
    $events->end_date =$date->add(new DateInterval('P1D'));
    $events->user_id =$request->input ('user_id');
    $id=$events->user_id;
    $user=User::find($id);
    $events->titre =$user->name;
    $events->save(); 
    //$id=$user->equipe_id;
    $users=User::where('equipe_id',auth()->user()->equipe_id)->get();
   // dd($users);
    foreach ($users as $user) {
        if($user->role=='admin'){
       $end_date=\Carbon\Carbon::parse($events->end_date)->format('d-m-Y');
            Mail::to($user->email)->send(new ValidationConge($user,$events,$end_date));
        }
    }
    
   return redirect ('/calendrier')->with('success','Events Added');
}

public function show()
        {

            $events =Event::Where([['valid','0'],['user_id',auth()->user()->id]])->get();
            return view('display')->with ('events',$events);
        }

    public function edit($id)
     { $events = Event::find($id);
        //dd($events);
        return view('addevent',compact('events','id'));
       }

public function update(Request $request){
   //dd($request);
    $this->validate($request,[
        'id' => 'required',
        'titre' => 'required',
        'type' => 'required',
        'color' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'user_id' => 'required',

        ]);
       // $date = new DateTime($request->end_date);
        $events = Event::find($request->id);
        $date = new DateTime($request->input ('end_date'));
        $events->titre =$request->input ('titre');
        $events->type =$request->input ('type');
        $events->color =$request->input ('color');
        $events->start_date =$request->input ('start_date');
        $events->end_date =$date->add(new DateInterval('P1D'));
        $events->user_id =$request->input ('user_id');
        $events->save();
        return redirect ('/calendrier')->with('success','Events updated');
}
        public function destroy(Request $request)
        {
            $events = Event::find($request->id);
            $events->delete();
            return redirect ('/calendrier')->with('success','Events successfully deleted!');
        }
        
        public function validation()
    {  
        $events =Event::Where('valid','0')->get();
        return view('validation')->with ('events',$events);
        
    }
    function test(Request $request){
        $events =Event::find($request->id);
            $events->valid='1';
            $typeConge=$events->type;
         $start_time = \Carbon\Carbon::parse($events->start_date);
         $finish_time = \Carbon\Carbon::parse($events->end_date);
         $diffTime= $start_time->diffInDays($finish_time );
         //dd($diffTime);
         $daysWithoutWeekend = $start_time->diffInDaysFiltered(function(Carbon $date) {
            return !$date->isWeekend();
            }, $finish_time);
            $user=User::find($events->user_id);
            if ($typeConge=='Congé payant'){
                $user->leave_balance=$user->leave_balance-$daysWithoutWeekend;
                $user->save();
            }elseif ($typeConge== 'Récupération jour férié'){
                $user->leave_balance=$user->leave_balance+$diffTime;
                $user->save();
            } else {
                $user->save(); 
            }
         
            Mail::to($user->email)->send(new MailtrapExample($user,$events));
          // $user->notify(new InvoicePaid()) ;
        $events->save();
        
        return redirect ('/calendrier');

        
    }
    public function editProfil($id){
        $user=User::Where('id',$id)->get();
        return view('edit')->with ('user',$user);
    }

}


