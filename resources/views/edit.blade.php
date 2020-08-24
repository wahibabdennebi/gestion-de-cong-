@extends('layouts.master')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      
    <!-- Main content -->
    <div class="content">
    <div id="sc-edprofile">
  <h1>Edit Profile Form</h1>
  <div class="sc-container">
    <input type="text" placeholder="nom" />
    <input type="text" placeholder="Prénom" />
    <input type="text" placeholder="User Name" />
    <input type="text" placeholder="Email" />
    <input type="text" placeholder="date de naissance" />
    
    <select>
      <option value="">Male</option>
      <option value="">Female</option>
    </select>
    <input type="text" placeholder="phone" />
    <input type="text" placeholder="Produit" />
    <input type="text" placeholder="Equipe" />
    
    <input type="submit" value="Register" />
  </div>
</div>



   
    </div>
    <!-- /.content -->
@endsection
