<?php

App\Table\Notification::delete_rappel($_GET['id']);
header('Location: Route.php?p=temps_rappel');
