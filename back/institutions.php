<?php include_once ('scripts/auth.php'); ?>
<?php
	include_once('../scripts/conn.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cp | institutions</title>
 <script type="text/javascript" src="scripts/mootools.js"></script>
	<script type="text/javascript">
		window.addEvent('domready', function(){
	                $('instForm').addEvent('submit', function(e) {
	                    new Event(e).stop();
	                    var log = $('log_res').empty().addClass('ajax-loading');
	                    this.send({
	                        update: log,
	                        onComplete: function() {
	                            log.removeClass('ajax-loading');
	                        }
	                    });
	                });
	            });
	</script>
    
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
	
	#institutions {
		margin:15px 0;
		padding:0;
		float:right;
	}
</style>
<link rel="stylesheet" type="text/css" href="../styles/cp.css" />
</head>

<body>

<div id="main">
<div id="cp">
  <h2>Add Institution | <span class="cp"><a href="cp.php">Back To Control Panel </a></span> | <span class="cp"><a href="../scripts/logout.php">Logout</a></span></h2> 
  </div>
<div id="top"></div>
<div id="middle">



  <form action="scripts/inst_submit.php" method="post" name="instForm" id="instForm">
    <table width="384" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center" id="log_res">&nbsp;</td>
  </tr>
  <tr>
    <td width="128" height="26" align="right">*Category:</td>
    <td width="7">&nbsp;</td>
    <td><label>
    
    
      <select name="cat" id="cat">
        <option selected="selected">-- Select --</option>
        <?php
			$sql = "SELECT * FROM categories ORDER BY category ASC";
			$query = mysql_query($sql) or die(mysql_error());
			while ($rows = mysql_fetch_array($query))
			{
		?>
        <option value="<?php echo $rows['id']; ?>" class="combo"><?php echo $rows['category']; ?></option>
        <?php
			}
		?>
      </select>
      
      
    </label></td>
    </tr>
  <tr>
    <td align="right" valign="top">*Community:</td>
    <td>&nbsp;</td>
    <td>
    
    <select name="com" id="com" class="combo">
      <option selected="selected">-- Select --</option>
      <?php
			$sq = "SELECT * FROM communities ORDER BY community ASC";
			$quer = mysql_query($sq) or die(mysql_error());
			while ($row = mysql_fetch_array($quer))
			{
		?>
      <option value="<?php echo $row['id']; ?>" class="combo"><?php echo $row['community']; ?></option>
      <?php
			}
	  ?>
    </select> 
    
         <br /></td>
  </tr>
  <tr>
    <td align="right">*Institution Name:</td>
    <td>&nbsp;</td>
    <td><label>
      <input type="text" name="name" id="name" />
    </label></td>
  </tr>
  <tr>
    <td height="24" align="right">*Email:</td>
    <td>&nbsp;</td>
    <td><input type="text" name="email" id="email" /></td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <td><input class="but" type="submit" name="submit2" id="submit2" value="  Add  " />
      <input class="but" type="reset" name="reset2" id="reset2" value="Reset" /></td>
  </tr>
    </table>
 </form>
 
 
 
</div>
<div id="bottom"></div>

<div id="institutions"><a href="institution.list.php">View All Institutions</a></div>

</div>

</body>
</html>