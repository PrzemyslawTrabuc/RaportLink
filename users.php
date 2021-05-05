<?php 
session_start();
if($_SESSION['uname']=="")
{  
  header('Location: index.php');
  exit;
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

        <?php 
          if(isset($_SESSION['name']))
          {  
            echo "<script type='text/javascript'>",
            "function openModal() {".
              "$('#oldUser').modal('show');".
            "}",
            "</script>";
          }
        ?>

    </head>
    <body>
        <div id="logo-top" class="container"><img src="images/Raport_Link_logo_light.svg"></div>
        <p class="welcome_text"><?php echo "Witaj ".$_SESSION['uname']  ?></p> 
        <div class="buttons_middle">     
        <form action="scripts/redirect_to_users.php" method="POST">
          <?php 
              include "scripts/config.php";    
              $sql_query = "select * from pracownicy";
              $result = mysqli_query($link,$sql_query);
              while($row = mysqli_fetch_array($result)){
                  $id = $row['nrid'];
                  $name = $row['Imie'];
                  $surname = $row['Nazwisko'];
                  echo "<button name='id' value=$id type='submit' class='btn btn-primary'><i class='fas fa-user fa-lg'></i> $name $surname</button><br>";
              } 
          ?>
        </form>
        <button class="btn btn-light" data-toggle="modal" data-target="#newUser"><i class="fas fa-user-plus fa-lg"></i> Nowy użytkownik </button>
        <form action="scripts/redirect_to_signed_in.php" method="POST">
            <button type="submit" class="btn btn-light"><i class="far fa-arrow-alt-circle-left fa-lg"></i> Powrót</button>
        </form> 
        <form action="scripts/logout.php">
        <p style="margin-top: 100px;"></p><button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt fa-lg"></i> Wyloguj</button></p>
        </form>
       </div>


<!--------------------------------------------------------------------------------->
<div class="modal fade" id="oldUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">      
        <h5 class="modal-title" id="exampleModalLabel">Edycja użytkownika: 
        <?php 
        $name = $_SESSION['name'];
        $surname = $_SESSION['surname'];
        echo "$name $surname";
        ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="scripts/edit_user.php" method="POST">
          <?php
              $id = $_SESSION['id'];
              $name = $_SESSION['name'];
              $surname = $_SESSION['surname'];
              echo "<input type='hidden' class='form-control' id='id' value='$id' name='id'>",
              "<div class='form-group'><label for='name'>Imie: </label>",
              "<input type='text' class='form-control' id='name' value='$name' name='name'></div>",
              "<div class='form-group'><label for='surname'>Nazwisko: </label>",
              "<input type='text' class='form-control' id='surname' value='$surname' name='surname'></div>",
              "<div class='form-group'><label for='password'>Hasło:</label>",
              "<input type='text' class='form-control' id='password' name='password'></div>";             
          ?> 
          <br>
          <div class="modal-footer">          
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cofnij</button>
          <button type='submit' class='btn btn-primary'><i class='fas fa-sync fa-lg'></i> Aktualizuj</button>
          </div>
        </form>
      </div>     
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------->
<div class="modal fade" id="newUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nowy użytkownik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="scripts/edit_user.php" method="POST">
        <div class="form-group">
            <label for="name">Imie:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Nazwisko:</label>
            <input type="text" class="form-control" id="surname" name="surname" required>
            </div>
            <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" class="form-control" id="login" name="login" required>
            </div>
            <div class="form-group">
            <label for="password">Hasło:</label>
            <input type="text" class="form-control" id="password" name="password" required>
            </div> 
            <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cofnij</button>
        <button type="submit" class="btn btn-primary"><i class="far fa-plus-square fa-lg"></i> Dodaj</button>
      </div>
        </form>
      </div>     
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------->

        <?php 
          if(isset($_SESSION['name']))
          {  
            echo "<script type='text/javascript'>",
              "openModal();",
            "</script>";
          }
        ?>

    </body>
</html>
