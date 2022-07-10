<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'includes/head.php';?>
    <link rel="stylesheet" type="text/css" href="../css/<?=$cssConnection?>">
</head>

<body>
    <?php 
      include 'includes/header.php';
      require_once 'modules/database/databaseManager.php';
      require_once 'modules/database/credentialManager.php';
      
      if (isset($_POST['submitButton'])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $errorMsg = "";

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errorMsg = "Le format de l'adresse mail n'est pas valide.";
        } else {
          $credentialManager = new CredentialManager();
          if($credentialManager->connectUser($email, $password)) {
            
            require_once 'modules/session/sessionManager.php';

            $databaseManager = new DatabaseManager();
            $databaseManager->connect();

            $res = $databaseManager->getUserByEmail($email);
            if ($res->num_rows === 1) {
              $user = $res->fetch_assoc();

              if ($user['is_validated']) {
                $userInfo = array();
                $userInfo['pseudo'] = $user['pseudo'];
                $userInfo['id'] = $user['id'];
                $userInfo['avatar'] = $user['avatar'];
    
                $sessionManager->connectUser($userInfo);

                header('Location: ../');
              } else {
                $errorMsg = "Votre compte n'a pas encore été validé. Vérifiez vos mails.";
              }
            }
          } else {
            $errorMsg = "L'identifiant ou le mot de passe est incorrect.";
          }
        }
      }
    ?>
    <div class="connection-page">
        <h1>Se connecter</h1>
        <form method="POST" action="">
            <div class="connection-box">
                <div class="input-group">
                    <input type="text" name="email" required value="<?=$email?>">
                    <span class="bar"></span>
                    <label>Adresse mail</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <span class="bar"></span>
                    <label>Mot de passe</label>
                </div>
                <button type="submit" name="submitButton">Se connecter</button>
                <?php
            if (!empty($errorMsg)) {
          ?>
                <p class="error-message"><?=$errorMsg?></p>
                <?php
            }
          ?>
            </div>
        </form>
        <p>Vous n'avez pas de compte ? <a href="../inscription">S'inscrire</a></p>
    </div>
</body>

</html>