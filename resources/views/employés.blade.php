@extends('layouts.master')
@section('scripts')


<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.21/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.21/datatables.min.js"></script>
<br>
<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
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
                    add equipe
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

                                    <label for="">enter Name of Equipe</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="enter Name of Equipe"><br /><br />
                                        
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

                <td id="test">{{ $equipe->id}}</td>
                <td> <button id="id" name='id' value="{{$equipe->id}}"
                        onclick="GetUser({{$equipe->id}})">{{$equipe->name}}</button></td>
                <th>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary"  id="adduser" name="adduser"  value="{{$equipe->id}}" data-toggle="modal"
                        data-target="#example" onclick="adduser({{$equipe->id}})">
                        add user
                    </button>
                </th>


                <th>
                    <form method="post" action="{{route('deleteEquipe')}}" accept-charset="UTF-8">
                        @method('DELETE')
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{$equipe->id}}">
                        <button type="submit" class="btn btn-danger">delete</button>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <form id="addform">
                        <div class="modal-body">
                           
                            {{ csrf_field() }}
                            
                                <label for="">enter Name user</label>
                                <select name="name" id="option">
                                
                                </select>
                                <br /><br />


                        </div>
                       
                        <div class="modal-footer" id="footer" >
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </form>

    </table>

    
     
        
    <div id='table'>
       
    </div>
                <!-- Modal -->
                    <div class="modal fade" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="delete-modal-body">
                            
                        </div>
                        <div class="modal-footer" id="deletfooter">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Non</button>
                        </div>
                        </div> 
                    </div>
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
                   var head = "<table class='table table-hover text-nowrap'><thead><tr><th>id</th><th>name</th><th>email</th><th>delete</th></tr></thead><tbody>";
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
               

                  // console.log(result);
                   
                   //$("#table_id2").html(result);
                  //console.log(result);
                
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
                  var len =response.length;
                    var result="";
                    for(var i=0; i<len;i++){
                        var name=response[i].name;
                        var iduser=response[i].id;

                        var opt ="<option id='add' name='add' value="+iduser+">"+name+"</option>";
                        result =opt+ result;
                    }
                   
             $("#option").append(result);
                   
                   var button='<button type="submit"  class="btn btn-primary" onclick="iduser('+id+')">add user</button>'
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
         
            console.log(response);

        }
})

};

function deletuser(id){
    $.ajax({
    type:"POST",
        url:"{{route('deleteuser')}}" ,  
        dataType: 'json',
        data: {
            "_token": "{{ csrf_token() }}",
            "deleteuser": id,
            
           
        }  ,
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
        }

});
};

//$('#deletename').click(function(){
  //  $.sweetModal.confirm('Confirm please?', function() {
	
//});


//});

   
</script>
<!-- /.content -->
@endsection