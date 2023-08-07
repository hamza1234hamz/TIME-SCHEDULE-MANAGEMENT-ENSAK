<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="ajouter_enseignant.css" />
    <title>Form Input Wave</title>
  </head>
  <body>
    <img id="login" src="images/login.svg" alt="login" width="80%">
    <div class="container">
      <h1>Ajouter enseignant</h1>
      <form action="trait_enseignant.php" method="POST" enctype="multipart/form-data">
        <div class="form-control">
      
          <input type="text" name="nom_E" />
          <label>nom_E</label>
        </div>
        <div class="form-control">
          <input type="text" name="prenom_E" />
          <label>prenom_E</label>
        </div>
        <div class="form-control">
          <input type="text" name="charge_horaire" />
          <label>charge_horaire</label>
        </div>
        <div class="form-control">
          <input type="text" name="login" />
          <label>login</label>
        </div>
        <div class="form-control">
          <input type="text" name="pass" />
          <label>pass</label>
        </div>
        <div class="form-control">
          <input type="file" name="fichier" />
          <label>photo</label>
        </div>
       
    <button class="btn" id="lopl"name="sub">ajouter</button>
      </form>
    </div>
    <script src="login.js"></script>
  </body>
</html>