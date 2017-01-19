<?php
session_start();
if(isset($_SESSION['issubmit'])) {
echo "Thank u " .$_SESSION['NAME'] . " " . "for registering with us <br/> ";
echo "We have sent a msg to " .  $_SESSION['EMAIL'] . " " . "for ur conviniance";
session_destroy();
}
else {
	header("Location: index.php");
}
?>
