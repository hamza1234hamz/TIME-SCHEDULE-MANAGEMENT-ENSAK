<?php

if(isset($_POST['sub'])) {
  
  include('connexion.php');

  
  $nom_module = $_POST['nom_module'];
  $lib_filiere = $_POST['lib_filiere'];
  $lib_semestre = $_POST['lib_semestre'];
   $reqyest22="SELECT id_module FROM module WHERE lib_module = '$nom_module'";
   
 
  
  $prof = $_POST['prof'];
  $query = "INSERT INTO `module`(`id_enseignant`, `lib_module`) VALUES ('$prof', '$nom_module')";

  
  $result = mysqli_query($link, $query);
  
  
  $result22=mysqli_query($link, $reqyest22);
  if($result22){
     $id = mysqli_fetch_assoc($result22);
     $id = $id['id_module'];
     $query2 = "INSERT INTO `fil_sem_mod`(`id_filiere`, `id_semestre`, `id_module`) VALUES ('$lib_filiere', '$lib_semestre', '$id')";
     $result2 = mysqli_query($link, $query2);
   
  }
  
  
  if($result) {
    header("location: admin.php");
  } else {
  
    echo "Error: " . mysqli_error($link);
  }

 
  mysqli_close($link);
}
?>