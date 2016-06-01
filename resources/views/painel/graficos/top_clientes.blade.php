@extends('painel.layouts.master')
@extends('painel.layouts.menu')
@section('content')

<div id="chartContainer" style="height:300px; width:100%;">
</div>
<script type="text/javascript">
  window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer",
    {
      
      title:{
        text: "Clientes Top Five"  
      },
      animationEnabled: true,
      axisY: {
        title: "Valor total das compras",
        valueFormatString: "R$ 000.00"
      },


      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: false, 
        legendMarkerColor: null,
        legendText: null,
        dataPoints: [
            @forelse($result as $r)
            @forelse($clientes as $c)
            @if($c['id']== $r->id_cliente)
                 {label: "{{$c['nome']}}", y: {{$r->sum}}},
            @endif
            @empty
            @endforelse
            @empty
            @endforelse
        ]
        
        
      }   
      ]
    });

    chart.render();
  }
  </script>
  <div>
      <p>*Não são computados valores pagos com cartão fidelidade</p>
  </div>

@endsection
