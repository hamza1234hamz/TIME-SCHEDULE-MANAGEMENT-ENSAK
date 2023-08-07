<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajouter_enseignant.css" />
    <title>Document</title>
</head>
<body>
<body>
    <img id="login" src="images/login.svg" alt="login" width="80%">
    <div class="container">
      <h1>Ajouter filiere</h1>
      <form action="trait_filiere.php" method="POST">
        <div class="form-control">
  
          <input type="text" name="filiere" />
        <label>Filiere</label>



          <div class="form-control">

          <input type="text" name="chrege" />
          <label>Charge horaire</label>
        </div>

    <button class="btn" id="lopl"name="sub">ajouter</button>
      </form>
    </div>
    <script src="login.js"></script>
  </body>
</body>
</html>