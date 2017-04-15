<?php include_once ('auth.php'); ?>
<?php
	include_once ('../../scripts/conn.php');
	
	//make sure the uploaded file transfer was successful
	/*if ($_FILES['pic']['error'] != UPLOAD_ERR_OK) 
	{
		switch ($_FILES['pic']['error']) 
		{
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
	}*/
	
	
	 /*?>if ($_POST['title']=='')
	{
		$errors[] = '**enter news title**';
	}
	else if ($_POST['body']=='')
	{
		$errors[] = '**enter news body**';
	}
	else if ($_FILES['pic']['error'] != UPLOAD_ERR_OK)
	{
		switch ($_FILES['pic']['error']) 
		{
			case UPLOAD_ERR_FORM_SIZE:
				$errors[] = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
				break;
			case UPLOAD_ERR_PARTIAL:
				$errors[] = 'The uploaded file was only partially uploaded.';
				break;
			case UPLOAD_ERR_NO_FILE:
				$errors[] = 'No file was uploaded.';
				break;
			case UPLOAD_ERR_NO_TMP_DIR:
				$errors[] = 'The server is missing a temporary folder.';
				break;
			case UPLOAD_ERR_EXTENSION:
				$errors[] = 'File upload stopped by extension.';
				break;
		}	
	}
	

	if(is_array($errors))
	{
		while (list($key,$value) = each($errors))
		{
			
			echo '<blink><span class="error">'.$value.'</span></blink><br /><br />';
		}
	}
	else 
	{
		//save into database and image into folder
		
		//change this path to match your images directory
		$dir ='../news';
		//change this path to match your thumbnail directory
		$thumbdir = $dir . '/thumbs';
		
		//get other news information
		$title = $_POST['title'];
		$body = $_POST['body'];
		$date = date('Y-m-d');
		$day = date('j');
		$month = date('n');
		$year = date('Y');
		
	   
		
		list($width, $height, $type, $attr) = getimagesize($_FILES['pic']['tmp_name']);
		// make sure the uploaded file is really a supported image
		 /*switch ($type) 
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
		} */
	
		//insert news into database
		/*$query = 'INSERT INTO news (title, body, dy, mn, yr, dat) VALUES ("' . stripslashes(addslashes($title)) . '", "' . stripslashes(addslashes($body)) . '", "' . $day . '", "' . $month . '", "' . $year . '", "' . $date . '")';
		$result = mysql_query($query) or die (mysql_error());
		$last_id = mysql_insert_id();
		$imagename = $last_id . $ext;
	
		// update the image table now that the final filename is known.
		$query = 'UPDATE news SET imagename = "' . $imagename . '" WHERE id = ' . $last_id;
		$result = mysql_query($query) or die (mysql_error());
	
		//save the image to its final destination
		switch ($type) 
		{
			case IMAGETYPE_GIF:
				imagegif($image, $dir . '/' . $imagename);
				
				//set the dimensions for the thumbnail
				$thumb_width = $width * 0.40;
				$thumb_height = $height * 0.40;
				//create the thumbnail
				$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
				imagecopyresampled($thumb, $image, 0, 0, 0, 0, $thumb_width,$thumb_height,$width, $height);
				imagegif($thumb, $thumbdir . '/' . $imagename);
				imagedestroy($thumb);
				break;
				
			//case IMAGETYPE_JPEG:
				imagejpeg($image, $dir . '/' . $imagename, 100);
				
				//set the dimensions for the thumbnail
				$thumb_width = $width * 0.40;
				$thumb_height = $height * 0.40;
				//create the thumbnail
				$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
				imagecopyresampled($thumb, $image, 0, 0, 0, 0, $thumb_width,$thumb_height,$width, $height);
				imagejpeg($thumb, $thumbdir . '/' . $imagename, 100);
				imagedestroy($thumb);
				break;
				
			//case IMAGETYPE_PNG:
				imagepng($image, $dir . '/' . $imagename);
				
				//set the dimensions for the thumbnail
				$thumb_width = $width * 0.40;
				$thumb_height = $height * 0.40;
				//create the thumbnail
				$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
				imagecopyresampled($thumb, $image, 0, 0, 0, 0, $thumb_width,$thumb_height,$width, $height);
				imagepng($thumb, $thumbdir . '/' . $imagename);
				imagedestroy($thumb);
				break;
		} */
		//imagedestroy($image);
		
		// function imageinsertion()
   		//{
     		 //function to read the image file extension
     		 function getExtension($str) 
      		 {
        		 $i = strrpos($str,".");
         		if (!$i) { return ""; }
        			$l = strlen($str) - $i;
        			 $ext = substr($str,$i+1,$l);
        			 return $ext;
     		 }
	  
	  $image_tempname = $_FILES['pic']['name'];
		             		      
 	  //get the extension of the file in a lower case format
  	  $extension = getExtension($image_tempname);
 	  $extension = strtolower($extension);
	  
		echo 'extension is ' . $extension . '<br />';
		echo 'name is ' . $image_tempname . '<br />';
		echo '<blink>**news successfully saved!**</blink><br /><br />';
	//}
?>

