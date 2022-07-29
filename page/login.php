<?php
    if (isset($_POST['mail']) && isset($_POST['psw'])) {
        $user = new App\Classe\Users();
        $result = App\Classe\Users::findByEmail($_POST['mail']);
        if (isset($result)) {
            $user->setEmail($result->mail);
            $user->setPassword($result->psw);
            if (MD5($_POST['psw'])== $user->getPassword()) {
                $_SESSION['user'] = [
                    'id' => $result->id_user,
                    'nom' => $user->getNom()
                ];
                header("location:Index.php?p=home");
            } else {
                $errors = "Nom d'utilisateur ou mot de passe incorrect.";
            }
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
                                <input type="text" placeholder="Adresse email" value="<?php echo $_POST[
                                    'mail'
                                ]; ?>" name="mail" class="form-control"/><br/>
                            <div>
                                <label>Mot de passe</label>
                                    <input type="password" name="psw" value="<?php echo $_POST[
                                        'psw'
                                    ]; ?>" class="form-control" placeholder="Mot de passe"/><br/>      
                            </div>
                            <button type="submit" name="login" class="btn mt-2 w-100 btn-connexion " id="log">Se connecter </button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
     </div>
</body>
</html>
