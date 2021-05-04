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
        <link rel="stylesheet" href="..\node_modules\bootstrap\dist\css\bootstrap.css">
        <link rel="stylesheet" href="..\@fortawesome\fontawesome-free\css\all.css">
        <link rel="stylesheet" href="..\custom_css\custom_css.css">
        <script src="..\node_modules\jquery\dist\jquery.min.js"></script>  
        <script src="..\node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
    </head>
    <body>
        <div id="logo-top" class="container"><img src="../images/Raport_Link_logo_light.svg"></div>
        <p class="welcome_text"><?php echo "Witaj ".$_SESSION['uname']  ?></p> 
        <div class="buttons_middle">     
        <form action="redirect_to_users.php" method="POST">
        <?php 
            include "config.php";    
            $sql_query = "select * from pracownicy";
            $result = mysqli_query($link,$sql_query);
            while($row = mysqli_fetch_array($result)){
                $id = $row['nrid'];
                $name = $row['Imie'];
                $surname = $row['Nazwisko'];
                echo "<button name=$id value=$id type='submit' class='btn btn-primary'><i class='far fa-building fa-lg'></i> $name $surname</button><br>";
            } 
        ?>
        </form>
        <button class="btn btn-light" data-toggle="modal" data-target="#newUser"><i class="far fa-edit fa-lg"></i> Nowy użytkownik </button>
        <form action="redirect_to_signed_in.php" method="POST">
            <button type="submit" class="btn btn-light"><i class="far fa-edit fa-lg"></i> Powrót</button>
        </form> 
        <form action="logout.php">
        <p style="margin-top: 100px;"></p><button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt fa-lg"></i> Wyloguj</button></p>
        </form>
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
        <form action="redirect_to_signed_in.php" method="POST">
            <label for="fname">Imie:</label>
            <input type="text" class="form-control" id="fname" name="fname" required>
            <label for="fname">Nazwisko:</label>
            <input type="text" class="form-control" id="fname" name="fname" required>
            <label for="fname">Login:</label>
            <input type="text" class="form-control" id="fname" name="fname" required>
            <label for="fname">Hasło:</label>
            <input type="text" class="form-control" id="fname" name="fname" required>
            <button type="submit" class="btn btn-light"><i class="far fa-edit fa-lg"></i> Dodaj</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cofnij</button>
      </div>
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------->

    </body>
</html>
