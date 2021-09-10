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
                    <th>id</th>
                    <th>titre</th>
                    <th>type</th>
                    <th>date de début</th>
                    <th>date de fin</th>
                    <th>modifier</th>
                    <th>supprimer</th>
                </tr>
            
            
            </thead>
            @foreach($events as $event)
             <tbody> 
                <tr>
                    <td>{{ $event ->id}}</td>
                    <td>{{ $event ->titre}}</td>
                    <td>{{ $event ->type}}</td>
                    <td>{{ $event ->start_date}}</td>
                    <td>{{ $event ->end_date}}</td>
                    <th><a href="{{ action('Eventcontroller@edit',$event['id'])}}">modifier</a></th>
                    <th>
                            <form method="post" action="{{route('deleteEvents')}}"  accept-charset="UTF-8">
                                             @method('DELETE')
                                            {{ csrf_field() }}
                                            
                                <input type="hidden" name="id" value="{{$event->id}}">
                                    <button type="submit" class="btn btn-danger">supprimer</button>
                            </form>
                    </th>
                </tr>
             </tbody>
             @endforeach
        </table>
        
        
        
        
            
    </div>

    
<!-- /.content -->
@endsection