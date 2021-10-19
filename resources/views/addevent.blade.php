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
                                    <h1>Mettre à jour le congé</h1>
                                </div>
                                    <div class="panel-body">
                                        <form method="post" action="{{route('UpdateEvents')}}"  accept-charset="UTF-8">
                                        @method('PUT')
                                            @csrf
                                            <input type="hidden" name ="id" value="{{$events->id}}">
                                            <label for="">Nom d'utilisateur </label>
                                            <input type="text" class="form-control" name="titre" placeholder="enter Name of Event" value="{{$events->titre }}" ><br/><br/>
                                            <label for="">Entrer e type congé</label>
                                            <input type="text" class="form-control" name="type" placeholder="enter type of Event" value="{{$events->type }}"><br/><br/>
                                            <label for="">Entrer le couleur</label>
                                            <input type="color" class="form-control" name="color" placeholder="enter color"  value="{{$events->color}}"><br/><br/>
                                            <label for="">Entrer la date de début de congé</label>
                                            <input type="date" class="form-control" name="start_date" class="date" placeholder="enter start date for event" value="{{$events->start_date}}"><br/><br/>
                                            <label for="">Entrez la date de fin congé </label>
                                            <input type="date" class="form-control" name="end_date" class="date" placeholder="enter end date for event"  value="{{$events->end_date }}"><br/><br/>
                                            <input type="hidden" name ="user_id" value="{{auth()->user()->id}}">
                                            <input type="submit" class="btn btn-primary" value="update">
                                            <a class="btn btn-danger" href="/calendrier" role="button">Annuler</a>
                                        </form>
                                        
                                    </div>
                            
                             @else
                                
                                    <div class="card-header">
                            
                                        
                            
                                        <form method="POST" action="{{ action('Eventcontroller@store') }}" accept-charset="UTF-8">
                                        
                                            @csrf
                                            <label for="">Nom d'utilisateur </label>
                             @if(auth()->user()->role =='admin')
                                             <select class="form-control" name="user_id" aria-label="Default select example">
                                    @foreach($users as $user)
                                                <option name="user_id" value="{{$user->id}}">{{ $user ->name}}</option>
                                                
                                    @endforeach        
                                                </select>
                              @else
                                            <input type="text" class="form-control" name="titre" placeholder="enter Name of Event" value="{{auth()->user()->name}}" ><br/><br/>
                            @endif
                                            <label for="">Choisir le type Congé</label>
                                            <select class="form-control" name="type" aria-label="Default select example">
                                                <option name="type" value="Congé payant">Congé payant</option>
                                                <option name="type" value="Récupération jour férié">Récupération jour férié</option>
                                                <option  name="type"value="Autre">Autre</option>
                                                </select>
                                            <label for="">Entrer la date de début de Congé</label>
                                            <input type="date" class="form-control" name="start_date" class="date" placeholder="enter start date for event"><br/><br/>
                                            <label for="">Entrez la date de fin de Congé</label>
                                            <input type="date" class="form-control" name="end_date" class="date" placeholder="enter end date for event"><br/><br/>
                                            
                                            <input type="submit" class="btn btn-primary" value="valider">
                                            <a class="btn btn-danger" href="/calendrier" role="button">Annuler</a>
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