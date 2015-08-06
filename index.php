<?php 
session_start();
session_destroy();

session_start();
if (isset($_GET['num_groups'])) {
    $num_groups= $_GET['num_groups'] + 0;
} else {
    $num_groups=3;
}
?>
                
                
                
                
<html>
<head><title>wait test</title>

<script type = "text/javascript">
<!--
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

Welcome to the Decision Making Task website!
<br>
<?php echo('<a href="startGame.php?num_groups=' . $num_groups . '">Click here to continue...</a>' ); 
?> 


</td>
</tr>
<tr class="highlight">
<td align="right">
 <div class='footer'>  &nbsp; Thanks!</div>
</td></tr>
</table>
</center>


</body>

</html>








