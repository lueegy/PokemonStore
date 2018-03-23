<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <!-- Google Materials Icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Google Materials Icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
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
            <a class="nav-link" href="signup.html" style="margin-left: 79.7%;"><i class="material-icons">person_add</i> Registrati</a>
          </li>
          <!-- Accedi -->
          <li class="nav-item">
            <a class="nav-link" href="login.html"><i class="material-icons">account_circle</i> Accedi</a>
          </li>
          <!-- Cerca -->
          <form class="form-inline" action = "Catalogo.php" method="post">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="material-icons">search</i></span>
              </div>
              <input type="text" class="form-control" placeholder="Search" aria-label="Username" name="searchbox" aria-describedby="basic-addon1">
            </div>
          </form>
        </ul>
      </div>
    </nav>
    <!-- Tabella -->
    <table class = 'table table-bordered table-striped  table-dark'>
      <tr class = 'bg-info'>
        <th>#</th>
        <th>id</th>
        <th>identifier</th>
        <th>species id</th>
        <th>height</th>
        <th>weight</th>
        <th>base experience</th>
        <th>order</th>
        <th>is default</th>
      </tr>
      <?php
        require_once 'classCatalogo.php';
        $funCatalogo = new catalogoController();

        if (isset($_POST['searchbox'])) {
          $sth = $funCatalogo->Catalogo($_POST['searchbox']);
        }
        else {
          if (isset($_GET['search'])) {
            $sr = $_GET['search'];
            if ($sr == "") {
              $sr = '#';
            }
            $sth = $funCatalogo->Catalogo($sr);
          }
          else  {
            $sth = $funCatalogo->Catalogo('#');
          }
        }

        while($result = $sth->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>";
          echo "<td><img src='sprites/" . $result['id'] . ".png'" . "</td>";
          echo "<td>" . $result['id'] . "</td>";
          echo "<td>" . $result['identifier'] .  "</td>";
          echo "<td>" . $result['species_id'] .  "</td>";
          echo "<td>" . $result['height'] .  "</td>";
          echo "<td>" . $result['weight'] .  "</td>";
          echo "<td>" . $result['base_experience'] .  "</td>";
          echo "<td>" . $result['order_'] .  "</td>";
          echo "<td>" . $result['is_default'] .  "</td>";
          echo "</tr>";
        }
        echo "</table>";

        $funCatalogo->Impaginazione();

      ?>
  </body>
</html>
