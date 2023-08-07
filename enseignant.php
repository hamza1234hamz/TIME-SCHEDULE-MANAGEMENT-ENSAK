<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="enseignant.css">
  <title>admin</title>
</head>

  <body id="body-pd">
    <form enctype="multipart/form-data" method="POST" >
 
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
$user=$_SESSION['id_user1'];
$sql="SELECT * FROM enseignant WHERE id_user='$user'";
$result=mysqli_query($link,$sql);
$data=mysqli_fetch_assoc($result);
echo "".$data['prenom_E']." ";
echo "".$data['nom_E']."  ";
echo "<img  width=40px src=photo/avatar.png>";


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

                    <a href="ajouter_rattrapage.php" class="nav_link">
                      <i class="bx bx-edit"></i> 
                       <span class="nav_name">Ajouter Rattrapage</span> </a> 

                       
            
                        <a href="#" class="nav_link"> 
                          <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                          <span class="nav_name">Stats</span> </a> </div>
            </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
   <style>
    
   </style>
    <div class="gestion">
        <img src="photo/icon.jpeg" width="50px" class="image"><h3>RATTRAPAGE DE SEANCE</h3>
    </div>
    

    
  <section class="intro">
        <div class="mask d-flex align-items-center h-100">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12">
                  <div class="card-body p-0">
                    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
                      <table class="table table-striped mb-0">
                        <thead style="background-color: #002d72;">
                          <tr>
                            
                            <th scope="col">Professeur</th>
                            <th scope="col">Filiere</th>
                            <th scope="col">Module</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Jour</th>
                            <th scope="col">Heure</th>
                            <th scope="col">Salle</th>
                            


                          </div>
                          </tr>

                        </thead>
                        <tbody>
                        <button type="submit" class="btn btn-primary" name="submit">Supprimer rattrapage!!</button><br><br>
                        <?php
                        include("connexion.php");
                        $sql2="SELECT * FROM `rattrapage`,salle,jour,filiere,user,heure,semestre,module,enseignant WHERE rattrapage.id_salle=salle.id_salle and rattrapage.id_filiere=filiere.id_filiere AND rattrapage.id_module=module.id_module AND rattrapage.id_heure=heure.id_heure AND rattrapage.id_jour=jour.id_jour AND rattrapage.id_semestre=semestre.id_semestre AND rattrapage.id_user=user.id_user and enseignant.id_user='".$_SESSION['id_user1']."'";
                        $result2=mysqli_query($link,$sql2);
                        while($data2=mysqli_fetch_assoc($result2)){
                          echo"<tr>";
                  

                          echo"<td>".$data['nom_E']." ".$data['prenom_E']."</td>";
                          echo"<td>".$data2['lib_filiere']."</td>";
                          echo"<td>".$data2['lib_module']."</td>";
                          echo"<td>".$data2['lib_semestre']."</td>";
                          echo"<td>".$data2['jour']."</td>";
                          echo"<td>".$data2['heure']."</td>";
                          echo"<td>".$data2['nom_salle']."</td>";           
                          
                          echo"</tr>";
                          
        
    }
 
    ?>


         
                        
                        </tbody>
                      </table>
                    </div>
                  </div>         
            </div>
          </div>
        </div>
      </div>
    </section>





</form>




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