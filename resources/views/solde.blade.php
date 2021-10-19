@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
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
      <form id="addform" method="POST" action="{{route('updateRateSolde')}}" accept-charset="UTF-8">
                        <div class="modal-body">
                                     @method('PUT')
                                            @csrf
                                <label for="">solde congé annuel </label>
                                <input type="hidden" id="setinput" name ="id"  />
                                    <input type="text" name="rate_leave_balance">
                        </div>
      
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">modifier</button>
                    </div>
    </form>
    </div>
  </div>
</div>
    </div>
  <!-- Main content -->
  <div class="content">
      <table class="table table-hover text-nowrap">
          <thead>
               <tr>
                  
                  <th> nom d'utilisateur</th>
                  <th>solde de congé</th>
                  <th>modifier</th>
                  
              </tr>
          
          
          </thead>
          @foreach($users as $user)
          <tbody>
              <tr>
                  <td>{{ $user->name}}</td>
                  @if($user->leave_balance==NULL)
                  <td>0</td>
                  @else
                  <td>{{ $user->leave_balance}}</td>
                  @endif
                  <td>
                  <button type="button" class="btn btn-primary"  id="adduser" name="adduser"  value="{{$user->id}}" data-toggle="modal"
                        data-target="#example" OnClick="myFunction({{$user->id}})">
                        <i class="far fa-edit"></i>
                    </button>
                  </td>
              </tr>
          </tbody>
          @endforeach
      </table>
        
        
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
                    <form id="addform" method="post" action="{{route('UpdateSolde')}}"  accept-charset="UTF-8">
                        <div class="modal-body">
                        @method('PUT')
                            {{ csrf_field() }}
                                <label for="">solde </label>
                                <input type="hidden" id="setinput"  name ="id"  />
                                    <input type="text" name="leave_balance">


                        </div>
                       
                        <div class="modal-footer" id="footer" >
                        <input type="submit" class="btn btn-primary" value="modifier">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                        </form>
        
            
        </div>  
        
        

 <script type="text/javascript">
        function myFunction(id) {
            document.getElementById('setinput').setAttribute('value',id)
        //  document.getElementById(setinput).val()=id;
    
    } 
</script>
@endsection

