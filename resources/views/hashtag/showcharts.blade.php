<!DOCTYPE html>
<html>
<head>
	<title>Show Charts</title>
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="container">

<h1 class="tittle">RPC-HashtagFilter</h1>
   <div class="menu">
        <a href="{{url('addhashtag')}}" title="Adicionar Hashtag">  <button type="button" class="btn btn-primary">+ Hashtag</button></a>
        <a href="{{url('/')}}" title="Voltar">  <button type="button" class="btn btn-primary">Home</button></a>
      </div>

      <div class="jumbotron">
				<select class="tempo">
						<option value="12">Ultimas 12 horas</option>
						<option value="168">Utilmos 7 Dia</option>
				</select>
		<canvas id="myChart" width="400" height="150"></canvas>
	   </div>


</div>


  <script type="text/javascript" src="js/app.js"></script>

  <script type="text/javascript">
 

updatecharts();
setInterval(updatecharts, 60000);

  </script>
</body>


</html>
