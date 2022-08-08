<?php
$lg_url = $_SESSION['lang'];
if (isset($_SESSION['user']['nom'])) {
    $users = $_SESSION['user']['nom'];
}
setlocale(LC_ALL, 'fr_FR');
?>
<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEMPS | DASHBOARD</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="shortcut icon" href="images/temps.png" type="image/x-icon">
    <link href="css/styles.css" rel="stylesheet">
    
</head>
<body>
     <?php if (!empty($users)): ?>
        <nav class="navbar navbar-inverse navbar-fixed-top fondo-color" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                   
                    <a class="navbar-brand text text-center" href="#"><span><img src="./images/log.png" alt="ANDINE GROUPE" style="width: 100%;height: 30px;"> </span> </a>
                    <div class="user-menu">
                        <div class="pull-right"> 
                            <select class="fondo-color" name="lang" id="lang" style="border: 0px solid #ccc;">
                                <option value="FR">🇫🇷&emsp;fr</option>
                                <option value="EN">🇺🇸&emsp;en</option>
                                <option value="ES">🇪🇸&emsp;es</option>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="text text-info"><?php echo '' .
                                $_SESSION['user']['nom'] .
                                ' ' .
                                $_SESSION['user']['prenom'] .
                                ''; ?>&nbsp;&nbsp;&nbsp;&nbsp; <a href="Route.php?p=logout" name="logout" class="glyphicon glyphicon-log-out text-info">Déconnecter</a></span>
                        </div>
                         </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar ">
                <ul class="nav menu">
                    <li><img src="images/temps.png" width="250px" height="100px" alt="TEMPS"/> </li>
                    <li><a href="Route.php?p=home&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-home"></span> <?= $lang['s_home_pg'] ?></a></li>
                <?php if (
                    $_SESSION['user']['level'] == 9 ||
                    $_SESSION['user']['level'] == 8
                ) { ?>
                    <li><a href="Route.php?p=u_avantage&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-pencil"></span><?= $lang['s_avtg_pg'] ?></a></li>
                    <li><a href="Route.php?p=user_avtg&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-check"></span><?= $lang['s_avtg_usr_pg'] ?></a></li>
                    <li><a href="Route.php?p=temps_rappel&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-dashboard"></span><?= $lang['s_tmp_rpl'] ?></a></li>
                    <li><a href="Route.php?p=cout_min&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-bookmark"></span><?= $lang['s_cout_pg'] ?></a></li>
                    <li><a href="Route.php?p=list_projet&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-check"></span><?= $lang['s_prj_pg'] ?></a></li>
                    <li><a href="Route.php?p=user_projet&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-tasks"></span><?= $lang['s_tsk_pg'] ?></a></li>
                    <li><a href="Route.php?p=list_users&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-user"></span><?= $lang['s_usr_pg'] ?></a></li>
                    <li><a href="Route.php?p=reporting&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-indent-right"></span><?= $lang['s_stats_pg'] ?></a></li>
                    <?php } ?>
    </div> <!--/.sidebar-->  
        <?php endif; ?>
        <?= $content ?>  
  
  </body>
</html>
