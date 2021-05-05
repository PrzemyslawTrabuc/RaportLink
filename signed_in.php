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
    </head>
    <body>
      <div id="logo-top" class="container"><img src="images/Raport_Link_logo_light.svg"></div>
      <p class="welcome_text"><?php echo "Witaj ".$_SESSION['uname']  ?></p> 
      <div class="buttons_middle">     
      <form action="scripts/redirect_to_building.php" method="POST">
        <?php 
          include "scripts/config.php";    
          $sql_query = "select * from firma";
          $result = mysqli_query($link,$sql_query);
          
          while($row = mysqli_fetch_array($result)){
            $name = $row['nazwa'];
            $id = $row['nrid'];
            $idimg = $row['nrid_zdjecie'];
            $sql_query = "select * from zdjecie where nrid = '$idimg'";
            $result2 = mysqli_query($link,$sql_query);
            $row2 = mysqli_fetch_array($result2);
            $img = $row2['nazwa'];
            echo "<button name=$id value=$img type='submit' class='btn btn-primary'><i class='far fa-building fa-lg'></i> $name</button><img class='company_logo' src=$img></img><br><br>";
          } 
        ?>
      </form>
      <form action="" method="POST">
        <button type="submit" class="btn btn-light"><i class="far fa-edit fa-lg"></i> Edytuj Raporty</button>
      </form>  
      <br>
      <form action="scripts/redirect_to_users.php" method="POST">
        <button type="submit" class="btn btn-light"><i class="far fa-edit fa-lg"></i> Użytkownicy</button>     
      </form>  
      <form action="scripts/logout.php">
        <p style="margin-top: 100px;"></p><button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt fa-lg"></i> Wyloguj</button></p>
        </form>
       </div>
    </body>
</html>
