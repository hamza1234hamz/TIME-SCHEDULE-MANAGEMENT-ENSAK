<?php
session_start();
include('connexion.php');
if(isset($_POST['connecter']))
{
$login=$_POST['login'];
$pass=$_POST['pass'];
$requet1="SELECT * FROM user,enseignant WHERE user.id_user=enseignant.id_user AND user.login='$login' AND user.pass='$pass'";
$result1=mysqli_query($link,$requet1);
$data1=mysqli_fetch_assoc($result1);
$requet2="SELECT * FROM user,admin WHERE user.id_user=admin.id_user AND user.login='$login' AND user.pass='$pass'";
$result2=mysqli_query($link,$requet2);
$data2=mysqli_fetch_assoc($result2);
  if($data1==true)
  {
    $_SESSION['id_user1']=$data1['id_user'];
    header('location:enseignant.php');
  }
  elseif($data2==true)
  {
    $_SESSION['id_user2']=$data2['id_user'];
    header('Location:admin.php');
  }
  else {exit("login or password incorreect");}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <title>login</title>
  </head>
  <body>
    <img id="login" src="images/login.svg" alt="login" width="80%">
    <div class="container">
      <h1>BIENVENUE !</h1>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-control">
          <input type="text" name="login" />
          <label>Email</label>
        </div>
        <div class="form-control">
          <input type="password" name="pass" />
          <label>Password</label>
        </div>
        <button class="btn" name="connecter">SE Connecter</button>
      </form>
    </div>
    <script src="login.js"></script>
  </body>
  <?php mysqli_close($link) ?>
</html>