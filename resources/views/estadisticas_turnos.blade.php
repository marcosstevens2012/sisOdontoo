@extends ('layouts.admin')
@section ('contenido')
  

<script type="text/javascript" src="graficas/googlechart.js"></script>


<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de pacientes <a href="paciente/create"><button class="btn btn-success">Nuevo</button></a></h3>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div id="piechart" style="width: 900px; height: 500px;"></div>

  </div>
      
      
    </div>

  </div>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Productos', 'mes'],
            @foreach ($pastel as $pastels){
              ['{{ $pastels->nombre}}', {{ $pastels->nombre}}],
            }
            @endforeach
        ]);
        var options = {
          title: 'Representación grafica de turnos por paciente'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
@endsection

  