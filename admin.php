<?php  include("connexion.php"); ?>
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
  <style>
    td,th,tr{text-align: center;}
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
echo "<img  width=40px src=photo/avatar.png>";



?>                  
              
</div>
       
    </header>

    
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> 
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
    <form action="" method="POST" >
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
    <button type="submit" class="btn btn-primary" name="submit">Visualiser</button>
  </div>
</form>
<?php

if(isset($_POST['submit'])){
$semestre=$_POST['semestre'];
$filiere=$_POST['filiere'];
?>

    
    <div class="container">
      <table class="table table-bordered">
<thead>
<tr>
  <th scope="col" >Jour/ Horaire</th>
  <th scope="col">8h30 - 10h30</th>
  <th scope="col">10h45 - 12h45</th>
  <th scope="col">14h00 - 16h00</th>
  <th scope="col">16h15 - 18h15</th>
  
</tr>
</thead>
<tbody>
<tr>
  <th scope="row">Lundi</th>
  <?php
                        include("connexion.php");
                        $sql1="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='1' AND seance.id_heure='1' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result1=mysqli_query($link,$sql1);
                        while($data1=mysqli_fetch_assoc($result1))
                        {
                          echo"<td>".$data1['lib_filiere']."<br> ".$data1['nom_E']."<br> ".$data1['nom_salle']."</td>";
                        }
                          ?>
  <?php
                        include("connexion.php");
                        $sql2="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='1'AND seance.id_heure='2' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result2=mysqli_query($link,$sql2);
                        while($data2=mysqli_fetch_assoc($result2))
                        {
                          echo"<td >".$data2['lib_filiere']."<br> ".$data2['nom_E']."<br> ".$data2['nom_salle']."</td>";
                        }
                          ?>
  <?php
                        include("connexion.php");
                        $sql3="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='1'AND seance.id_heure='3' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result3=mysqli_query($link,$sql3);
                        while($data3=mysqli_fetch_assoc($result3))
                        {
                          echo"<td>".$data3['lib_filiere']."<br> ".$data3['nom_E']."<br> ".$data3['nom_salle']."</td>";
                        }
  ?>
  <?php
                        include("connexion.php");
                        $sql4="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='1'AND seance.id_heure='4' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result4=mysqli_query($link,$sql4);
                        while($data4=mysqli_fetch_assoc($result4))
                        {
                          echo"<td>".$data4['lib_filiere']."<br> ".$data4['nom_E']."<br> ".$data4['nom_salle']."</td>";
                        }
  ?>
</tr>
<tr>
  <th scope="row">Mardi</th>
  <?php
                        include("connexion.php");
                        $sql1="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='2' AND seance.id_heure='1' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result1=mysqli_query($link,$sql1);
                        while($data1=mysqli_fetch_assoc($result1))
                        {
                          echo"<td>".$data1['lib_filiere']."<br> ".$data1['nom_E']."<br> ".$data1['nom_salle']."</td>";
                        }
                          ?>
  <?php
                        include("connexion.php");
                        $sql2="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='2'AND seance.id_heure='2' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result2=mysqli_query($link,$sql2);
                        while($data2=mysqli_fetch_assoc($result2))
                        {
                          echo"<td>".$data2['lib_filiere']."<br> ".$data2['nom_E']."<br> ".$data2['nom_salle']."</td>";
                        }
                          ?>
  <?php
                        include("connexion.php");
                        $sql3="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='2'AND seance.id_heure='3' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result3=mysqli_query($link,$sql3);
                        while($data3=mysqli_fetch_assoc($result3))
                        {
                          echo"<td>".$data3['lib_filiere']."<br> ".$data3['nom_E']."<br> ".$data3['nom_salle']."</td>";
                        }
  ?>
  <?php
                        include("connexion.php");
                        $sql4="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='2'AND seance.id_heure='4' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result4=mysqli_query($link,$sql4);
                        while($data4=mysqli_fetch_assoc($result4))
                        {
                          echo"<td>".$data4['lib_filiere']."<br> ".$data4['nom_E']."<br> ".$data4['nom_salle']."</td>";
                        }
  ?>
</tr>
<tr>
  <th scope="row">Mercredi</th>
  <?php
                        include("connexion.php");
                        $sql1="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='3' AND seance.id_heure='1' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result1=mysqli_query($link,$sql1);
                        while($data1=mysqli_fetch_assoc($result1))
                        {
                          echo"<td>".$data1['lib_filiere']."<br> ".$data1['nom_E']."<br> ".$data1['nom_salle']."</td>";
                        }
                          ?>
  <?php
                        include("connexion.php");
                        $sql2="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='3'AND seance.id_heure='2' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result2=mysqli_query($link,$sql2);
                        while($data2=mysqli_fetch_assoc($result2))
                        {
                          echo"<td>".$data2['lib_filiere']."<br> ".$data2['nom_E']."<br> ".$data2['nom_salle']."</td>";
                        }
                          ?>
  <?php
                        include("connexion.php");
                        $sql3="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='3'AND seance.id_heure='3' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result3=mysqli_query($link,$sql3);
                        while($data3=mysqli_fetch_assoc($result3))
                        {
                          echo"<td>".$data3['lib_filiere']."<br> ".$data3['nom_E']."<br> ".$data3['nom_salle']."</td>";
                        }
  ?>
  <?php
                        include("connexion.php");
                        $sql4="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='3'AND seance.id_heure='4' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result4=mysqli_query($link,$sql4);
                        while($data4=mysqli_fetch_assoc($result4))
                        {
                          echo"<td>".$data4['lib_filiere']."<br> ".$data4['nom_E']."<br> ".$data4['nom_salle']."</td>";
                        }
  ?>
</tr>
<tr>
  <th scope="row">Jeudi</th>
  <?php
                        include("connexion.php");
                        $sql1="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='4' AND seance.id_heure='4' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result1=mysqli_query($link,$sql1);
                        while($data1=mysqli_fetch_assoc($result1))
                        {
                          echo"<td>".$data1['lib_filiere']."<br> ".$data1['nom_E']."<br> ".$data1['nom_salle']."</td>";
                        }
                          ?>
  <?php
                        include("connexion.php");
                        $sql2="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='4'AND seance.id_heure='2' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result2=mysqli_query($link,$sql2);
                        while($data2=mysqli_fetch_assoc($result2))
                        {
                          echo"<td>".$data2['lib_filiere']."<br> ".$data2['nom_E']."<br> ".$data2['nom_salle']."</td>";
                        }
                          ?>
  <?php
                        include("connexion.php");
                        $sql3="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='4'AND seance.id_heure='3' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result3=mysqli_query($link,$sql3);
                        while($data3=mysqli_fetch_assoc($result3))
                        {
                          echo"<td>".$data3['lib_filiere']."<br> ".$data3['nom_E']."<br> ".$data3['nom_salle']."</td>";
                        }
  ?>
  <?php
                        include("connexion.php");
                        $sql4="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='4'AND seance.id_heure='4' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result4=mysqli_query($link,$sql4);
                        while($data4=mysqli_fetch_assoc($result4))
                        {
                          echo"<td>".$data4['lib_filiere']."<br> ".$data4['nom_E']."<br> ".$data4['nom_salle']."</td>";
                        }
  ?>
</tr>
<tr>
  <th scope="row">Vendredi</th>
  <?php
                        include("connexion.php");
                        $sql1="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='5' AND seance.id_heure='1' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result1=mysqli_query($link,$sql1);
                        while($data1=mysqli_fetch_assoc($result1))
                        {
                          echo"<td>".$data1['lib_filiere']."<br> ".$data1['nom_E']."<br> ".$data1['nom_salle']."</td>";
                        }
                          ?>
  <?php
                        include("connexion.php");
                        $sql2="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='2'AND seance.id_heure='2' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result2=mysqli_query($link,$sql2);
                        while($data2=mysqli_fetch_assoc($result2))
                        {
                          echo"<td>".$data2['lib_filiere']."<br> ".$data2['nom_E']."<br> ".$data2['nom_salle']."</td>";
                        }
                          ?>
  <?php
                        include("connexion.php");
                        $sql3="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='2'AND seance.id_heure='3' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result3=mysqli_query($link,$sql3);
                        while($data3=mysqli_fetch_assoc($result3))
                        {
                          echo"<td>".$data3['lib_filiere']."<br> ".$data3['nom_E']."<br> ".$data3['nom_salle']."</td>";
                        }
  ?>
  <?php
                        include("connexion.php");
                        $sql4="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='5'AND seance.id_heure='4' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result4=mysqli_query($link,$sql4);
                        while($data4=mysqli_fetch_assoc($result4))
                        {
                          echo"<td>".$data4['lib_filiere']."<br> ".$data4['nom_E']."<br> ".$data4['nom_salle']."</td>";
                        }
  ?>
</tr><tr>
  <th scope="row">Samedi</th>
  <?php
                        include("connexion.php");
                        $sql1="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='6' AND seance.id_heure='1' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result1=mysqli_query($link,$sql1);
                        while($data1=mysqli_fetch_assoc($result1))
                        {
                          echo"<td>".$data1['lib_filiere']."<br> ".$data1['nom_E']."<br> ".$data1['nom_salle']."</td>";
                        }
                          ?>
  <?php
                        include("connexion.php");
                        $sql2="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='6'AND seance.id_heure='2' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result2=mysqli_query($link,$sql2);
                        while($data2=mysqli_fetch_assoc($result2))
                        {
                          echo"<td>".$data2['lib_filiere']."<br> ".$data2['nom_E']."<br> ".$data2['nom_salle']."</td>";
                        }
                          ?>
  <?php
                        include("connexion.php");
                        $sql3="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='6'AND seance.id_heure='3' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result3=mysqli_query($link,$sql3);
                        while($data3=mysqli_fetch_assoc($result3))
                        {
                          echo"<td>".$data3['lib_filiere']."<br> ".$data3['nom_E']."<br> ".$data3['nom_salle']."</td>";
                        }
  ?>
  <?php
                        include("connexion.php");
                        $sql4="SELECT * FROM seance,filiere,enseignant,salle,semestre WHERE seance.id_filiere=filiere.id_filiere AND seance.id_salle=salle.id_salle AND enseignant.id_enseignant=seance.id_enseignant AND semestre.id_semestre=seance.id_semestre  AND seance.id_jour='6'AND seance.id_heure='4' AND filiere.id_filiere='$filiere'AND semestre.id_semestre='$semestre'";
                        $result4=mysqli_query($link,$sql4);
                        while($data4=mysqli_fetch_assoc($result4))
                        {
                          echo"<td>".$data4['lib_filiere']."<br> ".$data4['nom_E']."<br> ".$data4['nom_salle']."</td>";
                        }
  ?>
  
</tr>

</tbody>

</table>






<?php }?>



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









