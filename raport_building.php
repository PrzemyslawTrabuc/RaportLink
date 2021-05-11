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
        <script src="scripts\add_photo.js"></script>     
             
    </head>
    <body>      
     <div id="logo-top" class="container"><img src="images/Raport_Link_logo_light.svg"></div>
     <p class="welcome_text"><?php echo "Witaj ".$_SESSION['uname']  ?></p> 
     <p class="welcome_text"><?php echo "Tworzysz raport dla ".$_SESSION['uname']  ?></p> 
     <!-----------side buttons--->
     <div class="buttons_side"><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-bolt fa-lg"></i> Dodaj zdarzenie</button>
      <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal"><i class="far fa-image fa-lg"></i> Dodaj grafikę</button> 
        </div>      
    <!-----------side buttons--->
     <div class="buttons_middle"><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-bolt fa-lg"></i> Dodaj zdarzenie</button>
      <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal"><i class="far fa-image fa-lg"></i> Dodaj grafikę</button>
      <br>    
      <br>
      <form action="scripts/logout.php">
        <button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt fa-lg"></i> Wyloguj</button>
      </form>
        <button type="bytton" onclick="printDiv('Raport')" class="btn btn-info"><i class="fas fa-print fa-lg"></i> Drukuj</button>
       </div>
       <script>
        function printDiv(divName) {
          var printContents = document.getElementById(divName).innerHTML;
          var originalContents = document.body.innerHTML;

          document.body.innerHTML = printContents;
          window.print();
          document.body.innerHTML = originalContents;
        }
       </script>
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
            <input type="time" class="form-control" id="time">
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
<script>
  $(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 700) {
    $('.buttons_side').fadeIn();
  } else {
    $('.buttons_side').fadeOut();
  }
});
/*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readURL(input) {
  if(input)
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);                                
        };
       reader.readAsDataURL(input.files[0]);   
    
    }
}

$(function () {
  if(input != null){
    $('#upload').on('change', function () {
        readURL(input);             
    });
  }
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label');

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}



</script>
        <div>
                    <input id="upload" type="file" onchange="readURL(this);" class="btn btn-primary" hidden/>
                    <label class="btn btn-primary" id="upload_label" for="upload">Wybierz plik</label>
        </div>

        <!-- Uploaded image area-->
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Czas:</label>
            <input type="time" class="form-control" id="time_photo">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Zdarzenie:</label>
            <textarea class="form-control" id="event_photo"></textarea>
          </div>
        <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cofnij</button>
        <button type="button" name="add_photo" class="btn btn-primary" data-dismiss="modal">Dodaj</button>
      </div>
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------->


    </body>
</html>
