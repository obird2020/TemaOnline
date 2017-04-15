<?php
ob_start();
session_start();
if ((isset($_SESSION['use_mail']) && $_SESSION['use_mail'] != "") || 
(isset($_SESSION['use_pass']) && $_SESSION['use_pass'] != "")) {
//Do Nothing!
} else {
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=/?redirect=$redirect");
ob_end_flush();
}
?>