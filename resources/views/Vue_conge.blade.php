@extends('layouts.master')



 @section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    
      </div>
    
      
    <!-- Main content -->
    <div class="content">
        <div class="col-md-4">
            <form class="my-sm-50" action="/search" method="get">
                <div class="from-group">
                    <input class="col col-lg-2" type="search" name="name" class="from-control">
                    <input type="date" name="firstDate" class="from-control">
                    <input type="date" name="secondDate" class="from-control">
                    <span class="from-groupe-btn">
                        <button type="submit" class="btn btn-primary">search</button>
                    </span>
                </div>
                 
            
        </div>
        <div class="row justify-content-end mb-50 ">
            <button class="col-sm-2 btn btn-primary" name="affiche" value="1" type="submit">afficher tout</button>
            <a class="col-sm-2 btn btn-primary" href="/Vueconge">retour</a>
        </div>
        </form>		<table class="table table-hover text-nowrap">
						    <thead>
                                    <tr class="table100-head">
                                        
                                        <th>Nom d'utilisateur</th>
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