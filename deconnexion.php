<?php
echo("avant suppression");
setCookie("Uncookie", "", time()-3600);
echo("apres suppresion");
header('Location: index.php');
?>