<?php
	include_once('scripts/conn.php');
	
	function highlightSearchTerms($fullText, $searchTerm, $bgcolor="#FFFF99")
   {
	  if (empty($searchTerm))
	  {
		 return $fullText;
	  }
	  else
	  {
		 $start_tag = "<span style=\"background-color: $bgcolor\">";
		 $end_tag = "</span>";
		 $highlighted_results = $start_tag . $searchTerm . $end_tag;
		 return eregi_replace($searchTerm, $highlighted_results, $fullText);
	  }
   }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/thetemplate.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Tema Online | index</title>
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
      
      <div id="int">
        	SEARCH RESULTS
        </div>
	    <table width="880" border="0" cellpadding="0" cellspacing="0" class="catsss">
	      <tr>
	        <th width="270">Name</th>
	        <th width="124">Community</th>
	        <th width="177">Category</th>
	        <th width="196">Phone</th>
	        <th width="113">&nbsp;</th>
          </tr>
	      <?php
		  $n = $_REQUEST['item'];
		  $s = "SELECT * FROM institutions WHERE name LIKE '%$n%' ORDER BY community_id asc, name asc";
		  $q = mysql_query($s) or die(mysql_error());
		  while ($rr = mysql_fetch_array($q))
		  {
			  $highlightColor = "#FFFF99";
			  
			  $sq = 'select community from communities where id='.$rr['community_id'];
			  $qu = mysql_query($sq) or die(mysql_error());
			  $ro =mysql_fetch_array($qu);
			  
			  $sqq = 'select category from categories where id='.$rr['category_id'];
			  $quq = mysql_query($sqq) or die(mysql_error());
			  $roq =mysql_fetch_array($quq);
		  ?>
	      <tr>
	        <td width="270"><?php echo highlightSearchTerms($rr['name'], $n, $highlightColor) ?></td>
	        <td width="124"><?php echo $ro['community']; ?></td>
	        <td width="177"><?php echo $roq['category']; ?></td>
	        <td><?php echo $rr['phone']; ?></td>
	        <td><a href="instprofile.php?catid=<?php echo $_REQUEST['id']; ?>&amp;compid=<?php echo $rr['id']; ?>">View Profile</a></td>
          </tr>
	      <?php
		  }
		  ?>
	      
	    </table>
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