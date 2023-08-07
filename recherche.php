
  <?php
  session_start();
include('connexion.php');
if(isset($_POST['chercher']))
{
  
    $filiere=$_POST['filiere'];
    $semestre=$_POST['semestre'];
    $requet1="SELECT * FROM semestre WHERE semestre.id_semestre=$semestre";
  $result1=mysqli_query($link,$requet1);
  $data1=mysqli_fetch_assoc($result1);
  if($data1==true)
  {
    $_SESSION['semestre']=$data1['lib_semestre'];
    $_SESSION['id_semestre']=$data1['id_semestre'];
    $requet2="SELECT * FROM filiere WHERE filiere.id_filiere=$filiere";
  $result2=mysqli_query($link,$requet2);
  $data2=mysqli_fetch_assoc($result2);
  if($data2==true)
  {
    $_SESSION['filiere']=$data2['lib_filiere'];
    $_SESSION['id_filiere']=$data2['id_filiere'];
    header('location:ajouter_planning.php');
  }
  }
  
    
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
  <title>ajouter planning</title>
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
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> 
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

      
                        <a href="ajouter_salle.php" class="nav_link"> <i class="bx bx-edit"></i>
                        <span class="nav_name">Ajouter salle</span> </a> 
            
                        <a href="#" class="nav_link"> 
                          <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                          <span class="nav_name">Stats</span> </a> </div>
            </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
   <style>
    
   </style>
    <div class="gestion">
        <img src="photo/icon.jpeg" width="50px" class="image"><h3>GESTION PLANNING</h3>
    </div>
    
    

<div class="container">
<h1>Veuillez choisir:</h1><br>
<form action="" method="POST" enctype="multipart/form-data">
<div class="mb-3">
       <select class="form-select"  name="filiere">
<?php

include ("connexion.php");
$sql="select * from filiere"; 
$result=mysqli_query($link,$sql);
while ($liste_filiere=mysqli_fetch_assoc($result)) {
echo '<option value='.$liste_filiere["id_filiere"].'>';
echo $liste_filiere["lib_filiere"];
echo'</option>';}
?>
</select> 
<select class="form-select"  name="semestre">
<?php

include ("connexion.php");
$sql="select * from semestre"; 
$result=mysqli_query($link,$sql);
while ($liste_semestre=mysqli_fetch_assoc($result)) {
echo '<option value='.$liste_semestre["id_semestre"].'>';
echo $liste_semestre["lib_semestre"];
echo'</option>';}
?>
</select> 
<button type="submit" class="btn btn-primary" name="chercher">Modifier</button>
  </form>
  </div>
  <style>
    .container {
  background-color: #6C00FF;
  padding: 20px 60px;
  border-radius: 5px;
  width: 600px;
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

/*===== LINK ACTIVE =====*/
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

