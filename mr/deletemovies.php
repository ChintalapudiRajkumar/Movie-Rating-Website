<?php
$movid = intval($_GET['q']);
$con = mysqli_connect("localhost","bluemagic_admin","heng#hao@haha!" , "bluemagic_movierating");
$sql="DELETE FROM Movies WHERE M_ID = '$movid'";
$result = mysqli_query($con,$sql);
?>
