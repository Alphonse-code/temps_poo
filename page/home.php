<?php

if (empty($_SESSION['user'])) {
    header('location:Route.php?p=login');
} ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active">Accueil</li>
                </ol>
            </div><!--/.row-->
                 <div class="panel panel-default ">
                <div class="panel-heading">Choisir ton projet</div>
                <div class="panel-body">
                    <form  method="POST" id="form"  style="width: 90vh;margin-left: 20%;">
					<div class="form-group">
                            <label>Projet</label>    
                            <select class="form-control" name="id_prj" value="" >
                              <?php  $list_prj = App\Table\Projet::listProjects();
                               if (!empty($list_prj)): ?>
                                <?php foreach($list_prj as $prj): ?>
                                <option value="<?= $prj->id_prj; ?>"><?= $prj->nom; ?></option>
                               <?php endforeach; ?>
                               <?php endif; ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" id="save" value="submit">
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
        </div><!--/.row-->