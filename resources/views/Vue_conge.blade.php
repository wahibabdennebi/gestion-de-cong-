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
    $('#table_id').DataTable({
        "language":{
            "decimal":        "",
    "emptyTable":     "No data available in table",
    "info":           "Affichage _START_ a _END_ de _TOTAL_ entrées",
    "infoEmpty":      "Showing 0 to 0 of 0 entrées",
    "infoFiltered":   "(filtered from _MAX_ total entrées)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "afficher _MENU_ entrées",
    "loadingRecords": "Chargement...",
    "processing":     "Traitement...",
    "search":         "recherche:",
    "zeroRecords":    "Aucune donnée correspondante trouvée",
    "paginate": {
        "first":      "First",
        "last":       "Last",
        "next":       "suivant",
        "previous":   "Précédent"
    },
    "aria": {
        "sortAscending":  ": activate to sort column ascending",
        "sortDescending": ": activate to sort column descending"
    }

        },
    
        search: {
            return: true
        }
    }

    );
});


</script>

@endsection


 @section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    
      </div>
    
      
    <!-- Main content -->
    <div class="content">
        
            <form class="my-sm-50" action="/search" method="get">
                
                 
        <div class="row justify-content-end mb-50 ">
            <button class="col-sm- btn btn-primary" name="affiche" value="1" type="submit">afficher tout</button>
            <a class="col-sm- btn btn-primary ms-1" href="/Vueconge">{{$equipe->name}}</a>
        </div>
        </form>		<table  id="table_id" class="display">
						    <thead>
                                    <tr class="table100-head">
                                        
                                        <th>Nom d'utilisateur</th>
                                        <th>type</th>
                                        <th>Nom de l'equipe</th>
                                        <th>date de début</th>
                                        <th>date de fin</th>
                                    </tr>
						    </thead>
                            
						<tbody>
                        @foreach($events as $event)
                                <tr>
                                    
                                    <td>{{ $event->titre}}</td>
                                    <td>{{ $event->type}}</td>
                                    <td>{{ $event->name}}</td>
                                    <td>{{$event->start_date}}</td>
                                    <td>{{$event->end_date}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                            
                    </table>
            
        
    </div>

    
    <!-- /.content -->
@endsection