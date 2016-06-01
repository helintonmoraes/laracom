@extends('painel.layouts.master')
@extends('painel.layouts.menu')
@section('content')

<div id="chartContainer" style="height:300px; width:100%;">
</div>
<script type="text/javascript">
  window.onload = function () {
    var all = {{$x1}}+{{$x2}}+{{$x3}}+{{$x4}}+{{$x5}}+{{$x6}}+{{$x7}}
    var chart = new CanvasJS.Chart("chartContainer",
    {
      
      title:{
        text: "Estoque por Categorias - Total:"+all  
      },
      animationEnabled: true,
      axisY: {
        title: "Itens"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme3",
      data: [

      {        
        type: "column",  
        showInLegend: false, 
        legendMarkerColor: null,
        legendText: null,
        dataPoints: [
            {label: "Eletrodomesticos", y: {{$x1}}},
            {label: "Games e Diversão", y: {{$x2}}},
            {label: "Ferramentas", y: {{$x3}}},
            {label: "Utensilios Domesticos", y: {{$x4}}},
            {label: "Computadores e Notebooks", y: {{$x5}}},
            {label: "TV, Áudio e Vídeo", y: {{$x6}}},
            {label: "Celulares e Tablets", y: {{$x7}}},
            
        ]
        
        
      }   
      ]
    });

    chart.render();
  }
  </script>

@endsection
