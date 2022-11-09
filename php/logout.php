<?php
session_start();
session_destroy();

// setcookie("cerez","",time()-1); --> eğer cookie olsaydı bu şekilde silebilirdik.
header("location:../admin/login.php");
?>