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
          events :'/eventt'
        });
         calendar.setOption('locale','fr');
        calendar.render();
      });
    </script>
@endsection
@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
    </div>
      </div>
    
      
    <!-- Main content -->
    <div class="content">
        
        <div id='calendar'> </div>
      </div>

    </div>
    <!-- /.content -->
@endsection