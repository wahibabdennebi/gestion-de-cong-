@extends('layouts.master')



 @section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    
      </div>
    
      
    <!-- Main content -->
    <div class="content">
        
					<table class="table table-hover text-nowrap">
						    <thead>
                                    <tr class="table100-head">
                                        
                                        <th>titre</th>
                                        <th>type</th>
                                        
                                        <th>start_date</th>
                                        <th>end_date</th>
                                    </tr>
						    </thead>
                             @foreach($events as $event)
						<tbody>
                                <tr>
                                    
                                    <td>{{ $event ->titre}}</td>
                                    <td>{{ $event ->type}}</td>
                                    <td>{{ $event ->start_day}}</td>
                                    <td>{{ $event ->end_day}}</td>
                                </tr>
                        </tbody>
                             @endforeach
                    </table>
            
        
    </div>

    
    <!-- /.content -->
@endsection