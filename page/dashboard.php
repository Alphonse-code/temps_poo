<?php
$lg = $_SESSION['lang'];
if (empty($_SESSION['user'])) {
    header('location:Route.php?p=login&lang=fr');
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active"><?= $lang['home_pg'] ?></li>
                </ol>
            </div><!--/.row-->
                 <div class="panel panel-default ">
                <div class="panel-heading text-center">Liste de projet avec la personne qui travail avec</div>
                <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Utilisateur</th>
                        <th scope="col">Projet</th>
                        <th scope="col">date</th>
                        <th scope="col">Début</th>
                        <th scope="col">Fin</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                         $list = App\Table\Prestation::work_people();
                         
                            if (!empty($list)): ?>
                            <?php foreach ($list as $lst): ?> 
                        <tr>
                        <th scope="row">1</th>
                        <td><?= $lst->nom." " ?><?= $lst->prenom ?></td>
                        <td><?= $lst->prj_nom ?></td>
                        <td><?= $lst->daty ?></td>
                        <td><?= $lst->heure_debut ?></td>
                        <td><?= $lst->heure_fin ?></td>
                        </tr>
                        <?php endforeach; ?>
                                  <?php endif;
                                     ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    <div class="row">    
</div><!--/.row-->
