<?php
require_once("DB.php");

session_start();
$subject_id = $_SESSION['subject_id'];
$num_groups = $_SESSION['num_groups'];
$p1_startAmt = $_SESSION['p1_startAmt'];
$p3_startAmt = $_SESSION['p3_startAmt'];
$p1_exchangeRate = $_SESSION['p1_exchangeRate'];
$p3_exchangeRate = $_SESSION['p3_exchangeRate'];

$connect_string = "mysql://XXX";
$db = DB::connect($connect_string);
$db->setFetchMode(DB_FETCHMODE_ASSOC);

$subject_id = $_REQUEST['subject_id'];
$game_id= $_REQUEST['game_id'];
$player_id= $_REQUEST['player_id'];

$query = "SELECT p1_pass FROM datas WHERE subject_id = ? AND p1_pass IS NOT NULL";
$p1_pass = $db->getOne($query, array($game_id));
$query = "SELECT p3_pass FROM datas WHERE subject_id = ? AND p3_pass IS NOT NULL";
$p3_pass = $db->getOne($query, array($game_id));


if (!is_null($p1_pass) & !is_null($p3_pass) ) {
    $p1_gets = $p1_startAmt - $p1_pass - ($p3_pass * $p3_exchangeRate) ;
    $p2_gets = ($p1_pass * $p1_exchangeRate) + ($p3_pass * $p3_exchangeRate);
    $p3_gets = $p3_startAmt - $p3_pass;
} else {
    $p1_gets = 0;
    $p2_gets = 0;
    $p3_gets = 0;
}

if ($player_id == 1) {
    echo( "addToTotal(" . $p1_gets . ");" );
} elseif( $player_id == 2) {
    echo( "addToTotal(" . $p2_gets  . ");" ); 
} else {
    echo( "addToTotal(" . $p3_gets . ");"  );
}

?>
