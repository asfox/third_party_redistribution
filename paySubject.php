<?php 
session_start();
session_destroy();

session_start();
$subject_id = $_SESSION['subject_id'];
$game_id= $_SESSION['game_id'];
$player_id= $_SESSION['player_id'];
$p1_pass = $_SESSION['p1_pass'];
$p3_pass = $_SESSION['p3_pass'];

if (isset($_GET['num_groups'])) {
    $num_groups= $_GET['num_groups'] + 0;
} else {
    $num_groups=3;
}

$p1_startAmt = 100;
$p3_startAmt = 50;
$p1_exchangeRate = 1;
$p3_exchangeRate = 2;
$_SESSION['num_groups'] = $num_groups;
$_SESSION['p1_startAmt'] = $p1_startAmt;
$_SESSION['p3_startAmt'] = $p3_startAmt;
$_SESSION['p1_exchangeRate'] = $p1_exchangeRate;
$_SESSION['p3_exchangeRate'] = $p3_exchangeRate;
?>
<html>
<head><title>wait test</title>

<script type = "text/javascript" src="prototype.js"> </script>

<script type = "text/javascript">
<!--
function assignSubj( myForm, subjNum, game_id, player_id , numGroups) {
	if(!numGroups) { 
        <?php echo('numGroups=' . $num_groups . ' + 0;' ); ?> 
    } else { numGroups = numGroups.value; }

    subjNum = subjNum.value;

    fullSubjNum = subjNum;
    sectionNum = Math.floor(subjNum/1000);
    subjNum = subjNum - (sectionNum*1000);

    playerType = 1 + (Math.floor((subjNum-1)/numGroups));

    gameNum = 1;
    totalAmt_com = 0;
    totalAmt_dic = 0;
    totalAmt_ap = 0;
    totalAmt = 0;

    while( gameNum <= 3 ) {
        if( gameNum == 1 ) {
            assignedGame = 1 + ((subjNum-1)%numGroups);
            playerNum = playerType;
        } else if( gameNum == 2 ) {
            if(playerType == 1) {
                playerNum = 3;
                assignedGame = 1 + ((subjNum+1)%numGroups);
            } else if( playerType == 2 ) {
                playerNum = 1;
                assignedGame = 1 + ((subjNum-1)%numGroups);
            } else {
                playerNum = 2;
                assignedGame = 1 + ((subjNum)%numGroups);
            }
        } else {
            if(playerType == 1) {
                playerNum = 2;
                assignedGame = 1 + ((subjNum+1)%numGroups);
            } else if( playerType == 2 ) {
                playerNum = 3;
                assignedGame = 1 + ((subjNum)%numGroups);
            } else {
                playerNum = 1;
                assignedGame = 1 + ((subjNum-1)%numGroups);
            }
        }

        game_id.value = (sectionNum*1000) + (gameNum-1)*numGroups + assignedGame ;
        player_id.value = playerNum;
       //  alert("game_id: " + game_id.value + "\nplayer_id: " + player_id.value + "\ntotal: " + totalAmt);
        computePayment_com( game_id.value, player_id.value);
        computePayment_ap( game_id.value, player_id.value);
        gameNum = gameNum+1;
    }

    gameNum =1;
    while( gameNum <= 2 ) {
        if( gameNum == 1) {
            assignedGame = subjNum;
            playerNum = 1;
        } else {
            playerNum = 2;
            if( subjNum == 1 ) {
                assignedGame = numGroups*3;
            } else {
                assignedGame = subjNum-1;
            }
        }
           
        game_id.value = (sectionNum*1000) + assignedGame ;
        player_id.value = playerNum;
        computePayment_dic(game_id.value, player_id.value);
        gameNum = gameNum+1;
    }

    return false;
}

function addToTotal_com(newAmt) {
    totalAmt_com = totalAmt_com + newAmt;
    msgStr = "This subject earned $" + totalAmt_com/10 + "!";
    document.getElementById('paymentText_com').innerHTML = msgStr;
    totalAmt = totalAmt + newAmt;
    msgStr = "This subject earned $" + totalAmt/10 + "!";
    document.getElementById('paymentText_total').innerHTML = msgStr;
}
function addToTotal_dic(newAmt) {
    totalAmt_dic = totalAmt_dic + newAmt;
    msgStr = "This subject earned $" + totalAmt_dic/10 + "!";
    document.getElementById('paymentText_dic').innerHTML = msgStr;
    totalAmt = totalAmt + newAmt;
    msgStr = "This subject earned $" + totalAmt/10 + "!";
    document.getElementById('paymentText_total').innerHTML = msgStr;
}
function addToTotal_ap(newAmt) {
    totalAmt_ap = totalAmt_ap + newAmt;
    msgStr = "This subject earned $" + totalAmt_ap/10 + "!";
    document.getElementById('paymentText_ap').innerHTML = msgStr;
    totalAmt = totalAmt + newAmt;
    msgStr = "This subject earned $" + totalAmt/10 + "!";
    document.getElementById('paymentText_total').innerHTML = msgStr;
}

function computePayment_com( g_id, p_id ) {
    var url="http://decision.drew.freshforever.net/computePayment.php?game_id=" + g_id + "&player_id=" + p_id ;
    var req = new Ajax.Request(url, 
        {onComplete:function(request){eval(request.responseText)},
        evalScripts:true, asynchronous:true});
}
function computePayment_dic( g_id, p_id ) {
    var url="http://decision.drew.freshforever.net/gdic/computePayment.php?game_id=" + g_id + "&player_id=" + p_id ;
    var req = new Ajax.Request(url, 
        {onComplete:function(request){eval(request.responseText)},
        evalScripts:true, asynchronous:true});
}
function computePayment_ap( g_id, p_id ) {
    var url="http://decision.drew.freshforever.net/gap/computePayment.php?game_id=" + g_id + "&player_id=" + p_id ;
    var req = new Ajax.Request(url, 
        {onComplete:function(request){eval(request.responseText)},
        evalScripts:true, asynchronous:true});
}

//-->
</script>
</head>

<link href="decisionGame.css" rel="stylesheet" type="text/css">
<body>

<center>
<table class="main">
<tr class="highlight"><td align="left"><strong>Decision Making Task</strong></td></tr>
<tr><td valign="top" align="center">
<br>
<FORM name="newSubject" onSubmit="" METHOD=POST action="computePayment.php" >

<input type="hidden" name="game_id" value=""> 
<input type="hidden" name="player_id" value=""> 

<table class="inset" cellpadding="10" bgcolor="#eeeeff" >
<tr><td align="right">Subject ID: </td>
<td><input type="text" name="subject_id" onChange="assignSubj(this, subject_id, game_id, player_id);" size="30" value="" >
<input type="button" value="Compute" onclick="">
</tr>
<tr>
<!---<td colspan="3" align="right"><input type="submit" value="Get Total" name="mySubmit"></td> -->
</tr>
</table>

</form>
Com Game:
<div id="paymentText_com">
&nbsp;
</div>
<br>
DIC Game:
<div id="paymentText_dic">
&nbsp;
</div>
<br>
AP Game:
<div id="paymentText_ap">
&nbsp;
</div>
<br>
Total:
<div id="paymentText_total">
&nbsp;
</div>

</p>
</td>
</tr>
<tr class="highlight">
<td align="right">
<?php 
 echo "<div class='footer'>", $subject_id, "_", $participant_num, "</div>";
 ?>
</td></tr>
</table>
</center>


</body>

</html>








