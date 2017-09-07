<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Show Hashtag</title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>
  <body>

    <div class="container">

      <h1 class="tittle">RPC-HashtagFilter</h1>
      <div class="menu">
           <a href="{{url('addhashtag')}}" title="Adicionar Hashtag">  <button type="button" class="btn btn-primary">+ Hashtag</button></a>
           <a href="{{url('/showcharts')}}" title="Grafico">  <button type="button" class="btn btn-primary">Grafico</button></a>
        </div>
      <div class="row">
        <div class="col-sm-8">


      @if($data!="")
      @for($i=0;$i<count($data);$i++)

    </br>
      <span class="h1" >{{$tag[$i]->hashtag}} </span>
        <span class="glyphicon glyphicon-remove remover"  onclick="remover({{$tag[$i]->id}})" title="Remover Hashtag"></span>


    <div class="table-responsive">
      <table class="table sortable">
        <thead>

          <tr>
              <th>Usuário</th>
              <th>Tweet</th>
              <th>Dia</th>
              <th>RT</th>
              <th>Localização</th>

          </tr>

       </thead>
       <tbody>
        @foreach ($data[$i] as $datas)
        <tr>
          <td>

            <img src="{{$datas->user->profile_image_url}}">
            <br>
            {{$datas->user->name}}
          </td>
          <td>{!!$datas->text!!}</td>
          <td>{{date("d/m/Y", strtotime($datas->created_at))}}</td>
          <td>{{$datas ->retweet_count}}</td>
          <td>{{$datas ->user->location}}</td>

        </tr>
        @endforeach

      </tbody>
    </table>
    </div>
      @endfor


  </div>
  <div class="col-sm-3" >
    @foreach ($tag as $tags)
    <span class="h3" > {{$tags->hashtag}} </span>
      <span class="glyphicon glyphicon-remove remover-right" onclick="remover({{$tags->id}})" title="Remover Hashtag"></span>
    </br>
    @endforeach
  </div>

</div>


    @else

    <h1>Nada a mostrar</h1>
    @endif
  </div>
  <script type="text/javascript" src="js/app.js"></script>
  </body>

</html>
