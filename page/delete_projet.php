<?php

App\Table\Projet::deleteProject($_GET['id']);
header('Location: Route.php?p=list_projet');
