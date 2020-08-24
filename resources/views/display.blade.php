<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div class="contanier">
        <div class="jumbtron">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>titre</th>
                    <th>type</th>
                    <th>color</th>
                    <th>start_date</th>
                    <th>end_date</th>
                    <th>update/edit</th>
                </tr>
            
            
            </thead>
            @foreach($events as $event)
             <tbody> 
                <tr>
                    <td>{{ $event ->id}}</td>
                    <td>{{ $event ->titre}}</td>
                    <td>{{ $event ->type}}</td>
                    <td>{{ $event ->color}}</td>
                    <td>{{ $event ->start_day}}</td>
                    <td>{{ $event ->end_day}}</td>
                    <th><a href="{{ action('Eventcontroller@edit',$event['id'])}}">edit</a></th>
                </tr>
             </tbody>
             @endforeach
        </table>
        
        
        
        
        </div>
  
  
  </div>
  <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>