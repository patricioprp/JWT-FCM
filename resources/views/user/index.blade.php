<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Usuarios</title>
</head>
<body><div class="col-xs-12">
    <div class="table-responsive">
      <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
        <thead>
          <th>#</th>
          <th>NOMBRE</th>
          <th>CORREO ELECTRONICO</th>
          <th>FCMTOKEN</th>
        </thead>
        <tbody>
          @foreach ($users as $user)
             <tr>
               <td>{{$user->id}}</td>
               <td>{{$user->name}}</td>
               <td>{{$user->email}}</td>
              <td>{{ $user->token_fcm }}</td>
             </tr>
          @endforeach    
        </tbody>
      </table>
      </div>
      </div>
      {!! Form::open(['route' => 'user.store','method'=>'POST']) !!}
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Titulo</span>
        </div>
        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="title">
      </div>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Mensaje</span>
        </div>
        <textarea class="form-control" aria-label="With textarea" id="text"></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info" id="enviar">Enviar</button>
      </div>
      {!! Form::close() !!}
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
      <script>
        (function (){
            'use:strict';

            let login = document.getElementById('enviar');
            login.addEventListener('click', e=> {
                e.preventDefault();
                fetch("https://fcm.googleapis.com/fcm/send", {
  body: "{ \"notification\": { \"title\": \"Hey amigo, lee esto!\", \"body\": \"Felicidades!! Has recibido una gloriosa notificación\", \"icon\": \"/itwonders-web-logo.png\" }, \"to\" : \"eEKO6fsquKE:APA91bEO6ib_UK3N-dwtWfA2avXE8pjPb7QxJSK_NclsaF3j_BUZ2oti012mFvxKpOF5RQPkhlle9hVE4umXA1q0-IphKRBQ9QVA6YxSEw9MUH77Q4KWMVQBpF7lD0mDErodPp618VUO\" }",
  headers: {
    Authorization: "key=AAAAgOH_5Ws:APA91bG-3jbQ0sAzwjE_4tmAujDatkBvHaOtJ9fmxjpY8is83b6UzgYDjMo3Ic2JWy45Oml17b5-VvuCib2NXC4NygsR992h_G4d88tpMAUpkA7LzZQzpzHJAhoiwF8GFOBr2dSykudN",
    "Content-Type": "application/json"
  },
  method: "POST"
})
                .then(response => {
                    return response.json()
                })
                .then(data =>console.log(data))
            });
        })();
        </script>
</body>
</html>