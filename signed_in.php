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
        <script src="scripts/onLogout.js"></script>  
        <script src="scripts/raportManager.js"></script>      
    </head>
    <body>
    
      <div id="logo-top" class="container"><img src="images/Raport_Link_logo_light.svg"></div>
      <p class="welcome_text"><?php echo "Witaj ".$_SESSION['uname']  ?></p> 
      <div class="buttons_middle">     
        <?php           
          if($_SESSION['upr'] != 0){
          include "scripts/config.php";    
          $sql_query = "select * from firma";
          $result = mysqli_query($link,$sql_query);
          echo "<form action='scripts/redirect_to_building.php' method='POST'>";
          while($row = mysqli_fetch_array($result)){
            $name = $row['nazwa'];
            $id = $row['nrid'];
            $idimg = $row['nrid_zdjecie'];
            $sql_query = "select * from zdjecie where nrid = '$idimg'";
            $result2 = mysqli_query($link,$sql_query);
            $row2 = mysqli_fetch_array($result2);
            $img = $row2['nazwa'];
            echo "<button name=$id value=$img onclick='updateRaportSession(this)' type='submit' class='btn btn-primary'><i class='far fa-building fa-lg'></i> $name</button><img class='company_logo' src=$img></img><br><br>";
<<<<<<< HEAD
          }
=======
          } 
>>>>>>> 0f77e90fbb2bf61a7c03c789bd6248469c615b6d
          echo "</form>";
          }else {
            echo "</form>";
          }

      
      
      ?>
      <form onclick="return logout()" action="scripts/logout.php" id="logout_form">
      <hr>
        <p></p><button type="submit" class="btn btn-danger" id="logout_button"><i class="fas fa-sign-out-alt fa-lg"></i> Wyloguj</button></p>
        </form>
       </div>
    </body>
</html>
