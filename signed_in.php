<?php 
session_start();
if($_SESSION['uname']=="")
{  
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>     
        <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.css">
        <link rel="stylesheet" href="@fortawesome\fontawesome-free\css\all.css">
        <link rel="stylesheet" href="custom_css\custom_css.css">
    </head>
    <body>      
     <div id="logo-top" class="container"><img src="images/Raport Link logo_light.svg"></div>
     <p class="welcome_text"><?php echo "Witaj ".$_SESSION['uname']  ?></p> 
     <div class="buttons_middle">
      <p class="buttons"><button type="button" class="btn btn-primary"><i class="far fa-building fa-lg"></i> Firma 1</button><img class="company_logo" src="images/Raport Link logo_dark.svg"></img>
      <br>
        <button type="button" class="btn btn-primary"><i class="far fa-building fa-lg"></i> Firma 2</button> <img class="company_logo" src="images/Raport Link logo_light.svg"></img>
      <br>
     
        <button type="button" class="btn btn-light"><i class="far fa-edit fa-lg"></i> Edytuj Raporty</button>     
      <br>
      <form action="scripts/logout.php">
        <p style="margin-top: 100px;"></p><button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt fa-lg"></i> Wyloguj</button></p>
        </form>
       </div>
    </body>
</html>
