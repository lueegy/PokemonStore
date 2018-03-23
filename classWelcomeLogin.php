<?php
    require_once 'dbHelper.php';
    class welcomeLoginController extends dbController {

      public function WelcomeLogin($eeemail,$pppassowrd)
      {
        $sth = $this->Query("SELECT * FROM Clienti WHERE Email='" . $eeemail . "' AND Password ='" . $pppassowrd . "'");
        if($sth->rowCount() == 1)
        {
          echo "<div class='container'>";
            echo "<div class='alert alert-success' role='alert'>";
              echo "<h4 class='alert alert-success'>Well done!</h4>";
              echo "<p class='alert alert-success'>Accesso effettuato!</p>";
            echo "</div>";
          echo "</div>";
        }
        else {
          echo "<div class='container'>";
            echo "<div class='alert alert-danger' role='alert'>";
              echo "<h4 class='alert-heading'>Errore!</h4>";
              echo "<p class='mb-0'>Email o password sbagliate</p>";
            echo "</div>";
          echo "</div>";
        }
      }
    }
?>
