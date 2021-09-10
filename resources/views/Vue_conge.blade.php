@extends('layouts.master')



 @section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    
      </div>
    
      
    <!-- Main content -->
    <div class="content">
        <div class="col-md-4">
            <form action="/search" method="get">
                <div class="from-group">
                    <input type="search" name="name" class="from-control">
                    <input type="date" name="firstDate" class="from-control">
                    <input type="date" name="secondDate" class="from-control">
                    <span class="from-groupe-btn">
                        <button type="submit" class="btn btn-primary">search</button>
                    </span>

                </div>
                 
            </form>
        </div>
					<table class="table table-hover text-nowrap">
						    <thead>
                                    <tr class="table100-head">
                                        
                                        <th>titre</th>
                                        <th>type</th>
                                        
                                        <th>date de début</th>
                                        <th>date de fin</th>
                                    </tr>
						    </thead>
                             @foreach($events as $event)
						<tbody>
                                <tr>
                                    
                                    <td>{{ $event->titre}}</td>
                                    <td>{{ $event->type}}</td>
                                    <td>{{$event->start_date}}</td>
                                    <td>{{$event->end_date}}</td>
                                </tr>
                        </tbody>
                             @endforeach
                    </table>
            
        
    </div>

    
    <!-- /.content -->
@endsection