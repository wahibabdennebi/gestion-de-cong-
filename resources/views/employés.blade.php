@extends('layouts.master')
@section('scripts')


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.21/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.21/datatables.min.js"></script>
<br><script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>

            <script>
              $(document).ready( function () {
    $('#table_id').DataTable();
    
} );

            </script>
@endsection

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
      <div class="row">
           
           <div class="col col-lg-2">
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            add equipe
                    </button>

              <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{route('AddEquipes')}}">
                             
                                            @csrf
                                       
                                            <label for="">enter Name of Equipe</label>
                                            <input type="text" class="form-control" name="name" placeholder="enter Name of Equipe" ><br/><br/>


                      
                        </div>
                        <div class="modal-footer">
                             <input type="submit" class="btn btn-primary" value="add equipe">     
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           
                        </div>
                        </div>
                        </form>
                    </div>
                    </div>
         
       
           </div>
           <div class="col-sm">
             <!-- Trigger the modal with a button -->
         <a href="" type="button" class="btn btn-info btn-lg" >
         add user
         </a>
       
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
         </div>
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      
    <!-- Main content -->
    <div class="content">
    
    <table id="table_id" class="display">           
     <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>add user</th>
                    <th>delete</th>

                </tr>

            </thead>
            @foreach($equipes as $equipe)
            <tbody>
                    <tr>
                    
                    <td>{{ $equipe ->id}}</td>
                    <td>{{ $equipe ->name}}</td>
                    <th>
                             <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            add user
                    </button>
                </th>

              <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            foreach(($users as $user))
                            <form method="post" action="">
                             
                                            @csrf
                                       
                                            <label for="">enter Name of Equipe</label>
                                            <select value="name" id="form-control">
    
                                            <option value="name">{{$user->name}}</option>
                                            
                                        </select>
                                            <br/><br/>

                        </div>
                        <div class="modal-footer">
                             <input type="submit" class="btn btn-primary" value="add user">     
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               
                    
                    </form>
                    <th>
                            <form method="post" action="{{route('deleteEquipe')}}"  accept-charset="UTF-8">
                                             @method('DELETE')
                                            {{ csrf_field() }}
                                            
                                <input type="hidden" name="id" value="{{$equipe->id}}">
                                    <button type="submit" class="btn btn-danger">delete</button>
                    </tr>

            </tbody>
            @endforeach


        </table>
    </div>
    <!-- /.content -->
@endsection