@extends('layouts.master')



 @section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    
      </div>
    
      
    <!-- Main content -->
    <div class="content">
        <table class="table table-hover text-nowrap">
            <thead>
                 <tr>
                    
                    <th>Nom d'utilisateur</th>
                    <th>type</th>
                    <th>date de début</th>
                    <th>date de fin</th>
                    <th>valider</th>
                    <th>rejeter</th>
                </tr>
            
            
            </thead>
            @foreach($events as $event)
             <tbody> 
                <tr>
                   
                    <td>{{ $event ->titre}}</td>
                    <td>{{ $event ->type}}</td>
                    <td>{{ $event ->start_date}}</td>
                    <td>{{ $event ->end_date}}</td>
                            <th> 
                                <form method="post" action="{{route('validationEvents')}}" accept-charset="UTF-8">
                                        @method('PUT')
                                            @csrf
                                        <input type="hidden" name="id" value="{{$event->id}}">
                                        
                                    <button type="submit" class="btn btn-success"><i class="fas fa-calendar-check"></i></button>
                                        </form>
                                </th>
                    <th>
                            <form method="post" action="{{route('deleteEvents')}}"  accept-charset="UTF-8">
                                             @method('DELETE')
                                            {{ csrf_field() }}
                                            
                                <input type="hidden" name="id" value="{{$event->id}}">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-calendar-times"></i></button>
                            </form>
                    </th>
                </tr>
             </tbody>
             @endforeach
        </table>
        
        
        
        
            
    </div>

    
<!-- /.content -->
@endsection