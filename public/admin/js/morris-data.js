$(function() {

Morris.Bar({
  element: 'bar-estoque',
  data: [
    { y: 'Eletrodomesticos', a: $x1},
    { y: 'Ferramentas', a: 75},
    { y: 'Games e Diversão', a: 50},
    { y: 'Uten.Domesticos', a: 75},
    { y: 'Celulares/Tablets', a: 50},
    { y: 'TV,Audio e Video', a: 75},

  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Quantidade'],
  resize: true
});


});
