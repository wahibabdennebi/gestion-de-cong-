@extends('layouts.master')

@section('scripts')
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.21/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.21/datatables.min.js"></script>

<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script >

$(document).ready(function() {
    $('#table_id').DataTable();
});


</script>

@endsection



 @section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    
      </div>
    
      
    <!-- Main content -->
    <div class="content">
        <table id="table_id" class="display">
            <thead>
                 <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>role</th>
                    <th>definir comme administrateur </th>
                    <th>definir comme utilisateur </th>
                </tr>
            
            
            </thead>
            @foreach($users as $user)
             <tbody> 
                        <tr>
                                    <td>{{ $user->id}}</td>
                                    <td id="user">{{ $user->name}}</td>
                                    <td>{{ $user->role}}</td>
                                
                                        <th> 
                                        <button type="submit" class="btn btn-success"id="iduser1" name="iduser"  value="{{$user->id}}" onclick="admin({{$user->id}})">valider</button>
                                         </th>
                                        <th>
                                        <button type="submit" class="btn btn-danger"id="iduser2" name="iduser"  value="{{$user->id}}" onclick="user({{$user->id}})">valider</button>    
                                        </th>
                        </tr>
             </tbody>
             @endforeach 
        </table>     
    </div>
    <script type="text/javascript" >
        function admin(id){
            
            $.ajax({
                type: "POST",
                url: "{{route('admin')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "iduser": id,
                },
                success: function(response) {
                    console.log(response);
                    if (response.success === true) {
                            sweetAlert("Done!", response.message, "success");
                            
                           

                        location.reload();
                        } 
                        else {
                            sweetAlert("Error!", response.message, "error");
                        }
                     
                                 }
                                 
                   

                

        });
        }


        function user(id){
            $.ajax({
                type: "POST",
                url: "{{route('user')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "iduser": id,
                },
                success: function(response) {
                    console.log(response);
                    if (response.success === true) {
                            sweetAlert("Done!", response.message, "success");
                            location.reload();
                            console.log(response);
                        } 
                        else {
                            sweetAlert("Error!", response.message, "error");
                        }
                                 }
                   

                

        });
        }


    </script>

    
<!-- /.content -->
@endsection