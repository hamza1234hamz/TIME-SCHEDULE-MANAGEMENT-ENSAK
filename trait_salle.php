<?php
include('connexion.php');
$nom_salle=$_POST['nom_salle'];
$type_salle=$_POST['type_salle'];
$capcit=$_POST['cap_salle'];
$sql="INSERT INTO `salle`(`id_salle`, `nom_salle`, `type`, `capacite`) VALUES (NULL,'$nom_salle','$type_salle','$capcit')";
$resultat=mysqli_query($link,$sql);
if($resultat==true){
    header('location:dashbord.php');
}
else{
header("location:error.php");
}
?>