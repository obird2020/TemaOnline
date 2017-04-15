<?php
	include_once ('conn.php');
	
    //check if category already exists in database
	$exists = false;
	$select = "SELECT * FROM institutions WHERE name = '" . $_POST['name'] . "'";
	$execute = mysql_query($select) or die(mysql_error());

	if ($rows = mysql_num_rows($execute) > 0)
	{
		$exists = true;
	}
	
	
	$mail = false;
	$selec = "SELECT * FROM institutions WHERE email = '" . $_POST['email'] . "'";
	$execut = mysql_query($selec) or die(mysql_error());

	if ($rows = mysql_num_rows($execut) > 0)
	{
		$mail = true;
	}
	
	function alpha_numeric($str)
	{
		return ( ! preg_match("/^([-a-z0-9])+$/i", $str)) ? FALSE : TRUE;
	}

	function valid_email($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}
	
	function insin($mail)
	{
		$isin = true;
		$selec = "SELECT * FROM institutions WHERE email = '" . $mail . "'";
		$execut = mysql_query($selec) or die(mysql_error());
		$rows = mysql_num_rows($execut);
		if ($rows == 0) { $isin = false; }
			return $isin;
	}
	
	function log_in($mail, $pass)
	{
		$go = true;
		$sql = "select * from institutions where email= '$mail' and password = '" . md5($pass) ."'";
		$query = mysql_query($sql) or die(mysql_error());
		$rows = mysql_num_rows($query);
		if ($rows == 0)
		{
			$go = false;
		}
		return $go;
	}

?>