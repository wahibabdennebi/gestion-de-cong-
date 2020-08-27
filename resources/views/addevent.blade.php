@extends('layouts.master')



 @section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    
      </div>
            <div class="contrainer">
                <div class="row">
                    <div class="col-sm -8">
                        @if($events)
                        
                         <div class="panel panel-default">
                                <div class="panel-heading">  
                                    <h1>update event</h1>
                                </div>
                                    <div class="panel-body">
                                        <form method="post" action="{{route('UpdateEvents')}}"  accept-charset="UTF-8">
                                        @method('PUT')
                                            @csrf
                                            <input type="hidden" name ="id" value="{{$events->id}}">
                                            <label for="">enter Name of Event</label>
                                            <input type="text" class="form-control" name="titre" placeholder="enter Name of Event" value="{{$events->titre }}" ><br/><br/>
                                            <label for="">enter type of Event</label>
                                            <input type="text" class="form-control" name="type" placeholder="enter type of Event" value="{{$events->type }}"><br/><br/>
                                            <label for="">enter color</label>
                                            <input type="color" class="form-control" name="color" placeholder="enter color"  value="{{$events->color}}"><br/><br/>
                                            <label for="">enter start date for event</label>
                                            <input type="date" class="form-control" name="start_date" class="date" placeholder="enter start date for event" value="{{$events->start_date}}"><br/><br/>
                                            <label for="">enter end date for event</label>
                                            <input type="date" class="form-control" name="end_date" class="date" placeholder="enter end date for event"  value="{{$events->end_date }}"><br/><br/>
                                            
                                            <input type="submit" class="btn btn-primary" value="update">
                                            <a class="btn btn-danger" href="/calendrier" role="button">Back</a>
                                        </form>
                                        
                                    </div>
                            
                             @else
                                <div class="panel-heading">  
                                    add event to calender
                                </div>
                                    <div class="panel-body">
                            
                                        <h1>add event</h1>
                            
                                        <form method="POST" action="{{ action('Eventcontroller@store') }}" accept-charset="UTF-8">
                                        
                                            @csrf
                                            <label for="">enter Name of Event</label>
                                            <input type="text" class="form-control" name="titre" placeholder="enter Name of Event" ><br/><br/>
                                            <label for="">enter type of Event</label>
                                            <input type="text" class="form-control" name="type" placeholder="enter type of Event"><br/><br/>
                                            <label for="">enter color</label>
                                            <input type="color" class="form-control" name="color" placeholder="enter color"><br/><br/>
                                            <label for="">enter start date for event</label>
                                            <input type="date" class="form-control" name="start_date" class="date" placeholder="enter start date for event"><br/><br/>
                                            <label for="">enter end date for event</label>
                                            <input type="date" class="form-control" name="end_date" class="date" placeholder="enter end date for event"><br/><br/>
                                            <input type="hidden" name ="user_id" value="{{auth()->user()->id}}">
                                            <input type="submit" class="btn btn-primary" value="add event">
                                            <a class="btn btn-danger" href="/calendrier" role="button">Back</a>
                                        </form>
                                 </div>
                            
                                   @endif          
                         </div>
                        </div>                    
                    </div>
                </div>



            </div>  



            </div>

    
<!-- /.content -->
@endsection