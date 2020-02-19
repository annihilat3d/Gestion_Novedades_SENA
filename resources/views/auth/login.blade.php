<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <title></title>

    <link type="text/css" rel="stylesheet" href='{{asset('css/login.css')}}'/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>

      <form action="{{route('login')}}" class="login-form" method="POST">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;
          &nbsp;&nbsp;
          {{csrf_field() }}
        <img src="images/sena.png" class="images2" alt="">

        <h1>Ingresar</h1>
        {!! $errors->first('email',' <span class="redt">:message</span>')!!}
        <div class="txtb">
        <input type="email" name="email" value="{{old('email')}}">
          <span data-placeholder="Email"></span>      
        </div>
     
        {!! $errors->first('password','<span class="redt" >:message</span>')!!}

        <div class="txtb">
        
          <input type="password" name="password">
          <span data-placeholder="Contraseña" ></span>
        </div>
    

        <input type="submit" class="logbtn" value="Login">

        <div class="bottom-text">
         <a href="#"> Se te olvido la Contraseña?</a>
        </div>

      </form>

      <script type="text/javascript">
      $(".txtb input").on("focus",function(){
        $(this).addClass("focus");
      });

      $(".txtb input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });

      </script>


  </body>
</html>
