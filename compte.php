<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="compte.css">
  <title>Document</title>
</head>
<body>
<img id="modifier" src="images/modifier.svg" alt="login" width="75%">
    <div class="container">
      <h3>MODIFIER VOTRE COMPTE</h3>
      <form action="traitement_compte.php" method="POST" enctype="multipart/form-data">
        <div class="form-control">
          <input type="password" required name="pass"/>
          <label>Nouveau mot de pass:</label>
        </div>
        <div class="form-control">
          <input type="file" name="fichier"/>
          <label>Photo:</label>
        </div>
        <button class="btn" name="submit">CONFIRMER</button>
      </form>
    </div>
    <script src="login.js"></script>

  
</body>
</html>