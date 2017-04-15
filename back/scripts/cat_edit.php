<?php
	include_once ('../../scripts/conn.php');
	
	//check if category already exists in database
	$exists = false;
	$select = "SELECT * FROM categories WHERE category = '" . $_POST['category'] . "'";
	$execute = mysql_query($select) or die(mysql_error());
	if ($rows = mysql_num_rows($execute) > 0)
	{
		$exists = true;
	}
	
	if ($_POST['category']=='')
	{
		$errors[] = '**enter category**';
	}
	else if ($exists == true)
	{
		$errors[] = '**' .$_POST['category'] .' already exists**';
	}

	if(is_array($errors))
	{
		while (list($key,$value) = each($errors))
		{
			
			echo '<blink><span class="error">'.$value.'</span></blink><br /><br />';
		}
	}
	else {
		//insert value into database
		$sql = "UPDATE categories SET category =  '" . stripslashes(addslashes($_POST['category'])) . "' WHERE id = '" . $_REQUEST['id'] . "'";
		$query = mysql_query($sql) or die(mysql_error());
		echo '<blink>**category successfully updated!**</blink><br /><br />';
	}
?>