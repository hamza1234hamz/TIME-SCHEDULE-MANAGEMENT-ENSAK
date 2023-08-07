<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="ajouter_rattrapage.css" />
    <title>Form Input Wave</title>
  </head>
  <body>
    <img id="login" src="photo/Schedule-rafiki.png" alt="login" width="80%">
    <div class="container">
      <h1>Ajouter rattrapage</h1>
      <form action="traitement_rattrapage.php" method="POST">
       
        

        <label>Semestre:</label>
    <div class="form-control">
        <select id="ville" name="nom_salle">
      <?php
      session_start();
        include("connexion.php");
        $request="SELECT * FROM module,enseignant,fil_sem_mod,semestre WHERE module.id_module=fil_sem_mod.id_module AND semestre.id_semestre=fil_sem_mod.id_semestre AND module.id_enseignant=enseignant.id_enseignant AND enseignant.id_user='".$_SESSION['id_user1']."';";
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

    <label>Nom_salle:</label>
    <div class="form-control">
        <select id="ville" name="nom_salle">
      <?php
        include("connexion.php");
        $request="SELECT `id_salle`, `nom_salle` FROM `salle` ";
        $res=mysqli_query($link,$request);
        while($data=mysqli_fetch_assoc($res)){
          $m=$data['id_salle'];
          $pp=$data['nom_salle'];
          echo "<option value=".$m.">$pp</option>";
        }
        mysqli_close($link)
      ?> 
     </select>
    </div>
        <label>Module</label>
        <div class="form-control">
        <select id="ville" name="lib_module">
      <?php
        include("connexion.php");
        $request="SELECT * FROM module,enseignant WHERE module.id_enseignant=enseignant.id_enseignant AND enseignant.id_user='".$_SESSION['id_user1']."';";
        $res=mysqli_query($link,$request);
        while($data=mysqli_fetch_assoc($res)){
          $m=$data['id_module'];
          $pp=$data['lib_module'];
          echo "<option value=".$m.">$pp</option>";
        }
        mysqli_close($link)
      ?> 
     </select>
    </div>
    <label>Filière:</label>
    <div class="form-control">
        <select id="ville" name="lib_filiere">
      <?php
        include("connexion.php");
        $request="SELECT * FROM module,filiere,enseignant,fil_sem_mod,semestre WHERE module.id_module=fil_sem_mod.id_module AND filiere.id_filiere=fil_sem_mod.id_filiere AND semestre.id_semestre=fil_sem_mod.id_semestre AND module.id_enseignant=enseignant.id_enseignant AND enseignant.id_user='".$_SESSION['id_user1']."'";
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
    <label>Jour:</label>
    <div class="form-control">
        <select id="ville" name="jour">
      <?php
        include("connexion.php");
        $request="SELECT `id_jour`, `jour` FROM `jour` ";
        $res=mysqli_query($link,$request);
        while($data=mysqli_fetch_assoc($res)){
          $m=$data['id_jour'];
          $pp=$data['jour'];
          echo "<option value=".$m.">$pp</option>";
        }
        mysqli_close($link)
      ?> 
     </select>
    </div>
    <label>Heure:</label>
    <div class="form-control">
        <select id="ville" name="heure">
      <?php
        include("connexion.php");
        $request="SELECT `id_heure`, `heure` FROM `heure` ";
        $res=mysqli_query($link,$request);
        while($data=mysqli_fetch_assoc($res)){
          $m=$data['id_heure'];
          $pp=$data['heure'];
          echo "<option value=".$m.">$pp</option>";
        }
        mysqli_close($link)
      ?> 
     </select>
    </div>
    <button class="btn" name="sub">Ajouter</button>
  
      </form>
    </div>
    <script src="login.js"></script>
  </body>
</html>