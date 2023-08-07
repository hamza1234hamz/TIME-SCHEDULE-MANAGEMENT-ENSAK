
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
  <title>dashboard</title>
  <style>
    th,tr,td{
        text-align:center;
        width: 300px;
        text-transform:uppercase;
        

    }
    h2{
        text-align:center;
        background-color: #205295;
        color:white;
        border-radius: 5px;
        
    }
    
  </style>
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
session_start();
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
                   <a href="dashbord.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> 
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
    
    

<div class="">

 <h2 id="">Liste des enseignants</h2>
 <table class="table">
<thead>
    <tr>
    
      <th scope="col">NOM</th>
      <th scope="col">PRENOM</th>
      <th scope="col">Charge horaire</th>
    
    </tr>
</thead>
<tbody>
<?php

include("connexion.php");

    $sql2="SELECT * FROM `enseignant`";
    $result2=mysqli_query($link,$sql2);
    while($data2=mysqli_fetch_assoc($result2)){
        echo"<tr>";
        echo"<td>".$data2['nom_E']."</td>";
        echo"<td>".$data2['prenom_E']."</td>";
        echo"<td>".$data2['charge_horaire']."</td>";
        echo"</tr>";
        
    }
    ?>
    </tbody>
</table>
</div>

<h2 id="">Liste des salles</h2>
 <table class="table">
<thead>
    <tr>
    
      <th scope="col">Salle</th>
      <th scope="col">Type de la salle</th>
      <th scope="col">Capacité par personne</th>

    
    </tr>
</thead>
<tbody>
<?php

include("connexion.php");

    $sql2="SELECT * FROM `salle`";
    $result2=mysqli_query($link,$sql2);
    while($data2=mysqli_fetch_assoc($result2)){
        echo"<tr>";
        echo"<td>".$data2['nom_salle']."</td>";
        echo"<td>".$data2['type']."</td>";
        echo"<td>".$data2['capacite']."</td>";

        
        echo"</tr>";
        
    }
    ?>
    </tbody>
</table>
</div>
<h2 id="">Liste des Filieres</h2>
 <table class="table">
<thead>
    <tr>
    
      <th scope="col">Filiere</th>
      <th scope="col">Charge horaire</th>
    
    </tr>
</thead>
<tbody>
<?php

include("connexion.php");

    $sql2="SELECT * FROM `filiere`";
    $result2=mysqli_query($link,$sql2);
    while($data2=mysqli_fetch_assoc($result2)){
        echo"<tr>";
        echo"<td>".$data2['lib_filiere']."</td>";
 
        echo"<td>".$data2['charge_horaire']."</td>";
        echo"</tr>";
        
    }
    ?>
    </tbody>
</table>











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