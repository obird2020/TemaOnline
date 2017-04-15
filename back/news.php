<?php include_once ('scripts/auth.php'); ?>
<?php
	include_once('../scripts/conn.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cp | categories</title>
    
<style type="text/css">
     h2 {
		 color:#900;
	 }
	.but {
		margin-top:10px;
		background-color:#900;
		color:#FFF;
	}
	.ca {
		margin:0;
		padding:0;
		border:1px solid #900;
	}
	.error {
			color:red;
			margin:0;
			padding:0;
	}
	.cp a{
			color:#666;
			margin:0;
			padding:0;
			text-decoration:none;
			font-size:13px;
	}
	.cp a:visited{
			color:#666;
			margin:0;
			padding:0;
			text-decoration:none;
	}
	.cp a:hover{
			text-decoration:underline;
	}
	#categories {
		float:left;
		margin:0;
		padding:0;
		margin-top:50px;
	}
	#page {
		width:800px;
		margin:0 auto;
		padding:0;
		border:1px solid blue;
	}
	.tab {
		border-collapse:collapse;
		border: 1px solid #000000;
		text-align:left;	
	}
	.tab th {
	   background:#EBEBEB;	
	}
	.tab td {
	 	border:1px solid #000000;	
		padding:1px;
	}
	.tab td a{
	 	color:#000;
		text-decoration:none;
	}
	.tab td a:hover{
		text-decoration:underline;
	}
	
</style>
<link rel="stylesheet" type="text/css" href="../styles/cp.css" />
</head>

<body>

<div id="main">
<div id="cp">
  <h2>Add News | <span class="cp"><a href="cp.php">Back To Control Panel </a></span> | <span class="cp"><a href="../scripts/logout.php">Logout</a></span></h2> 
  </div>
<div id="top"></div>
<div id="middle">


<?php
	if (isset($_POST['submit']))
	{
		if ($_POST['title'] == '' || $_POST['body'] == '')
		{		
?>

	 <form action="news.php" method="post" name="newsForm" id="newsForm" enctype="multipart/form-data">
 <table width="384" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center" id="log_res"><blink>**enter all required fields**</blink></td>
  </tr>
   <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="128" height="26" align="right">*Title:</td>
    <td width="7">&nbsp;</td>
    <td><input name="title" type="text" id="title" value="<?php echo $_POST['title']; ?>" size="45" />    </td>
    </tr>
  <tr>
    <td align="right" valign="top">*Body:</td>
    <td>&nbsp;</td>
    <td><label>
      <textarea name="body" id="body" cols="35" rows="13"><?php echo $_POST['body']; ?></textarea>
    </label>      <br /></td>
  </tr>
  <tr>
    <td align="right">Picture<br />
      (if any):</td>
    <td>&nbsp;</td>
    <td><label>
      <input type="file" name="pic" value="" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <td><input class="but" type="submit" name="submit" id="submit" value="  Add  " />
      <input class="but" type="reset" name="reset" id="reset" value="Reset" /></td>
  </tr>
 </table>
 </form>
 
 <?php
		}
		else
		{
			//if everything alright, save into database
			if ($_FILES['pic']['name'] == '')
			{
				$sql = "INSERT INTO news (title, body, dy, mn, yr, dat, imagename) VALUES ('" . addslashes($_POST['title']) ."', '" . addslashes($_POST['body']) ."', '" . date('j') ."', '" . date('n') ."', '" . date('Y') ."', '" . date('Y-m-d') ."', 0)";
				$query = mysql_query($sql) or die(mysql_error());
			}
			else
			{
				//make sure the uploaded file transfer was successful
				if ($_FILES['pic']['error'] != UPLOAD_ERR_OK) 
				{
					switch ($_FILES['pic']['error']) 
					{
						/*case UPLOAD_ERR_INI_SIZE:
							die('The uploaded file exceeds the upload_max_filesize directive in php.ini.');
							break;*/
						case UPLOAD_ERR_FORM_SIZE:
							die('The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.');
							break;
						case UPLOAD_ERR_PARTIAL:
							die('The uploaded file was only partially uploaded.');
							break;
						case UPLOAD_ERR_NO_FILE:
							die('No file was uploaded.');
							break;
						case UPLOAD_ERR_NO_TMP_DIR:
							die('The server is missing a temporary folder.');
							break;
						case UPLOAD_ERR_CANT_WRITE:
							die('The server failed to write the uploaded file to disk.');
							break;
						case UPLOAD_ERR_EXTENSION:
							die('File upload stopped by extension.');
							break;
					}
				}
				
				
				//change this path to match your images directory
				$dir ='news';
				//change this path to match your thumbnail directory
				$thumbdir = $dir . '/thumbs';
				
				list($width, $height, $type, $attr) = getimagesize($_FILES['pic']['tmp_name']);
				
				// make sure the uploaded file is really a supported image
				switch ($type) 
				{
					case IMAGETYPE_GIF:
						$image = imagecreatefromgif($_FILES['pic']['tmp_name']) or die('The file you uploaded was not a supported filetype.');
						$ext = '.gif';
						break;
					case IMAGETYPE_JPEG:
						$image = imagecreatefromjpeg($_FILES['pic']['tmp_name']) or die('The file you uploaded was not a supported filetype.');
						$ext = '.jpg';
						break;
					case IMAGETYPE_PNG:
						$image = imagecreatefrompng($_FILES['pic']['tmp_name']) or die('The file you uploaded was not a supported filetype.');
						$ext = '.png';
						break;
					default:
						die('The file you uploaded was not a supported filetype.');
				}
				
				//insert info into database
				$sql = "INSERT INTO news (title, body, dy, mn, yr, dat) VALUES ('" . addslashes($_POST['title']) ."', '" . addslashes($_POST['body']) ."', '" . date('j') ."', '" . date('n') ."', '" . date('Y') ."', '" . date('Y-m-d') ."')";
				$query = mysql_query($sql) or die(mysql_error());
				
				//retrieve the image_id that MySQL generated automatically when we inserted
				//the new record
				$last_id = mysql_insert_id();
				
				$imagename = $last_id . $ext;
				// update the image table now that the final filename is known.
				$q = 'UPDATE news SET imagename = "' . $imagename . '" WHERE id = ' . $last_id;
				$r = mysql_query($q) or die (mysql_error());
				
				//save the image to its final destination
				switch ($type) 
				{
					case IMAGETYPE_GIF:
						imagegif($image, $dir . '/' . $imagename);
						
						//set the dimensions for the thumbnail
						$thumb_width = $width * 0.30;
						$thumb_height = $height * 0.30;
						//create the thumbnail
						$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
						imagecopyresampled($thumb, $image, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
						imagegif($thumb, $thumbdir . '/' . $last_id . '.gif');
						imagedestroy($thumb);
						break;
						
					case IMAGETYPE_JPEG:
						imagejpeg($image, $dir . '/' . $imagename, 100);
						
						//set the dimensions for the thumbnail
						$thumb_width = $width * 0.30;
						$thumb_height = $height * 0.30;
						//create the thumbnail
						$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
						imagecopyresampled($thumb, $image, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
						imagejpeg($thumb, $thumbdir . '/' . $last_id . '.jpg', 100);
						imagedestroy($thumb);
						break;
						
					case IMAGETYPE_PNG:
						imagepng($image, $dir . '/' . $imagename);
						
						//set the dimensions for the thumbnail
						$thumb_width = $width * 0.30;
						$thumb_height = $height * 0.30;
						//create the thumbnail
						$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
						imagecopyresampled($thumb, $image, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
						imagepng($thumb, $thumbdir . '/' . $last_id . '.png');
						imagedestroy($thumb);
						break;
				}
				imagedestroy($image);
			}
		
			
	?>	
<form action="news.php" method="post" name="newsForm" id="newsForm" enctype="multipart/form-data">
 <table width="384" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center" id="log_res"><blink>**news successfully saved**</blink></td>
  </tr>
   <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="128" height="26" align="right">*Title:</td>
    <td width="7">&nbsp;</td>
    <td><input name="title" type="text" id="title" value="<?php echo $_POST['title']; ?>" size="45" />    </td>
    </tr>
  <tr>
    <td align="right" valign="top">*Body:</td>
    <td>&nbsp;</td>
    <td><label>
      <textarea name="body" id="body" cols="35" rows="13"><?php echo $_POST['body']; ?></textarea>
    </label>      <br /></td>
  </tr>
  <tr>
    <td align="right">Picture<br />
      (if any):</td>
    <td>&nbsp;</td>
    <td><label>
      <input type="file" name="pic" value="" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <td><input class="but" type="submit" name="submit" id="submit" value="  Add  " />
      <input class="but" type="reset" name="reset" id="reset" value="Reset" /></td>
  </tr>
 </table>
 </form>
		
        
     <?php	
		}
					
	}
	else
	{
 ?>
 
 
 <form action="news.php" method="post" name="newsForm" id="newsForm" enctype="multipart/form-data">
 <table width="384" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center" id="log_res">&nbsp;</td>
  </tr>
  </tr>
   <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="128" height="26" align="right">*Title:</td>
    <td width="7">&nbsp;</td>
    <td><input name="title" type="text" id="title" value="" size="45" />    </td>
    </tr>
  <tr>
    <td align="right" valign="top">*Body:</td>
    <td>&nbsp;</td>
    <td><label>
      <textarea name="body" id="body" cols="35" rows="13"></textarea>
    </label>      <br /></td>
  </tr>
  <tr>
    <td align="right">Picture<br />
      (if any):</td>
    <td>&nbsp;</td>
    <td><label>
      <input type="file" name="pic" value="Submit" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <td><input class="but" type="submit" name="submit" id="submit" value="  Add  " />
      <input class="but" type="reset" name="reset" id="reset" value="Reset" /></td>
  </tr>
 </table>
 </form>
<?php
	}
?>
</div>
<div id="bottom"></div>

</div>

</body>
</html>