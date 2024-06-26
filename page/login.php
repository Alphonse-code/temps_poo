<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

if (isset($_POST['mail']) && isset($_POST['psw'])) {
    $user = new App\Table\Users();
    $result = App\Table\Users::findByEmail($_POST['mail']);

    if (isset($result) && !empty($result)) {
        $user->setEmail($result->getEmail());
        $user->setPsw($result->getPsw());
        if (password_verify($_POST['psw'], $user->getPsw())) {
            $_SESSION['user'] = [
                'id' => $result->getIdUser(),
                'nom' => $result->getNom(),
                'prenom' => $result->getPrenom(),
                'level' => $result->getLevel(),
            ];
            if($_SESSION['user']['level'] == '2'){
                header('location:Route.php?p=home&lang=fr');
            }else{
           header('Location:Route.php?p=dashboard&lang=fr');
            }
        } else {
            $errors = 'Le Mot de passe saisie est incorrect.';
        }
    } else {
        $errors = "L'adresse email saisie n'existe pas.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEMPS | AUTHENTIFICATION</title>
    <link href="../public/css/bootstrap_5.min.css" rel="stylesheet">
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/login.css">
    <link rel="shortcut icon" href="../public/images/temps.png" type="image/x-icon">
</head>

<body>
     <div class="login">
        <div class="security-page">
            <div class="container my-5">
                <div class="row mt-5">
                    <div class="col-lg-4 mx-auto mt-5" id="form-login">
                        <div class="logo">
                            <img src="../public/images/temps.png" alt="LOGO"/>
                        </div>
                            <form method="POST" id="pro-login" class="form-responsive" >
                            <label>E-mail</label>
                                <input type="text" placeholder="Adresse email" name="mail" class="form-control"/><br/>
                            <div>
                                <label>Mot de passe</label>
                                    <input type="password" name="psw" class="form-control" placeholder="Mot de passe"/><br/>      
                            </div>
                             <?php if (!empty($errors)): ?>
                                 <div class="text text-danger">
                                    <?= $errors ?>
                                 </div>
                            <?php endif; ?>
                            <button type="submit" name="login" class="btn mt-2 w-100 btn-connexion " id="log">Se connecter </button>  
                               <!-- <button type="submit" name="login"><?= $lang[
                                   'btn-annul'
                               ] ?></button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
     </div>
</body>
</html>
