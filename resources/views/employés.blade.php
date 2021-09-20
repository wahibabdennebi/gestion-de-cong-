@extends('layouts.master')
@section('scripts')


<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.21/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.21/datatables.min.js"></script>

<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
       
$(document).ready(function() {
    $('#table_id').DataTable();
});/*
$(document).ready(function() {
    $('#table_id2').DataTable();
});*/
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
                ajouter equipe
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

                                    <label for="">nom de l'équipe</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="saisir le nom de l'équipe"><br /><br />
                                        
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="ajouter equipe">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>


            </div>
            <div class="col-sm">
                <!-- Trigger the modal with a button -->


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
                <th>Nom</th>
                <th>ajouter utilisateur</th>
                <th>supprimer</th>

            </tr>

        </thead>
        @foreach($equipes as $equipe)
        <tbody>
            <tr>

                <td id="test">{{ $equipe->id}}</td>
                <td> <button id="id" name='id' value="{{$equipe->id}}"
                        onclick="GetUser({{$equipe->id}})">{{$equipe->name}}</button></td>
                <th>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary"  id="adduser" name="adduser"  value="{{$equipe->id}}" data-toggle="modal"
                        data-target="#example" onclick="adduser({{$equipe->id}})">
                        ajouter utilisateur
                    </button>
                </th>


                <th>
                    <form method="post" action="{{route('deleteEquipe')}}" accept-charset="UTF-8">
                        @method('DELETE')
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{$equipe->id}}">
                        <button type="submit" class="btn btn-danger">supprimer</button>
                    </form>
            </tr>
            

                        </form>
                    </div>
                </div>

        </tbody>
       
        
        @endforeach
        <!-- Modal -->
        
     <div class="modal fade" id="example" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <form id="addform">
                        <div class="modal-body">
                           
                            {{ csrf_field() }}
                            
                                <label for="">Nom d'utilisateur</label>
                                <select name="name" id="option">
                                
                                </select>
                                <br /><br />


                        </div>
                       
                        <div class="modal-footer" id="footer" >
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                        </form>

    </table>

    
     
        
    <div id='table'>
       
    </div>
               
    
</div>

<script type="text/javascript" >

function GetUser(id) {
        var mytable=document.getElementById('table');
                   var displaysting =mytable.style.display;
                   if (displaysting=='block'){
                    mytable.style.display='none';
                    $('#table').empty();
                   }
                   else{

                    
            $.ajax({
                type: "POST",
                url: "{{route('test')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id":id,
                },

                success: function(response) {
                   // $('#user_id').append(response.user_id);
                   //console.log(response);
                   //var data = JSON.parse(response);
                   var head = "<table class='table table-hover text-nowrap'><thead><tr><th>id</th><th>Nom</th><th>email</th><th>supprimer</th></tr></thead><tbody>";
                   var result="";
                   var len =response.length;
                   for(var i=0; i<len;i++){
                       console.log(response[i]);

                       var id=response[i].id;
                       var name=response[i].name;
                       var email=response[i].email;
                       var button='<button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteuser" id="iduser" onclick="deletuser('+id+')">delete</button>';
                       var tr_str = '<tr>'+'<td>'+ id + '</td>'+'<td>'+ name +'</td>'+'<td >'+ email+'</td>'+ '<td >' + button + '</td>' +'</tr>';
                  result =tr_str+ result;
                   // var result=head+result
                  
                   }
                   result = head+result+'</tbody>'+'</table>';
                   $("#table").append(result);
                   mytable.style.display='block';
                   console.log(result);
                }
               

                 
                
            }
        
          
            )
            };
            

};



</script>
<script >
    
       function adduser(id) {
        $.ajax({
            type:"POST",
                url:"{{route('testt')}}" ,
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "adduser": id,
                },
                success: function(response) {
                    console.log(response);
                  var len =response.length;
                    var result="";
                    for(var i=0; i<len;i++){
                        var name=response[i].name;
                        var iduser=response[i].id;

                        var opt ="<option id='add' name='add' value="+iduser+">"+name+"</option>";
                        result =opt+ result;
                    }
                   
             $("#option").append(result);
                   
                   var button='<button type="submit"  class="btn btn-primary" onclick="iduser('+id+')">ajouter</button>'
                   $("#footer").append(button);
                   $('#example').modal('show');
                    console.log(response);
        }

            }) 
        
       };
    //$('#submit').click(function({
        function iduser(id){
$.ajax({
    type:"POST",
        url:"{{route('adduser')}}" ,  
        dataType: 'json',
        data: {
            "_token": "{{ csrf_token() }}",
            "adduser": id,
            "iduser": document.getElementById("option").options[document.getElementById("option").selectedIndex].value,
           
        }  ,
        success: function(response) {
            $('#example').modal('hide');
         
           

        }
})

};

function deletuser(id){
    sweetAlert({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        })
                $.ajax({
                type:"POST",
                    url:"{{route('deleteuser')}}" ,  
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                    }  ,
                        success: function (response) {
                        if (response.success === true) {
                            sweetAlert("Done!", response.message, "success");

                        } 
                        else {
                            sweetAlert("Error!", response.message, "error");
                        }
                                 }
                });
        /*
        success: function(response) {
            var len =response.length;
            var result="";
            for(var i=0; i<len;i++){
                        var name=response[i].name;
                        var iduser=response[i].id;
                        var opt ="<strong>"+name+"</strong>";
                        result =opt
            }
                        $("#delete-modal-body").append(result);
                        var button = "<button type='button' class='btn btn-primary' id='deletename'  name='deletename' value="+iduser+">Oui</button>";
                        $("#deletfooter").append(button);
                        $('#deleteuser').modal('show');
                        console.log(response);
        }*/

    
};

//$('#deletename').click(function(){
  //  $.sweetModal.confirm('Confirm please?', function() {
	
//});


//});

   
</script>
<!-- /.content -->
@endsection