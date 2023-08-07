<?php
session_start();

if(isset($_POST['sub'])) {
  
  include('connexion.php');

  
  $nom_E = $_POST['nom_E'];
  $prenom_E = $_POST['prenom_E'];
  $charge_horaire = $_POST['charge_horaire'];
  $login = $_POST['login'];
  $pass = $_POST['pass'];
  if(isset($_FILES['fichier']) and $_FILES['fichier']['error']==0)
	{
		$dossier= 'photoEnseignant/';
		$temp_name=$_FILES['fichier']['tmp_name'];
		if(!is_uploaded_file($temp_name))
		{
		exit("le fichier est untrouvable");
		}
		if ($_FILES['fichier']['size'] >= 1000000){
			exit("Erreur, le fichier est volumineux");
		}
		$infosfichier = pathinfo($_FILES['fichier']['name']);
		$extension_upload = $infosfichier['extension'];
		
		$extension_upload = strtolower($extension_upload);
		$extensions_autorisees = array('png','jpeg','jpg');
		if (!in_array($extension_upload, $extensions_autorisees))
		{
		exit("Erreur, Veuillez inserer une image svp (extensions autorisées: png)");
		}
		$nom_photo=$nom_E.".".$extension_upload;
		if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
		exit("Problem dans le telechargement de l'image, Ressayez");
		}
		$ph_name=$nom_photo;
	}
	else{
		$ph_name="inconnu.jpg";
	}
  
 
	$query33 = "INSERT INTO `user`(`login`, `pass`, `photo`) VALUES ('$login', '$pass', '$ph_name')";
	$result2 = mysqli_query($link, $query33);
	if($result2){
	  $id_user = mysqli_insert_id($link);
	  $query2 =  "INSERT INTO `enseignant`(`id_user`, `nom_E`, `prenom_E`, `charge_horaire`) VALUES ('$id_user', '$nom_E', '$prenom_E', '$charge_horaire')";
	  $result256 = mysqli_query($link, $query2);
	}
	
	if($result2) {
		header('location: dashbord.php');
	} else {
		echo "Error: " . mysqli_error($link);
	}
	mysqli_close($link);
	
}
?>