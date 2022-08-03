<?php

App\Table\Users::deleteUsers($_GET['id']);
header('Location: Route.php?p=list_users');
