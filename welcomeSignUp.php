<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- CSS -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <!-- Google Materials Icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body style="background:url('Immagini/deoxys.jpg');background-position: center;background-attachment: fixed;">
    <!-- Barra di navigazione -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark font-weight-light">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <!-- Home -->
          <li class="nav-item">
            <a class="nav-link" href="index.html"><i class="material-icons">home</i> Home</a>
          </li>
          <!-- Catalogo -->
          <li class="nav-item">
            <a class="nav-link" href="Catalogo.php"><i class="material-icons">view_list</i> Catalogo</a>
          </li>
          <!-- PokemonStore -->
          <li class="nav-item">
            <a class="navbar-brand" href="index.html" style="margin-left: 82.5%;"><strong>PokemonStore</strong></a>
          </li>
          <!-- Registrati -->
          <li class="nav-item">
            <a class="nav-link" href="signup.html" style="margin-left: 86.2%;"><i class="material-icons">person_add</i> Registrati</a>
          </li>
          <!-- Accedi -->
          <li class="nav-item">
            <a class="nav-link" href="login.html"><i class="material-icons">account_circle</i> Accedi</a>
          </li>
        </ul>
      </div>
    </nav>
    <br>
    <div class="container">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <?php
        require_once 'classWelcomeSignUp.php';
        $funCatalogo = new welcomeSignUpController();
        $funCatalogo->WelcomeSignUp();
        ?>
        <p class="mb-0">Account registato, Complimenti!!</p>
      </div>
    </div>
  </body>
</html>
