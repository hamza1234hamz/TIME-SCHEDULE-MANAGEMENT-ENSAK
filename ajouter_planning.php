<?php
include('connexion.php');
session_start();
  $filiere=$_SESSION['filiere'];
  $id_filiere=$_SESSION['id_filiere'];
  $semestre=$_SESSION['semestre'];
  $id_semestre=$_SESSION['id_semestre'];
if(isset($_POST['ajouter']))
{
  $module=$_POST['module'];
  $module=$_POST['module'];
  $salle=$_POST['salle'];
  $jour=$_POST['jour'];
  $heure=$_POST['heure'];
  $enseignant=$_POST['enseignant'];
  $requet="INSERT INTO `seance`(`id_seance`, `id_enseignant`, `id_salle`, `id_semestre`, `id_heure`, `id_jour`, `id_filiere`, `id_module`) VALUES (NULL,'$enseignant','$salle','$id_semestre','$heure','$jour','$id_filiere','$module')";
  $result=mysqli_query($link,$requet);
  if($result==true)
  {
    echo"<div class='alert alert-success' role='alert'>"."<p>Ajouts avec succes!</p>"."</div>";
  }
  else{exit("hi");}
  
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="admin.css">
  <title>admin</title>
</head>

  <body id="body-pd">
    
 
    <header class="header" id="header">
      <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
      <nav class="navbar navbar-expand-lg navbar-primary bg-light">
        <div class="container-fluid">    
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
             
             
            </div>
          </div>
        </div>
      </nav>
  
                    <div class="nom">  

      <?php

include("connexion.php");
$user=$_SESSION['id_user2'];
$sql="SELECT * FROM admin WHERE id_user='$user'";
$result=mysqli_query($link,$sql);
$data=mysqli_fetch_assoc($result);
echo "".$data['prenom_admin']." ";
echo "".$data['nom_admin']."    ";


?>                  
              
</div>
       
    </header>

    
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="admin.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> 
              <span class="nav_logo-name">Gestion Planning</span> </a>
                <div class="nav_list">
                   <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> 
                    <span class="nav_name">Dashboard</span> </a>
                     
                   <a href="compte.php" class="nav_link">
                    
                     <i class='bx bx-user nav_icon'></i> 
                    <span class="nav_name">Compte</span> </a> 

                    <a href="recherche.php" class="nav_link">
                      <i class="bx bx-edit"></i> 
                       <span class="nav_name">Ajouter Planning</span> </a> 

                       <a href="ajouter_enseignant.php" class="nav_link"> <i class="bx bx-edit"></i>
                        <span class="nav_name">Ajouter enseignant</span> </a> 

                        <a href="ajouter_module.php" class="nav_link"> <i class="bx bx-edit"></i>
                        <span class="nav_name">Ajouter module</span> </a> 

                        <a href="ajouter_filiere.php" class="nav_link"> <i class="bx bx-edit"></i>
                        <span class="nav_name">Ajouter filiere</span> </a> 

      
                        <a href="ajouter_salle.php" class="nav_link"> <i class="bx bx-edit"></i>
                        <span class="nav_name">Ajouter salle</span> </a> 
            
                         </div>
            </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
   <style>
    
   </style>
    <div class="gestion">
        <img src="photo/icon.jpeg" width="50px" class="image"><h3>GESTION PLANNING</h3>
    </div>
    
   <div class="container">
<h1>AJOUTER SCEANCE</h1>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="semestre">SEMESTRE</label>
      <input type="text" class="form-control" value="<?php echo $semestre ?>" disabled name="semestre">
</div>
<div class="mb-3">
      <label for="filiere">filiere</label>
      <input type="text"  class="form-control" value="<?php echo $filiere ?>" disabled name="filiere">
      </div><br>
      <div class="mb-3">
  <label for="module">module</label>
    <select class="form-select" name="module" >
      <?php
      include ("connexion.php");
      $sql="SELECT*FROM module,fil_sem_mod WHERE module.id_module=fil_sem_mod.id_module AND fil_sem_mod.id_semestre='$id_semestre' AND fil_sem_mod.id_filiere='$id_filiere'";
      $result=mysqli_query($link,$sql);
      while ($liste_module=mysqli_fetch_assoc($result))
    {
       echo '<option value='.$liste_module['id_module'].'>';
       echo $liste_module['lib_module'];
      echo'</option>';
    }
       ?>
    </select>
    </div><br>
    <div class="mb-3">
    <label for="salle">salle</label>
    <select class="form-select" name="salle" >
      <?php
      include ("connexion.php");
      $sql="SELECT*FROM salle";
      $result=mysqli_query($link,$sql);
      while ($liste_salle=mysqli_fetch_assoc($result))
    {
       echo '<option value='.$liste_salle['id_salle'].'>';
       echo $liste_salle['nom_salle'];
      echo'</option>';
    }
       ?>
    </select>
  </div><br>
  <div class="mb-3">

    <label for="enseignant">Enseignant</label>
    <select  class="form-select" name="enseignant" >
      <?php
      include ("connexion.php");
      $sql="SELECT*FROM enseignant,module,fil_sem_mod WHERE module.id_module=fil_sem_mod.id_module AND module.id_enseignant=enseignant.id_enseignant AND fil_sem_mod.id_semestre='$id_semestre' AND fil_sem_mod.id_filiere='$id_filiere'";
      $result=mysqli_query($link,$sql);
      while ($liste_enseignant=mysqli_fetch_assoc($result))
    {
       echo '<option value='.$liste_enseignant['id_enseignant'].'>';
       echo $liste_enseignant['nom_E'];
      echo'</option>';
    }
       ?>
    </select>
  </div><br>
  <div class="mb-3">

    <label for="heure">Heure</label>
    <select  class="form-select" name="heure" >
      <?php
      include ("connexion.php");
      $sql="SELECT * FROM heure ";
      $result=mysqli_query($link,$sql);
      while ($liste_heure=mysqli_fetch_assoc($result))
    {
       echo '<option value='.$liste_heure['id_heure'].'>';
       echo $liste_heure['heure'];
      echo'</option>';
    }
       ?>
    </select>
  </div><br>
  <div class="mb-3">

    <label for="jour">JOUR</label>
    <select class="form-select" name="jour" >
      <?php
      include ("connexion.php");
      $sql="SELECT * FROM jour";
      $result=mysqli_query($link,$sql);
      while ($liste_jour=mysqli_fetch_assoc($result))
    {
       echo '<option value='.$liste_jour['id_jour'].'>';
       echo $liste_jour['jour'];
      echo'</option>';
    }
       ?>
    </select>
  </div><br>

  <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
  </form>
  </div>






</form>
<style>
  .container {
  background-color:#6C00FF ;
  margin-top: 10px;
  padding: 20px 0px;
  border-radius: 40px;
  padding-left:200px;
  color:white;
}
.form-select{
  width:500px;
}
h1{
  color:white;
}


</style>




<script>
  document.addEventListener("DOMContentLoaded", function(event) {

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show')
// change icon
toggle.classList.toggle('bx-x')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}

showNavbar('header-toggle','nav-bar','body-pd','header')

const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

// Your code to run since DOM is loaded and ready
});
</script>
<!--Container Main end-->

</div>







</body>