@extends('layouts.master')
@section('scripts')
<meta charset='utf-8' />
    <link rel="stylesheet" href="{{ URL::asset('css/cald.css') }}" />   
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.0/main.min.css' rel='stylesheet' />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.0/main.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.0/locales/fr.js'></script>
  <script type="text/javascript" src="{{ URL::asset('js/cald.js') }}"></script>
    
    
      <script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
          navLinks :true,
          editable :true,
          selectable :true,
          eventLimit :true,
          eventClick:true,
          allDay:false,
          displayEventTime: false,
          events :'/event' ,
          eventClick:function(info){
            //console.log(info.event.start);
          var numberDay=  calcBusinessDays(info.event.start,info.event.end);
          var starDay=info.event.start ;
          var endDay=info.event.end;
          var name=info.event.title;
            //alert(name+ starDay+ endDay + numberDay);
            $('.modal').modal('show');
            $(document).ready(function(){
          $(".modal-body ").append("<div id='testt'><span id ='name'>"+name+"</span> <br> <span id ='numberDay'>"+numberDay+"</span></div>");
          $("#close,.close").on("click",function(){
        	$("#testt").remove();
    });

});
            

          }
        });
        
        calendar.setOption('locale','fr');
        
       
        calendar.render();
        //document.querySelector('.fc-dayGridMonth-button').innerHTML = "Mois";

      });
      function calcBusinessDays(dDate1, dDate2) { // input given as Date objects
  var iWeeks, iDateDiff, iAdjust = 0;
  if (dDate2 < dDate1) return -1; // error code if dates transposed
  var iWeekday1 = dDate1.getDay(); // day of week
  var iWeekday2 = dDate2.getDay();
  iWeekday1 = (iWeekday1 == 0) ? 7 : iWeekday1; // change Sunday from 0 to 7
  iWeekday2 = (iWeekday2 == 0) ? 7 : iWeekday2;
  if ((iWeekday1 > 5) && (iWeekday2 > 5)) iAdjust = 1; // adjustment if both days on weekend
  iWeekday1 = (iWeekday1 > 5) ? 5 : iWeekday1; // only count weekdays
  iWeekday2 = (iWeekday2 > 5) ? 5 : iWeekday2;

  // calculate differnece in weeks (1000mS * 60sec * 60min * 24hrs * 7 days = 604800000)
  iWeeks = Math.floor((dDate2.getTime() - dDate1.getTime()) / 604800000)

  if (iWeekday1 < iWeekday2) { //Equal to makes it reduce 5 days
    iDateDiff = (iWeeks * 5) + (iWeekday2 - iWeekday1)
  } else {
    iDateDiff = ((iWeeks + 1) * 5) - (iWeekday1 - iWeekday2)
  }

  iDateDiff -= iAdjust // take into account both days on weekend

  return (iDateDiff  ); // add 1 because dates are inclusive
}
    </script>

@endsection
@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
      <div class="container">
  <div class="row">
           
    <div class="col col-lg-2">
     <!-- Trigger the modal with a button -->
  <a  href="calendrier" type="button" class="btn btn-info btn-lg" >
  Mon calendrier
  </a>

    </div>
    <div class="col-sm">
      <!-- Trigger the modal with a button -->
  <a href="Calendrierdelentreprise" type="button" class="btn btn-info btn-lg" >
  Calendrier de l'entreprise
  </a>

    </div>
    
  </div>
                @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                              @if(Session::has('success'))
                                  <div class="alert alert-success">
                                    <p>{{ Session::get('success') }}</p>  
                                  </div>
                              @endif
  <br>
        <div class="row">
              <div class="col col-lg-2"> 
                <a class="btn btn-success" href="/addeventurl" role="button"><i class="fas fa-calendar-plus"> Congé</i> </a>
                </div>            
                 <div class="col col-lg-2">
                <a class="btn btn-info" href="/displaydata" role="button"><i class="fas fa-edit">Congé</i> </a>          
              </div>
              

           </div>
</div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      
    <!-- Main content -->
    <div class="content">
        
        <div id='calendar'>
    
        </div>
      </div>
      <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      
      <div class="modal-footer">
       
        <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    </div>
    <!-- /.content -->
    
@endsection