<?php session_start();
?>

<!DOCTYPE html>

<html>
    <head>  
        <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.css">
        <link rel="stylesheet" href="@fortawesome\fontawesome-free\css\all.css">
        <link rel="stylesheet" href="custom_css\custom_css.css">
        <link href="//db.onlinewebfonts.com/c/2ea06e066778c7c8c33ac017e8449d26?family=Polentical+Neon" rel="stylesheet" type="text/css"/>
        <style>
          .special_font{
            @import url(//db.onlinewebfonts.com/c/2ea06e066778c7c8c33ac017e8449d26?family=Polentical+Neon);
            font-family: "Polentical Neon"
          }
          img{
            @import url(//db.onlinewebfonts.com/c/2ea06e066778c7c8c33ac017e8449d26?family=Polentical+Neon);
            font-family: "Polentical Neon"
          }
        </style>
    </head>
    <body>      
      
       <div id="logo-top" class="container w3-animate-top" class="special_font">
        <img src="images/Raport Link logo_light.svg" class="special_font">
       </div>
      <!--
      <object data="images/Raport Link logo_light.svg" > </object>
      -->
      
     <div id="login-div">
     <form class="form" method="POST">
        <div class="form-group">
          <label class="form-label" for="InputLogin">Login</label>
          <input type="login" class="form-control" id="InputLogin" placeholder="Login" name="InputLogin">         
        </div>
        <div class="form-group">
          <label class="form-label" for="InputPassword">Hasło</label>
          <p><input type="password" class="form-control" id="InputPassword" placeholder="Hasło" name="InputPassword"></p>
        </div>       
        <div class="form-group" id="buttons"><p class="buttons"><button type="submit" method="POST" class="btn btn-primary"><i class="fas fa-key fa-lg"></i> ZALOGUJ</button></div>
      </form>
    </div>  
      </div>
    </body>
</html>
<?php
include "scripts/config.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $uname = mysqli_real_escape_string($link,$_POST['InputLogin']);
    $password = mysqli_real_escape_string($link,$_POST['InputPassword']);

    if ($uname != "" && $password != ""){
        $sql_query = "select count(*) as cntUser from dane_do_logowania where login='".$uname."' and haslo='".$password."'";
        $result = mysqli_query($link,$sql_query);     
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){        
            $_SESSION['uname'] = $uname;
            header('Location: signed_in.php');
        }else{
            echo "<div class=\"alert alert-danger \" role=\"alert\"> Błędne dane logowania </div>";
        }

    }

}
?>