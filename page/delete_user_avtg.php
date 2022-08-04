<?php
App\Table\Avantage::delete_user_avtg($_GET['id']);
header('Location: Route.php?p=user_avtg');
