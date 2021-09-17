<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
class EventtController extends Controller
{public function index()
    { 
        //Event::Where('valid','1')->get()
        return $this ->eventsToArray(Event::Where('valid','1')->get());
        
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
    
    array_push($eventsArray,$data);
    }
   
    return response()->json($eventsArray);
}
    
}
