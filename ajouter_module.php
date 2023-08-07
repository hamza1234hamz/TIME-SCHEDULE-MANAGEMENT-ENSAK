<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="ajouter_module.css">
  <title>Document</title>
</head>
<body>
  <img id="login" src="photo/AA.png" alt="login" width="80%">
    <div class="container">
      <h2>AJOUTER MODULE</h2>
      <form  action="traitement_module.php" method="POST">
        
      <div class="mb-3">
      <label>module</label>
        <input type="text"  class="form-control"name="nom_module"  />
       
        
    </div>
    <label>NOM DE PROF</label>
    <div class="mb-3">
        
       
        <select class="form-control" name="prof">
	<?php
    include("connexion.php");
    session_start();
    $sql1="SELECT * FROM `enseignant` ";
	$res1= mysqli_query($link, $sql1);
	while($data1=mysqli_fetch_assoc($res1)){
    $id=$data1['id_enseignant'];
    $nom=$data1['nom_E'];
    $prenom=$data1['prenom_E'];
	echo "<option value=".$id.">$nom $prenom</option>";
	}
    ?>
</select>
        </div>
       


<label>filiere</label>
<div class="mb-3">


        <select class="form-control"> name="lib_filiere">
      <?php
        include("connexion.php");
        $request="SELECT `id_filiere`, `lib_filiere` FROM `filiere` ";
        $res=mysqli_query($link,$request);
        while($data=mysqli_fetch_assoc($res)){
          $m=$data['id_filiere'];
          $pp=$data['lib_filiere'];
          echo "<option value=".$m.">$pp</option>";
        }
        mysqli_close($link)
      ?> 
     </select>
    </div>   

    
    <label>semestre</label>
<div class="mb-3">


        <select id="ville" class="form-control"name="lib_semestre">
      <?php
        include("connexion.php");
        $request="SELECT `id_semestre`, `lib_semestre` FROM `semestre` ";
        $res=mysqli_query($link,$request);
        while($data=mysqli_fetch_assoc($res)){
          $m=$data['id_semestre'];
          $pp=$data['lib_semestre'];
          echo "<option value=".$m.">$pp</option>";
        }
        mysqli_close($link)
      ?> 
     </select>
    </div>
        
        <button class="btn" name="sub">AJOUTER</button>
      </form>
    </div>
    <script src="login.js"></script>
</body>
</html>