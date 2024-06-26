<?php
$lg = $_SESSION['lang'];
if (empty($_SESSION['user'])) {
    header('location:Route.php?p=login&lang=fr');
}
if (isset($_POST['save'])) {
    session_start();
    //date_default_timezone_set('Indian/Antananarivo');
    date_default_timezone_set('Europe/Paris');
    $id_prj = $_POST['id_prj'];
    $id_user = $_SESSION['user']['id'];
    $_SESSION['user']['id_prj'] = $id_prj;
    $date = date('Y-m-d');
    $heure_debut = date('H:i:s');
    $_SESSION['user']['heure_debut'] = $heure_debut;
   $rappel = App\Table\Prestation::rappel($id_prj);
   
   foreach($rappel as $r)
    $rpl = $r->tps_rappel;
   
   $heure_fin = date("H:i:s", strtotime("+$rpl minutes"));
    App\Table\Prestation::insert_heur_debut($date,$id_user,$id_prj,$heure_debut,$heure_fin,$rpl); 
    App\Table\Tache::newTask($id_user, $id_prj);
    header('location:Route.php?p=timer&lang='.$lg.'&hd=' . $heure_debut . '&id_prj=' . $id_prj); 
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
                <div class="panel-heading"><?= $lang['choice_prj']   ?>  </div>
                <div class="panel-body">
                    <form  method="POST" id="form"  style="width: 90vh;margin-left: 20%;">
					<div class="form-group">
                            <label><?= $lang['select_prj'] ?></label>    
                            <select class="form-control" name="id_prj" value="" >
                              <?php
                              $list_prj = App\Table\Projet::listProjects();
                              if (!empty($list_prj)): ?>
                                <?php foreach ($list_prj as $prj): ?>
                                <option value="<?= $prj->id_prj ?>"><?= $prj->nom ?></option>
                               <?php endforeach; ?>
                               <?php endif;
                              ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" id="save" value="<?= $lang['btn_submit'] ?>" />
                    </form>
                </div>
            </div>
        </div>
    <div class="row">
</div><!--/.row-->
