<?php 
session_start();
$subject_id = $_SESSION['subject_id'];
$game_id= $_SESSION['game_id'];
$player_id= $_SESSION['player_id'];

$num_groups = $_SESSION['num_groups'];
$p1_startAmt = $_SESSION['p1_startAmt'];
$p3_startAmt = $_SESSION['p3_startAmt'];
$p1_exchangeRate = $_SESSION['p1_exchangeRate'];
$p3_exchangeRate = $_SESSION['p3_exchangeRate'];
?>
<html>
<head><title>wait test</title>


<script language="JavaScript">
<!--

function init_instructions() {
    curPage = 0;
    numPages = 14;
    <?php if( is_null($game_id) | $game_id < 1 | is_null($player_id) ) {
        echo("history.go(-1);"); 
    } else {
        echo("player_id = " . $player_id . ";\n");
        echo("p1_startAmt= " . $p1_startAmt . ";\n");
        echo("p3_startAmt= " . $p3_startAmt . ";\n");
        echo("p1_exchangeRate= " . $p1_exchangeRate . ";\n");
        echo("p3_exchangeRate= " . $p3_exchangeRate . ";\n");
    }
    ?>


    getNextInstruction();
}
function getLastInstruction( ) {
    if( curPage > 1 ) {
        elementId = "page"+curPage;
        document.getElementById(elementId).style.visibility='hidden';

        curPage = curPage-1;
        elementId = "page"+curPage;
        personalizePage(elementId);

        document.getElementById(elementId).style.visibility='visible';
    } else { history.go(-1) };
    return false;
}

function getNextInstruction( ) {
    if( curPage < numPages ) {
        if( curPage > 0 ) {
            elementId = "page"+curPage;
            document.getElementById(elementId).style.visibility='hidden';
        }
        curPage = curPage+1;
        elementId = "page"+curPage;
        personalizePage(elementId);

        document.getElementById(elementId).style.visibility='visible';
        return false;
        
    } else { return true; }
}

function personalizePage ( elementId ) {
        document.getElementById(elementId).innerHTML= document.getElementById(elementId).innerHTML.replace(/\(You\)/g, "" );
        if( player_id == 1 ) {
            document.getElementById(elementId).innerHTML= document.getElementById(elementId).innerHTML.replace(/Participant\ 1/g, "Participant 1 (You)" );
        } else if( player_id == 2 ) {
            document.getElementById(elementId).innerHTML= document.getElementById(elementId).innerHTML.replace(/Participant\ 2/g, "Participant 2 (You)" );
        } else {
            document.getElementById(elementId).innerHTML= document.getElementById(elementId).innerHTML.replace(/Participant\ 3/g, "Participant 3 (You)" );
        }
        
        document.getElementById(elementId).innerHTML= document.getElementById(elementId).innerHTML.replace(/p1_startAmt/g,  p1_startAmt );
        document.getElementById(elementId).innerHTML= document.getElementById(elementId).innerHTML.replace(/p3_startAmt/g,  p3_startAmt );
        document.getElementById(elementId).innerHTML= document.getElementById(elementId).innerHTML.replace(/p1_exchangeRate/g,  p1_exchangeRate );
        document.getElementById(elementId).innerHTML= document.getElementById(elementId).innerHTML.replace(/p3_exchangeRate/g,  p3_exchangeRate );
}

//-->
</script>

<link href="decisionGame.css" rel="stylesheet" type="text/css">
</head>

<body onload="init_instructions();" >
<center>
<table class="main">
<tr class="highlight"><td align="left"><strong>Decision Making Task</strong>

</td></tr>
<tr><td valign="top" align="left">



<div class="instructionText" id="page8" name="page8" style="visibility:hidden;">
<b>Example Walkthrough: </b><br>
<div id=gameDiagram style="position:absolute; top:60; left:320" align=center> <img src="gameDiagram.gif"> </div>
<div id=p1 style="position:absolute; top:80; left:300" align=center> <br>Participant 1 </div>
<div id=p1_points style="position:absolute; top:45; left:300" align=center> <b>p1_startAmt</b> </div>

<div id=p2 style="position:absolute; top:80; left:550" align=center> <br>Participant 2 </div>
<div id=p2_points style="position:absolute; top:45; left:570" align=center> <b>0</b> </div>

<div id=p3 style="position:absolute; top:175; left:420" align=center> <br>Participant 3 </div>
<div id=p3_points style="position:absolute; top:135; left:425" align=center> <b>p3_startAmt</b> </div>

 <table class="inset" cellpadding=5 cellspacing=1 border=1 style="position:absolute; top:235px; left:40;">
  <tr>
   <td class=smallish>&nbsp;</td> <td class=selected>Start</td> <td class=smallish>Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>After Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>Participant 3 <?php if($player_id == 3) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>In the End</td> <td class=smallish>Money</td>
    </tr><tr class="prettyTable">
     <td class=smallish>Participant 1</td> <td class=selected>100</td> <td class=smallish>-20</td> <td class=smallish>80</td> <td class=smallish>-(30x2)</td> <td class=smallish>20</td> <td class=smallish>$2</td>
      </tr><tr>
       <td class=smallish>Participant 2</td> <td class=selected>0</td> <td class=smallish>20</td> <td class=smallish>20</td> <td class=smallish>(30x2)</td> <td class=smallish>80</td> <td class=smallish>$8</td> 
        </tr><tr class="prettyTable">
         <td class=smallish>Participant 3</td> <td class=selected>50</td> <td class=smallish>&nbsp;</td> <td class=smallish>50</td> <td class=smallish>-30</td> <td class=smallish>20</td> <td class=smallish>$2</td>
         </tr></table>

</div>

<div class="instructionText" id="page9" name="page9" style="visibility:hidden;">
<b>Example Walkthrough: </b> Participant 1 <?php if($player_id == 1) {echo("keep ");} else {echo("keeps ");}?> 80 points and <?php if($player_id == 1) {echo("transfer ");} else {echo("transfers ");}?> 20 points to Participant 2.

<div id=gameDiagram style="position:absolute; top:60; left:320" align=center> <img src="gameDiagram.gif"> </div>
<div id=p1 style="position:absolute; top:80; left:300" align=center> <br>Participant 1 </div>
<div id=p1_points style="position:absolute; top:45; left:300" align=center> <b>100-20</b> </div>

<div id=p2 style="position:absolute; top:80; left:550" align=center> <br>Participant 2 </div>
<div id=p2_points style="position:absolute; top:45; left:570" align=center> <b>0+20</b> </div>

<div id=p3 style="position:absolute; top:175; left:420" align=center> <br>Participant 3 </div>
<div id=p3_points style="position:absolute; top:135; left:425" align=center> <b></b> </div>

 <table class="inset" cellpadding=5 cellspacing=1 border=1 style="position:absolute; top:235px; left:40;">
  <tr>
   <td class=smallish>&nbsp;</td> <td class=smallish>Start</td> <td class=selected>Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>After Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>Participant 3 <?php if($player_id == 3) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>In the End</td> <td class=smallish>Money</td>
    </tr><tr class="prettyTable">
     <td class=smallish>Participant 1</td> <td class=smallish>100</td> <td class=selected>-20</td> <td class=smallish>80</td> <td class=smallish>-(30x2)</td> <td class=smallish>20</td> <td class=smallish>$2</td>
      </tr><tr>
       <td class=smallish>Participant 2</td> <td class=smallish>0</td> <td class=selected>20</td> <td class=smallish>20</td> <td class=smallish>(30x2)</td> <td class=smallish>80</td> <td class=smallish>$8</td> 
        </tr><tr class="prettyTable">
         <td class=smallish>Participant 3</td> <td class=smallish>50</td> <td class=selected>&nbsp;</td> <td class=smallish>50</td> <td class=smallish>-30</td> <td class=smallish>20</td> <td class=smallish>$2</td>
         </tr></table>


</div>

<div class="instructionText" id="page10" name="page10" style="visibility:hidden;">
<b>Example Walkthrough: </b> Participant 1 <?php if($player_id == 1) {echo("keep ");} else {echo("keeps ");}?> 80 points and <?php if($player_id == 1) {echo("transfer ");} else {echo("transfers ");}?> 20 points to Participant 2.


<div id=gameDiagram style="position:absolute; top:60; left:320" align=center> <img src="gameDiagram.gif"> </div>
<div id=p1 style="position:absolute; top:80; left:300" align=center> <br>Participant 1 </div>
<div id=p1_points style="position:absolute; top:45; left:300" align=center> <b>80</b> </div>

<div id=p2 style="position:absolute; top:80; left:550" align=center> <br>Participant 2 </div>
<div id=p2_points style="position:absolute; top:45; left:570" align=center> <b>20</b> </div>

<div id=p3 style="position:absolute; top:175; left:420" align=center> <br>Participant 3 </div>
<div id=p3_points style="position:absolute; top:135; left:425" align=center> <b>50</b> </div>

 <table class="inset" cellpadding=5 cellspacing=1 border=1 style="position:absolute; top:235px; left:40;">
  <tr>
   <td class=smallish>&nbsp;</td> <td class=smallish>Start</td> <td class=smallish>Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=selected>After Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>Participant 3 <?php if($player_id == 3) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>In the End</td> <td class=smallish>Money</td>
    </tr><tr class="prettyTable">
     <td class=smallish>Participant 1</td> <td class=smallish>100</td> <td class=smallish>-20</td> <td class=selected>80</td> <td class=smallish>-(30x2)</td> <td class=smallish>20</td> <td class=smallish>$2</td>
      </tr><tr>
       <td class=smallish>Participant 2</td> <td class=smallish>0</td> <td class=smallish>20</td> <td class=selected>20</td> <td class=smallish>(30x2)</td> <td class=smallish>80</td> <td class=smallish>$8</td> 
        </tr><tr class="prettyTable">
         <td class=smallish>Participant 3</td> <td class=smallish>50</td> <td class=smallish>&nbsp;</td> <td class=selected>50</td> <td class=smallish>-30</td> <td class=smallish>20</td> <td class=smallish>$2</td>
         </tr></table>

</div>

<div class="instructionText" id="page11" name="page11" style="visibility:hidden;">
<b>Example Walkthrough: </b> Participant 3 <?php if($player_id == 3) {echo("keep ");} else {echo("keeps ");}?> 20 points and <?php if($player_id == 3) {echo("use ");} else {echo("uses ");}?> 30 points to transfer points from Participant 1 to Participant 2.


<div id=gameDiagram style="position:absolute; top:60; left:320" align=center> <img src="gameDiagram.gif"> </div>
<div id=p1 style="position:absolute; top:80; left:300" align=center> <br>Participant 1 </div>
<div id=p1_points style="position:absolute; top:45; left:300" align=center> <b>80-(30x2)</b> </div>

<div id=p2 style="position:absolute; top:80; left:550" align=center> <br>Participant 2 </div>
<div id=p2_points style="position:absolute; top:45; left:570" align=center> <b>20+(30x2)</b> </div>

<div id=p3 style="position:absolute; top:175; left:420" align=center> <br>Participant 3 </div>
<div id=p3_points style="position:absolute; top:135; left:425" align=center> <b>50-30</b> </div>

 <table class="inset" cellpadding=5 cellspacing=1 border=1 style="position:absolute; top:235px; left:40;">
  <tr>
   <td class=smallish>&nbsp;</td> <td class=smallish>Start</td> <td class=smallish>Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>After Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=selected>Participant 3 <?php if($player_id == 3) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>In the End</td> <td class=smallish>Money</td>
    </tr><tr class="prettyTable">
     <td class=smallish>Participant 1</td> <td class=smallish>100</td> <td class=smallish>-20</td> <td class=smallish>80</td> <td class=selected>-(30x2)</td> <td class=smallish>20</td> <td class=smallish>$2</td>
      </tr><tr>
       <td class=smallish>Participant 2</td> <td class=smallish>0</td> <td class=smallish>20</td> <td class=smallish>20</td> <td class=selected>(30x2)</td> <td class=smallish>80</td> <td class=smallish>$8</td> 
        </tr><tr class="prettyTable">
         <td class=smallish>Participant 3</td> <td class=smallish>50</td> <td class=smallish>&nbsp;</td> <td class=smallish>50</td> <td class=selected>-30</td> <td class=smallish>20</td> <td class=smallish>$2</td>
         </tr></table>

</div>


<div class="instructionText" id="page12" name="page12" style="visibility:hidden;">
<b>Example Walkthrough: </b> Participant 3 <?php if($player_id == 3) {echo("keep ");} else {echo("keeps ");}?> 20 points and <?php if($player_id == 3) {echo("use ");} else {echo("uses ");}?> 30 points to transfer points from Participant 1 to Participant 2.


<div id=gameDiagram style="position:absolute; top:60; left:320" align=center> <img src="gameDiagram.gif"> </div>
<div id=p1 style="position:absolute; top:80; left:300" align=center> <br>Participant 1 </div>
<div id=p1_points style="position:absolute; top:45; left:300" align=center> <b>20</b> </div>

<div id=p2 style="position:absolute; top:80; left:550" align=center> <br>Participant 2 </div>
<div id=p2_points style="position:absolute; top:45; left:570" align=center> <b>80</b> </div>

<div id=p3 style="position:absolute; top:175; left:420" align=center> <br>Participant 3 </div>
<div id=p3_points style="position:absolute; top:135; left:425" align=center> <b>20</b> </div>

 <table class="inset" cellpadding=5 cellspacing=1 border=1 style="position:absolute; top:235px; left:40;">
  <tr>
   <td class=smallish>&nbsp;</td> <td class=smallish>Start</td> <td class=smallish>Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>After Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>Participant 3 <?php if($player_id == 3) {echo("Move");} else {echo("Moves");} ?></td> <td class=selected>In the End</td> <td class=smallish>Money</td>
    </tr><tr class="prettyTable">
     <td class=smallish>Participant 1</td> <td class=smallish>100</td> <td class=smallish>-20</td> <td class=smallish>80</td> <td class=smallish>-(30x2)</td> <td class=selected>20</td> <td class=smallish>$2</td>
      </tr><tr>
       <td class=smallish>Participant 2</td> <td class=smallish>0</td> <td class=smallish>20</td> <td class=smallish>20</td> <td class=smallish>(30x2)</td> <td class=selected>80</td> <td class=smallish>$8</td> 
        </tr><tr class="prettyTable">
         <td class=smallish>Participant 3</td> <td class=smallish>50</td> <td class=smallish>&nbsp;</td> <td class=smallish>50</td> <td class=smallish>-30</td> <td class=selected>20</td> <td class=smallish>$2</td>
         </tr></table>


</div>


<div class="instructionText" id="page13" name="page13" style="visibility:hidden;">
<b>Example Walkthrough: </b> Participant 1 <?php if($player_id == 1) {echo("get ");} else {echo("gets ");}?> $2, Participant 2 <?php if($player_id == 2) {echo("get ");} else {echo("gets ");}?> $8, and Participant 3 <?php if($player_id == 3) {echo("get ");} else {echo("gets ");}?> $2.


<div id=gameDiagram style="position:absolute; top:60; left:320" align=center> <img src="gameDiagram.gif"> </div>
<div id=p1 style="position:absolute; top:80; left:300" align=center> <br>Participant 1 </div>
<div id=p1_points style="position:absolute; top:45; left:300" align=center> <b>$2</b> </div>

<div id=p2 style="position:absolute; top:80; left:550" align=center> <br>Participant 2 </div>
<div id=p2_points style="position:absolute; top:45; left:570" align=center> <b>$8</b> </div>

<div id=p3 style="position:absolute; top:175; left:420" align=center> <br>Participant 3 </div>
<div id=p3_points style="position:absolute; top:135; left:425" align=center> <b>$2</b> </div>

 <table class="inset" cellpadding=5 cellspacing=1 border=1 style="position:absolute; top:235px; left:40;">
  <tr>
   <td class=smallish>&nbsp;</td> <td class=smallish>Start</td> <td class=smallish>Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>After Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>Participant 3 <?php if($player_id == 3) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>In the End</td> <td class=selected>Money</td>
    </tr><tr class="prettyTable">
     <td class=smallish>Participant 1</td> <td class=smallish>100</td> <td class=smallish>-20</td> <td class=smallish>80</td> <td class=smallish>-(30x2)</td> <td class=smallish>20</td> <td class=selected>$2</td>
      </tr><tr>
       <td class=smallish>Participant 2</td> <td class=smallish>0</td> <td class=smallish>20</td> <td class=smallish>20</td> <td class=smallish>(30x2)</td> <td class=smallish>80</td> <td class=selected>$8</td> 
        </tr><tr class="prettyTable">
         <td class=smallish>Participant 3</td> <td class=smallish>50</td> <td class=smallish>&nbsp;</td> <td class=smallish>50</td> <td class=smallish>-30</td> <td class=smallish>20</td> <td class=selected>$2</td>
         </tr></table>


</div>



<div class="instructionText" id="page1" name="page1" style="visibility:hidden;" >
This task is played between three participants: Participant 1, Participant 2 and Participant 3.  Each participant's identity will remain anonymous.
<br>
<br>Participant 1 will be given p1_startAmt points
<br>Participant 3 will be given p3_startAmt points. 
<br>
<br><i>Please note that all points will be transferred into actual money at the end of the experiment</i>

<br>
<br>
<div id=gameDiagram style="position:absolute; top:230; left:320" align=center> <img src="gameDiagram.gif"> </div>
<div id=p1 style="position:absolute; top:250; left:300" align=center> <br>Participant 1 </div>
<div id=p1_points style="position:absolute; top:215; left:300" align=center> <b>p1_startAmt</b> </div>

<div id=p2 style="position:absolute; top:250; left:550" align=center> <br>Participant 2 </div>
<div id=p2_points style="position:absolute; top:215; left:570" align=center> <b>0</b> </div>

<div id=p3 style="position:absolute; top:345; left:420" align=center> <br>Participant 3 </div>
<div id=p3_points style="position:absolute; top:305; left:425" align=center> <b>p3_startAmt</b> </div>
</div>


<div class="instructionText" id="page2" name="page2" style="visibility:hidden;" >
Participant 1 can decide to use the 100 points in one of the three following ways: 
<ul>1) Keep some amount to him/herself and transfer the remaining portion to Participant 2. 
<br>2) Keep the whole amount for him/herself. 
<br>3) Transfer the whole amount to Participant 2. 
</ul>
After Participant 1 makes his/her decision, Participant 3 and Participant 2 will be informed of the amount transferred from Participant 1 to Participant 2.
<br>
<br>Then Participant 3 can decide to use the 50 points in one of the three following ways: 
<ul>1) Keep some amount for him/herself and spend the remaining amount to transfer money from Participant 1 to Participant 2. 
<br>2) Keep the whole amount for him/herself. 
<br>3) Spend the whole amount to transfer money from Participant 1 to Participant 2. 
</ul>
<br>
</div>


<div class="instructionText" id="page3" name="page3" style="visibility:hidden;">
Therefore, the decisions made by Participant 1 and Participant 3 will determine the amount of money that each participant earns.  Each participant will receive the sum of money in the form of cash or check.
<br>
<br>Each participant will receive $0.10 for each point that he/she has at the end of each game (i.e. 10 points = $1). 
<br>
<br>Each point transferred by Participant 1 will be worth 1 point to Participant 2. 
<br>Each point spent by Participant 3 will transfer 2 points from Participant 1 to Participant 2. 
<br>
</div>


<div class="instructionText" id="page4" name="page4" style="visibility:hidden;">
You may divide the points in whatever way you want when You are Participant 1 or Participant 3, but here are some examples:
<ul><li>Participant 1 decides to keep 100 points and transfers 0 points to Participant 2. We then tell Participant 2 and Participant 3 that Participant 1 transferred 0 points. Participant 3 decides to keep 50 points and use 0 points to transfer points from Participant 1 to Participant 2. In this case, Participant 1 receives $10, Participant 2 receives $0, and Participant 3 receives $5. 
</ul>
<table class="inset" cellpadding=5 cellspacing=1 border=1>
<tr>
<td class=smallish>&nbsp;</td> <td class=smallish>Start</td> <td class=smallish>Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>After Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>Participant 3 <?php if($player_id == 3) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>In the End</td> <td class=smallish>Money</td>
</tr><tr class="prettyTable">
<td class=smallish>Participant 1</td> <td class=smallish>100</td> <td class=smallish>-0</td> <td class=smallish>100</td> <td class=smallish>-(0x2)</td> <td class=smallish>100</td> <td class=smallish>$10</td>
</tr><tr>
<td class=smallish>Participant 2</td> <td class=smallish>0</td> <td class=smallish>0</td> <td class=smallish>0</td> <td class=smallish>(0x2)</td> <td class=smallish>0</td> <td class=smallish>$0</td>
</tr><tr class="prettyTable">
<td class=smallish>Participant 3</td> <td class=smallish>50</td> <td class=smallish>&nbsp;</td> <td class=smallish>50</td> <td class=smallish>-0</td> <td class=smallish>50</td> <td class=smallish>$5</td>
</tr></table>
</div>

<div class="instructionText" id="page5" name="page5" style="visibility:hidden;">
Another Example:
<ul><li>Participant 1 decides to keep 0 points and transfers 100 points to Participant 2. We then tell Participant 2 and Participant 3 that Participant 1 transferred 100 points. Participant 3 decides to keep 50 points and use 0 points to transfer points from Participant 1 to Participant 2. In this case, Participant 1 receives $0, Participant 2 receives $10, and Participant 3 receives $5. 
</ul>
<table class="inset" cellpadding=5 cellspacing=1 border=1>
<tr>
<td class=smallish>&nbsp;</td> <td class=smallish>Start</td> <td class=smallish>Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>After Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>Participant 3 <?php if($player_id == 3) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>In the End</td> <td class=smallish>Money</td>
</tr><tr class="prettyTable">
<td class=smallish>Participant 1</td> <td class=smallish>100</td> <td class=smallish>-100</td> <td class=smallish>0</td> <td class=smallish>-(0x2)</td> <td class=smallish>0</td> <td class=smallish>$0</td>
</tr><tr>
<td class=smallish>Participant 2</td> <td class=smallish>0</td> <td class=smallish>+100</td> <td class=smallish>100</td> <td class=smallish>(0x2)</td> <td class=smallish>100</td> <td class=smallish>$10</td>
</tr><tr class="prettyTable">
<td class=smallish>Participant 3</td> <td class=smallish>50</td> <td class=smallish>&nbsp;</td> <td class=smallish>50</td> <td class=smallish>-0</td> <td class=smallish>50</td> <td class=smallish>$5</td>
</tr></table>
</div>

<div class="instructionText" id="page6" name="page6" style="visibility:hidden;">
Another Example:
<ul><li>Participant 1 decides to keep 100 points and transfers 0 points to Participant 2. We then tell Participant 2 and Participant 3 that Participant 1 transferred 0 points. Participant 3 decides to keep 0 points and use 50 points to transfer 100 points from Participant 1 to Participant 2. In this case, Participant 1 receives $0, Participant 2 receives $10, and Participant 3 receives $0. 
</ul>
<table class="inset" cellpadding=5 cellspacing=1 border=1>
<tr>
<td class=smallish>&nbsp;</td> <td class=smallish>Start</td> <td class=smallish>Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>After Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>Participant 3 <?php if($player_id == 3) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>In the End</td> <td class=smallish>Money</td>
</tr><tr class="prettyTable">
<td class=smallish>Participant 1</td> <td class=smallish>100</td> <td class=smallish>-0</td> <td class=smallish>100</td> <td class=smallish>-(50x2)</td> <td class=smallish>0</td> <td class=smallish>$0</td>
</tr><tr>
<td class=smallish>Participant 2</td> <td class=smallish>0</td> <td class=smallish>0</td> <td class=smallish>0</td> <td class=smallish>(50x2)</td> <td class=smallish>100</td> <td class=smallish>$10</td>
</tr><tr class="prettyTable">
<td class=smallish>Participant 3</td> <td class=smallish>50</td> <td class=smallish>&nbsp;</td> <td class=smallish>50</td> <td class=smallish>-50</td> <td class=smallish>0</td> <td class=smallish>$0</td>
</tr></table>
</div>




<div class="instructionText" id="page7" name="page7" style="visibility:hidden;">
Here is a more complicated example:
<ul>
<li>Participant 1 decides to keep 80 points and transfers 20 points to Participant 2. We then tell Participant 2 and Participant 3 that Participant 1 transferred 20 points. Participant 3 decides to keep 20 points and use 30 points to transfer points from Participant 1 to Participant 2. In this case, Participant 2 receives $8, Participant 1 receives $2, and Participant 3 receives $2. 
<br><br>
Example Table:<br>
<table class="inset" cellpadding=5 cellspacing=1 border=1>
<tr>
<td class=smallish>&nbsp;</td> <td class=smallish>Start</td> <td class=smallish>Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>After Participant 1 <?php if($player_id == 1) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>Participant 3 <?php if($player_id == 3) {echo("Move");} else {echo("Moves");} ?></td> <td class=smallish>In the End</td> <td class=smallish>Money</td>
</tr><tr class="prettyTable">
<td class=smallish>Participant 1</td> <td class=smallish>100</td> <td class=smallish>-20</td> <td class=smallish>80</td> <td class=smallish>-(30x2)</td> <td class=smallish>20</td> <td class=smallish>$2</td>
</tr><tr>
<td class=smallish>Participant 2</td> <td class=smallish>0</td> <td class=smallish>20</td> <td class=smallish>20</td> <td class=smallish>(30x2)</td> <td class=smallish>80</td> <td class=smallish>$8</td>
</tr><tr class="prettyTable">
<td class=smallish>Participant 3</td> <td class=smallish>50</td> <td class=smallish>&nbsp;</td> <td class=smallish>50</td> <td class=smallish>-30</td> <td class=smallish>20</td> <td class=smallish>$2</td>
</tr></table>

</div>

<div class="instructionText" id="page14" name="page14" style="visibility:hidden; text-align:center">
<br><br>
<br><center>Now you will begin the game.
<br><br>Please Click Next To Proceed.
</center>
</div>


<div align="right" class="instructionButton">
<FORM name="transferForm" onsubmit="return getNextInstruction()" action='redirect.php' METHOD=POST  >
<input type="hidden" name="RedirectTo" value="playGame"> 
<input type="submit" value="Next">
</form>
</div>

<div align="left" class="instructionButton" style="width:300px">
<FORM name="transferForm" onsubmit="return getLastInstruction()" action='redirect.php' METHOD=POST  >
<input type="hidden" name="RedirectTo" value="playGame"> 
<input type="submit" value="Previous">
</form>
</div>


</td>
</tr>
<tr class="highlight">
<td align="right">
<?php 
 echo "<div class='footer'>", $subject_id, "_", $game_id, "_", $player_id, "</div>";
 ?>
</td>
</tr>
</table>
</center>


</body>

</html>








