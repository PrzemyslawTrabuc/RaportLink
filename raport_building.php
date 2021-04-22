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
        <script src="node_modules\jquery\dist\jquery.min.js"></script>     
          <script>
        $(document).ready(function() {
       
       $("button[name='add_event']").click(function() {
           var domElement = $('<div class="event"><p>dasdasdasdsadssa</p></div>');
           $("div[id='raport_header']").after(domElement);
       });
       
      });
          </script>
    </head>
    <body>      
     <div id="logo-top" class="container"><img src="images/Raport Link logo_light.svg"></div>
     <p class="welcome_text"><?php echo "Witaj ".$_SESSION['uname']  ?></p> 
     <p class="welcome_text"><?php echo "Tworzysz raport dla ".$_SESSION['uname']  ?></p> 
     <div class="buttons_middle"><p class="buttons"><button name="add_event" class="btn btn-primary"><i class="fas fa-bolt fa-lg"></i> Dodaj zdarzenie</button>
      <br>
        <button type="button" class="btn btn-primary"><i class="far fa-image fa-lg"></i> Dodaj grafikę</button>
      <br>    
      <form action="scripts/logout.php">
        <button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt fa-lg"></i> Wyloguj</button></p>
      </form>
      <form action="scripts/logout.php">
        <button type="submit" class="btn btn-info"><i class="fas fa-print fa-lg"></i> Drukuj</button></p>
      </form>
       </div>
       <div id="Raport">
         <div id="raport_header"></div>
       </div>
    </body>
</html>
