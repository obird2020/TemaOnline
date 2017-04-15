<?php
	include_once('scripts/conn.php');
	$sql = "SELECT * FROM institutions WHERE id = '" . $_REQUEST['compid'] . "'";
	$query = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/thetemplate.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Tema Online | <?php echo strtolower($row['name']); ?></title>
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/news.css" />
<link rel="stylesheet" type="text/css" href="styles/news_style.css" />
<script language="javascript" type="text/javascript" src="scripts/jquery.js"></script>
<script language="javascript" type="text/javascript" src="scripts/jquery.easing.js"></script>
<script language="javascript" type="text/javascript" src="scripts/script.js"></script>
<script type="text/javascript">
 $(document).ready( function(){	
		$('#lofslidecontent45').lofJSidernews( { interval:7000,
											 	easing:'easeOutBounce',
												duration:1200,
												auto:true } );						
	});

</script>
<style>
	.lof-snleft  .lof-main-outer{
		float:right;
	}
	/* move the main wapper to the right side */
	.lof-snleft .lof-main-wapper{
		margin-left:auto;
		margin-right:inherit;
		clear:both;
		height:300px;
	}
	/* move the navigator to the left  side */
	.lof-snleft .lof-navigator-outer{
		left:0;
		top:0;
		right:inherit;
		
	}
	
	ul.lof-main-wapper li {
		position:relative;	
	}
	.lof-snleft .lof-navigator .active{
		background:url(images/arrow-bg2.gif) center right no-repeat;
	}
	.lof-snleft .lof-navigator li div{
		margin-left:inherit;
		margin-right:18px;
	}
	
	.lof-snleft .lof-navigator li.active div{
		margin-left:inherit;
		margin-right:18px;
		background:url(images/grad-bg2.gif);
		
	}
</style>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>

<div id="container">

	<!-- ###  Header  ### -->
	
	<div id="header">	
	
        <div id="search">
        <?php
	   	if (isset($_POST['submit']))
		{
			if (trim($_POST['item']) == '')
			{
	   ?>
        <blink>enter search item</blink>
	    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form1">
          <input name="item" type="text" id="item" />
          <input name="submit" type="submit" value="Search" id="submit" />
        </form>		
			
		<?php					
			}
			else
			{
				header ("Location: search.php?item=".$_POST['item']);
			}
		}
		else
		{
	   ?> 
        
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form1">
          <input name="item" type="text" id="item" />
          <input name="submit" type="submit" value="Search" id="submit" />
        </form>
        
       <?php
		}
	   ?> 
       </div>
       <h1><a href="index.php">WELCOME TO TEMA</a></h1>
       <p>Your Gateway to Tema</p>
       <p>TemaOnline.com</p>
		<!-- ### Top menu ### -->
		
		<div id="topmenu">
		<ul>
			<li><a href="index.php">Home</a></li>	
			<li><a href="communities.php">Communitites</a></li>	
            <li><a href="institutions.php">Institutions</a></li>	
            <li><a href="news.php?pag=1">News</a></li>	
		</ul>	
		</div>
        
        
        
     </div>
<!-- InstanceBeginEditable name="EditRegion1" -->
	
  <!-- InstanceEndEditable --><!-- item lists --><!-- InstanceBeginEditable name="EditRegion2" -->
	<div id="conts">
	  <div id="newstop"></div>
	  <div id="newsmid">
      
	    <div id="compname"><h2><?php echo strtoupper($row['name']); ?></h2></div>
      
	    <table class="compother" width="600" border="0">
	      <tr>
	        <td width="85" align="right"><strong>Phone:</strong></td>
	        <td width="14">&nbsp;</td>
	        <td width="487" align="left" valign="top"><?php echo $row['phone']; ?></td>
	        </tr>
	      <tr>
	        <td align="right"><strong>Fax:</strong></td>
	        <td>&nbsp;</td>
	        <td align="left" valign="top"><?php echo $row['fax']; ?></td>
          </tr>
	      <tr>
	        <td align="right"><strong>Email:</strong></td>
	        <td>&nbsp;</td>
	        <td align="left" valign="top"><?php echo $row['email']; ?></td>
          </tr>
	      <tr>
	        <td align="right"><strong>Website:</strong></td>
	        <td>&nbsp;</td>
	        <td align="left" valign="top"><a target="_blank" href="<?php echo $row['website']; ?>"><?php echo $row['website']; ?></a></td>
          </tr>
	      <tr>
	        <td align="right" valign="top"><strong>Location:</strong></td>
	        <td>&nbsp;</td>
	        <td align="left" valign="top"><?php echo nl2br(stripslashes($row['location'])); ?></td>
          </tr>
	      <tr>
	        <td align="right" valign="top"><strong>Address:</strong></td>
	        <td>&nbsp;</td>
	        <td align="left" valign="top"><?php echo nl2br(stripslashes($row['address'])); ?></td>
          </tr>
	      </table>
        <div id="pro"><h3>Profile</h3></div>
        <div id="prof"><?php echo nl2br(stripslashes($row['profile'])); ?></div>
          
	  </div>
	  <div id="newsbottom"></div>
	  </div>
	<!-- InstanceEndEditable --><!-- ### Footer ### -->

	<div id="footer">
	<a href="contact.html">Contact Us</a> | <a href="terms.html">Terms and Conditions</a> | <a href="sitemap.html">Sitemap</a> | <a href="login.php">Login</a>
    <div id="jmo"><a target="_blank" href="http://jmosolns.p4o.net">Powered by Jmoo Solutions</a></div>
	</div>
</div>

</body>
<!-- InstanceEnd --></html>