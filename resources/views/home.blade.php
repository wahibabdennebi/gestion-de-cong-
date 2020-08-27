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
    <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-sm-3">
                <div class="panel widget light-widget panel-bd-top">
                  <div class="panel-heading no-title"> </div>
                  <div class="panel-body">
                    <div class="text-center vd_info-parent"> <img alt="example image" src="dist/img/user2-160x160.jpg"> </div>
                    
                    <h2 class="font-semibold mgbt-xs-5">{{auth()->user()->name}}</h2>
                    
                        
                      
                    </div>
                  </div>
                </div>
                
              <div class="col-sm-9">
                <div class="tabs widget">
  
  <div class="tab-content">
    
      <div class="pd-20">
      <div class="nav-item"> 
        <a class="btn btn-primary" href="edit.html">
          <i class="fas fa-user-edit">
          </i>
          Edit 
          
          </a>       
        <div class="row">
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Nom:</label>
              <div class="col-xs-7 controls">{{auth()->user()->name}}</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Prénom:</label>
              <div class="col-xs-7 controls"></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">User Name:</label>
              <div class="col-xs-7 controls"></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Email:</label>
              <div class="col-xs-7 controls">{{auth()->user()->email}}</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          
          
          
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">date de naissance:</label>
              <div class="col-xs-7 controls">{{auth()->user()->birthday}}</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          
          
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">role</label>
              <div class="col-xs-7 controls">{{auth()->user()->role}}</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Phone:</label>
              <div class="col-xs-7 controls">{{auth()->user()->phone}}</div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Produit:</label>
              <div class="col-xs-7 controls">{{auth()->user()->product}}</div>
              <!-- col-sm-10 --> 
            </div>
          </div>  
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Equipe:</label>
              <div class="col-xs-7 controls">{{auth()->user()->team}}</div>
              <!-- col-sm-10 --> 
            </div>
          </div>



        </div>

       
        
          
        </div>
        <!-- row -->
        
            
    
     
    </div>
    <!-- /.content -->
@endsection
