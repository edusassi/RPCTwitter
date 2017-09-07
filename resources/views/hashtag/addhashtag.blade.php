<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Hashtag</title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
  </head>
  <body>

    <div class="container">

      <h1 class="tittle">RPC-HashtagFilter</h1>
      
      <div class="menu">
        <a href="{{url('/')}}" title="Voltar">  <button type="button" class="btn btn-primary">Home</button></a>
        <a href="{{url('/showcharts')}}" title="Grafico">  <button type="button" class="btn btn-primary">Grafico</button></a>
      </div>

      <form class="addhashtag form-inline" action="{{url('addhashtag')}}" method="post">
        {{csrf_field()}}
        <label class="mr-sm-2" for="inlineFormCustomSelect">Hashtag:</label>
        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="hashtag" value=""placeholder="#RPC">
        <input type="submit" class="btn btn-success"value="Salvar">

      </form>
</div>
  </body>
</html>
