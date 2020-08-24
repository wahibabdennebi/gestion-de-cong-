<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;


class Eventcontroller extends Controller
{

    public function index()
    { 
        //Event::Where('valid','1')->get()
        return $this ->eventsToArray(Event::all());
        
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
        "color"=>$event->color
        
    ];
    //dd($eventsArray);
    array_push($eventsArray,$data);
  
    }
return response()->json($eventsArray);
}
public function display(){
  
    $events=null;
    return view('addevent',compact('events'));
}

public function store(Request $request){

    $this->validate($request,[
    'titre' => 'required',
    'type' => 'required',
    'color' => 'required',
    'start_date' => 'required',
    'end_date' => 'required',

    ]);
    $events = new Event; 
    $events->titre =$request->input ('titre');
    $events->type =$request->input ('type');
    $events->color =$request->input ('color');
    $events->start_date =$request->input ('start_date');
    $events->end_date =$request->input ('end_date');
    $events->save();
   return redirect ('/calendrier');
}
public function show()
{

    $events =Event::all();
    return view('display')->with ('events',$events);
}
public function edit($id){
    $events = Event::find($id);
    return view('addevent',compact('events','id'));
    
}
public function update(Request $request){
    //dd($request);
    $this->validate($request,[
        'titre' => 'required',
        'type' => 'required',
        'color' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
    
        ]);
        $events = Event::find($request->id); 
        $events->titre =$request->titre;
        $events->type =$request->type;
        $events->color =$request->color;
        $events->start_date =$request->start_date;
        $events->end_date =$request->end_date;
        $events->save();
        return redirect ('/calendrier');
}
}


