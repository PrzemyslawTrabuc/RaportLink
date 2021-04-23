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
        <script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
        <script src="scripts\add_event.js"></script>          
             
    </head>
    <body>      
     <div id="logo-top" class="container"><img src="images/Raport Link logo_light.svg"></div>
     <p class="welcome_text"><?php echo "Witaj ".$_SESSION['uname']  ?></p> 
     <p class="welcome_text"><?php echo "Tworzysz raport dla ".$_SESSION['uname']  ?></p> 
     <div class="buttons_middle"><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-bolt fa-lg"></i> Dodaj zdarzenie</button>
      <br>
        <button type="button" class="btn btn-primary"><i class="far fa-image fa-lg"></i> Dodaj grafikę</button>
      <br>    
      <br>
      <form action="scripts/logout.php">
        <button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt fa-lg"></i> Wyloguj</button>
      </form>
      <form action="scripts/logout.php">
        <button type="submit" class="btn btn-info"><i class="fas fa-print fa-lg"></i> Drukuj</button>
      </form>
       </div>
       <div id="Raport">
         <div id="raport_header"></div>
       </div>         
</div> 
</div>
<!--------------------------------------------------------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nowe zdarzenie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Czas:</label>
            <input type="text" class="form-control" id="time">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Zdarzenie:</label>
            <textarea class="form-control" id="event"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cofnij</button>
        <button type="button" name="add_event" class="btn btn-primary" data-dismiss="modal">Dodaj</button>
      </div>
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------->
    </body>
</html>
