<?php
    require_once 'dbHelper.php';
    class welcomeSignUpController extends dbController {

      public function WelcomeSignUp()
      {
        echo "<p>Nome: " . $_POST["nome"] . "</p>";
        echo "<p>Cognome: " . $_POST["cognome"] . "</p>";
        echo "<p>Email: " . $_POST["email"] . "</p>";
        echo "<p>Password: " . $_POST["password"] . "</p><hr>";

        $this->POST("nome", "cognome", "email", "password");
      }
    }
?>
