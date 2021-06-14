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
       <script src="scripts/removeElement.js"></script>
       <script src="scripts/onLogout.js"></script>    
    </head>
    <body>    
    <div id="alert" class="alert alert-warning" role="alert"> Uzupełnij wszystkie pola </div>  
     <div id="logo-top" class="container"><img src="images/Raport_Link_logo_light.svg"></div>
     <p class="welcome_text"><?php echo "Witaj ".$_SESSION['uname']  ?></p> 
     <p class="welcome_text"><?php echo "Tworzysz raport dla ".$_SESSION['nazwa_firmy']  ?></p> 
     <!-----------side buttons--->
     <div class="buttons_side">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-bolt fa-lg"></i> Dodaj zdarzenie</button>
      <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal"><i class="far fa-image fa-lg"></i> Dodaj grafikę</button> 
      <br>
        <button type="button" onclick="printContent('Raport');" class="btn btn-info"><i class="fas fa-print fa-lg"></i> Drukuj</button>    
        </div>      
    <!-----------side buttons--->
     <div class="buttons_middle"><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-bolt fa-lg"></i> Dodaj zdarzenie</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal"><i class="far fa-image fa-lg"></i> Dodaj grafikę</button>
        <br>
      <br>      
      <form action="scripts/redirect_to_signed_in.php">
        <button type="submit" class="btn btn-light"><i class="fas fa-arrow-left fa-lg"></i> Powrót</button>
        <button type="button" onclick="printContent('Raport');" class="btn btn-info"><i class="fas fa-print fa-lg"></i> Drukuj</button>
      </form>        
        <hr>
        <form action="scripts/logout.php" id="logout_form">
        <button onclick="return logout()" type="submit" class="btn btn-danger" id="logout_button"><i class="fas fa-sign-out-alt fa-lg"></i> Wyloguj</button>
        <button type="button" class="btn btn-success" id="new_raport"><i class="far fa-newspaper fa-lg"></i> Nowy raport</button>
      </form>
       </div>       
       <div id="Raport">
       <div id="raport_header"> 
         <?php
          echo '<img class="raport_header" src='.$_SESSION['logo'].'></img>';
         ?>
         </div>        
        <div id="Raport_footer">
        </div>
       </div>         
      </div> 
      <script>
        if(sessionStorage && sessionStorage.getItem(sessionStorage.getItem("currentRaport")))
        document.getElementById("Raport").innerHTML = JSON.parse(sessionStorage.getItem(sessionStorage.getItem("currentRaport")));
      </script>
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
            <input type="time" class="form-control" id="time" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Zdarzenie:</label>
            <textarea class="form-control" id="event" required></textarea>
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
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nowa grafika</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <div>
                    <input id="upload" type="file" class="btn btn-primary" hidden/>
                    <label class="btn btn-primary" id="upload_label" for="upload">Wybierz plik</label>
                    <button type="button" id="open-editor" onclick="loadImage()" class="btn btn-primary" data-toggle="modal" data-target="#editImageModal" hidden><i class="far fa-image fa-lg"></i> Edytuj grafikę</button> 
        </div>        
        <!-- Uploaded image area-->
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Czas:</label>
            <input type="time" class="form-control" id="time_photo" require>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Zdarzenie:</label>
            <textarea class="form-control" id="event_photo" required></textarea>
          </div>
        <div class="image-area mt-4"><img id="imageResult" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cofnij</button>
        <button type="submit" id="accept" name="add_photo" class="btn btn-primary" data-dismiss="modal">Dodaj</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------->
<div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edytuj grafikę</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="app">
              <div class="controls">
                  <div class="type">
                      <input type="radio" id="pen" value="0" checked name="choice">
                      <label for="pen-pencil">
                          <i class="fa fa-pencil">Pen</i>
                      </label>
                      <input type="radio" id="rect" value="1" name="choice">
                      <label for="pen-brush">
                          <i class="fa fa-paint-brush">Rect</i>
                      </label>
                  </div>
                  <div class="size">
                      <label for="pen-size">Size</label>
                      <input type="range" id="pen-size" min="1" max="20" value="5">
                      <label for="pen-size" id="pen-size-val">5</label>
                  </div>
                  <div class="color">
                      <label for="pen-color">Color</label>
                      <input type="color" id="pen-color" value="#ff0000">
                  </div>
                  <div class="reset">
                      <button id="reset-canvas">Reset</button>
                  </div>
              </div>
              <div id="canvas-wrapper">
                  <canvas id="img-edit-canvas"></canvas>
              </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cofnij</button>
        <button type="button" id="save-image" class="btn btn-primary" data-dismiss="modal">Zapisz</button>
      </div>
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------->
      <script src="scripts\add_event.js"></script>     
      <script src="scripts\add_photo.js"></script> 
      <script src="scripts\imageModalHandle.js"></script> 
      <script src="scripts\edit_image.js"></script> 
      <script>
      function printContent(el)
      {      
        var restorepage = $('body').html(); 
        var printcontent = $('#' + el).clone();              
        $('body').empty().html(printcontent);
        window.print();              
        $('body').html(restorepage);     
      }          
</script>      
    </body>
</html>
