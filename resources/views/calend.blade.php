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
          events :'/event'
        });
        
        calendar.setOption('locale','fr');
       
        calendar.render();
        //document.querySelector('.fc-dayGridMonth-button').innerHTML = "Mois";

      });
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
                <a class="btn btn-success" href="/addeventurl" role="button">ADD Events</a>
                </div>            
                 <div class="col col-lg-2">
                <a class="btn btn-info" href="/displaydata" role="button">Edit Events</a>          
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

    </div>
    <!-- /.content -->
@endsection