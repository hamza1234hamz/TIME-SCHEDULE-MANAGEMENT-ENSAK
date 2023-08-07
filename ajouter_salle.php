<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="ajouter_salle.css">
  <title>ajouter salle</title>
</head>
<body>
  <img id="login" src="photo/AA.png" alt="login" width="80%">
    <div class="container">
      <h1>AJOUTER SALLE</h1>
      <form form action="trait_salle.php" method="POST">
        <div class="form-control">
          <input type="text"  name="nom_salle"/>
          <label>NOM SALLE</label>
        </div>
        <div class="form-control">
          <input type="text" name="type_salle" />
          <label>TYPE SALLE</label>
        </div>
       
        <div class="form-control">
          <input type="text" name="cap_salle" />
          <label>CAPACITE</label>
        </div>
        <button class="btn">AJOUTER</button>
      </form>
    </div>
    <script src="login.js"></script>
</body>
</html>