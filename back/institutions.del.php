<?php include_once ('scripts/auth.php'); ?>
<?php
	ob_start();
    include_once ('../scripts/conn.php');
   	$sql = 'delete from institutions where id='.$_REQUEST['id'];
	$query = mysql_query($sql) or die(mysql_error());
	header('Location: institution.list.php?pag=' . $_REQUEST['pag']);
	ob_end_flush();
?>