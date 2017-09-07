
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('chart.js');
require('./jquery.tablesorter')
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

remover = function(id) {
  console.log('firing delete post');
  var result = confirm("Tem certeza que deseja deletar?");
  if (result) {

  $.ajax({
    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    url: 'removehashtag/'+id,
    method: 'post',
  }).done( function( data ) {
    alert(data);
    location.reload();
  });
  }
}
updatecharts = function(){
   $.ajax({
      headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: 'showcharts',
      data : {tempo: $(".tempo" ).val()},
      method: 'post',
    }).done( function( data ) {
      $('#myChart').remove(); // this is my <canvas> element
      $('.jumbotron').append('<canvas id="myChart" width="400" height="150"></canvas>');

      if(data){
        var ctx = $("#myChart");
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data['name'],
            datasets: [{
                label: '#Tweet '+ $(".tempo option:selected" ).text() ,
                data: data['count'],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

    }else{

       alert('Por favor adiciona uma hashtag');
       window.location = 'addhashtag';


    }
    });

}
$(document).on('change', 'select', updatecharts )



$( 'table' ).tablesorter( {sortList: [[3,1], [1,3]]} );
