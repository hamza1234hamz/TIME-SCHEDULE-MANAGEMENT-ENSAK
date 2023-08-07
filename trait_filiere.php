<?php
session_start();
if(isset($_POST['sub'])){
    include('connexion.php');
    $filiere=$_POST['filiere'];
    $charge=$_POST['chrege'];
    $sql="INSERT INTO `filiere` (`id_filiere`, `lib_filiere`, `charge_horaire`) VALUES (NULL, '$filiere', '$charge')";
    $res=mysqli_query($link,$sql);
    if($res==true){
        header('location:dashbord.php');
    }
}
?>