<?php session_start();
$login_error_flag = 0; 
    include "scripts/config.php";    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $uname = mysqli_real_escape_string($link,$_POST['InputLogin']);
        $password = mysqli_real_escape_string($link,$_POST['InputPassword']);
        if ($uname != "" || $password != ""){
            $sql_query = "select count(*) as cntUser from dane_do_logowania where login='".$uname."' and haslo='".$password."'";
            $result = mysqli_query($link,$sql_query);     
            $row = mysqli_fetch_array($result);
            $count = $row['cntUser'];
            if($count > 0){
              $sql_query = "select nrid_pracownika from dane_do_logowania where login='".$uname."' and haslo='".$password."'";
              $result = mysqli_query($link,$sql_query);     
              $row = mysqli_fetch_array($result);     
              $row3 = $row['nrid_pracownika'];
              $sql_query2 = "select * from pracownicy where nrid='".$row3."'";
              $result2 = mysqli_query($link,$sql_query2);     
              $row2 = mysqli_fetch_array($result2);   
              $_SESSION['uname'] = $uname;
              $_SESSION['upr'] = $row2['Rola_w_systemie'];
              header('Location:signed_in.php', true, 301);
              echo $_SESSION['upr'];
              exit;
            }else{                 
              $login_error_flag = 1;        
            }
        }else if($uname == "" || $password == "")
        {
          $login_error_flag = 1;      
        }
    }
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
        <img src="images/Raport_Link_logo_light.svg" class="special_font">
       </div>
      
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
        <div id="alert" class="alert alert-danger " role="alert"> Błędne dane logowania </div>
      </div>  
    </div>
    </body>
</html>
<?php
if($login_error_flag == 1)
{
echo "<script type='text/javascript'>","document.getElementById('alert').style.display = 'block';","</script>";
}
?>