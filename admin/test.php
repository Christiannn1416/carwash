<?php
require_once('../sistema.class.php');
$app = new Sistema;
$roles = $app->getRol('Christian');
print_r($roles);
$privilegios = $app->getPrivilegio('Christian');
print_r($privilegios);
?>