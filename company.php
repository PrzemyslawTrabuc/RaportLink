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
    <div id="alert" class="alert alert-success " role="alert"> Zmiany w firmach wprowadzone </div>
      <div id="logo-top" class="container"><img src="images/Raport_Link_logo_light.svg"></div>
      <p class="welcome_text"><?php echo "Witaj w edycji firm: ".$_SESSION['uname']  ?></p> 
      <div class="buttons_middle">     
      <form action="scripts/redirect_to_company.php" method="POST">
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
            echo "<button name='id' value=$id type='submit' class='btn btn-primary'><i class='far fa-building fa-lg'></i> $name</button><img class='company_logo' src=$img></img><br><br>";
          } 
        ?>
      </form>
      <button class="btn btn-light" data-toggle="modal" data-target="#newUser"><i class="fas fa-user-plus fa-lg"></i> Nowa firma </button> 
      <br>
      <form action="scripts/redirect_to_signed_in.php" method="POST">
            <button type="submit" class="btn btn-light"><i class="far fa-arrow-alt-circle-left fa-lg"></i> Powrót</button>
        </form>   
      <form action="scripts/logout.php">
      <hr>
        <p></p><button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt fa-lg"></i> Wyloguj</button></p>
        </form>
       </div>

<!--------------------------------------------------------------------------------->
<div class="modal fade" id="oldUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">      
        <h5 class="modal-title" id="exampleModalLabel">Edycja firmy: 
        <?php 
        $name = $_SESSION['name'];
        echo "$name";
        ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="scripts/edit_company.php" method="POST">
          <?php
              $id = $_SESSION['id'];
              $name = $_SESSION['name'];
              $code = $_SESSION['code'];
              $city = $_SESSION['city'];
              $street = $_SESSION['street'];
              $num = $_SESSION['number'];
              $path = $_SESSION['path'];
              $idzdj = $_SESSION['idzdj'];

              echo "<input type='hidden' class='form-control' id='id' value='$id' name='id' required>",
              "<div class='form-group'><label for='name'>Nazwa: </label>",
              "<input type='text' class='form-control' id='name' value='$name' name='name'></div>",
              "<div class='form-group'><label for='code'>Kod pocztowy: </label>",
              "<input type='number' class='form-control' id='code' value='$code' name='code' required></div>",
              "<div class='form-group'><label for='city'>Miasto: </label>",
              "<input type='text' class='form-control' id='city' value='$city' name='city' required></div>",
              "<div class='form-group'><label for='street'>Ulica: </label>",
              "<input type='text' class='form-control' id='street' value='$street' name='street' required></div>",
              "<div class='form-group'><label for='number'>Numer lokalu: </label>",
              "<input type='number' class='form-control' id='number' value='$num' name='number' required></div>",
              "<div class='form-group'><label for='path'>Logo: </label>",
              "<input type='file' class='form-control' id='path' value='$path' name='path' accept='image/png, image/jpeg'></div>",

              "<input type='hidden' class='form-control' id='idzdj' value='$idzdj' name='idzdj' required>";             

              "<input type='hidden' class='form-control' id='idzdj' value='$idzdj' name='idzdj'>";             

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
        <h5 class="modal-title" id="exampleModalLabel">Nowa firma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="scripts/create_company.php" method="POST">
            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="code">Kod pocztowy:</label>
                <input type="number" class="form-control" id="code" name="code" required>
            </div>
            <div class="form-group">
                <label for="city">Miasto:</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="street">Ulica:</label>
                <input type="text" class="form-control" id="street" name="street" required>
            </div> 
            <div class="form-group">
                <label for="number">Numer lokalu:</label>
                <input type="number" class="form-control" id="number" name="number" required>
            </div> 
            <div class="form-group">
                <label for="path">Logo:</label>
                <input type="file" class="form-control" id="path" name="path" size="25" accept='image/png, image/jpeg' required>
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
        <?php   
if(@$_SESSION['users_edit_flag'] == 1)
{  
echo "<script type='text/javascript'>","document.getElementById('alert').style.display = 'block';","</script>";
$_SESSION['users_edit_flag']=0;
}
?>
    </body>
</html>
