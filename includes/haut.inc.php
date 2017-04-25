<?php 
require('/template/Smarty.class.php');
$co = new Smarty();
$co->assign("connecte",$connecte);
$co->display('template/haut.tpl');
?>
