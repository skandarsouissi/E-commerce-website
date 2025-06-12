<?php
session_start();
session_unset(); //effacer les variable declarer nom prenom etc
session_destroy();

header('location:index.php')





?>