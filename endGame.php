<?php

session_start();
session_destroy();

$num_groups = $_SESSION['num_groups'];
$newURL = 'index.php?num_groups=' . $num_groups ;

header("location: $newURL");

?>
