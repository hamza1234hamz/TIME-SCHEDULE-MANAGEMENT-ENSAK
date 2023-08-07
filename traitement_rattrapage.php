<?php
session_start();

if(isset($_POST['sub'])) {
  
  include('connexion.php');

 
  $enseignant = $_SESSION['id_user1'];
  
  $nom_salle = $_POST['nom_salle'];
  $lib_module = $_POST['lib_module'];
  $lib_filiere = $_POST['lib_filiere'];
  $jour = $_POST['jour'];
  $heure = $_POST['heure'];
  $lib_semestre = $_POST['nom_salle'];
  
  $query = "INSERT INTO `rattrapage`(`id_user`, `id_filiere`, `id_module`, `id_heure`, `id_jour`, `id_semestre`, `id_salle`) VALUES ('$enseignant', '$lib_filiere', '$lib_module', '$heure', '$jour', '$lib_semestre', '$nom_salle')";

  
  $result = mysqli_query($link, $query);

  
  if($result) {
    
    header("location: enseignant.php");
  } else {
  
    echo "Error: " . mysqli_error($link);
  }

 
  mysqli_close($link);
}
?>