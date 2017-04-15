<?php
ob_start();
session_start();
if ((isset($_SESSION['adname']) && $_SESSION['adname'] != "") || 
(isset($_SESSION['adpass']) && $_SESSION['adpass'] != "")) {
//Do Nothing!
} else {
$redirect = $_SERVER['PHP_SELF'];
header("Refresh: 0; URL=../back/?redirect=$redirect");
ob_end_flush();
}
?>