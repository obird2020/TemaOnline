<?php
	include_once('scripts/conn.php');
	$sql = 'select * from news where id ='.$_REQUEST['id'];
	$query = mysql_query($sql) or die(mysql_error());
	$roo = mysql_fetch_array($query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/thetemplate.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Tema Online | <?php echo $roo['title']; ?></title>
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
	    
        <div id="compname"><h2><?php echo strtoupper($roo['title']); ?></h2></div>
<div id="newsbody">
            	<img src="back/news/<?php echo $roo['imagename']; ?>" width="500" height="300" alt="<?php echo $roo['title']; ?>" style="border:#000 1px solid"/>			 	<br /><br />
				<?php echo nl2br(stripslashes($roo['body'])); ?>
       	 	</div>
            
            <div id="other">
             <div id="more">more news...</div>
             <table width="344" border="0" cellpadding="0" cellspacing="0" class="catsss">
  <tr>
    <th width="256">Headlines</th>
    <th width="86">Date</th>
  </tr>
  
  <?php 
	$rowsperpage = 40;
    $pagenum = 1;
   
    if(isset($_GET['pag']))
    {
       $pagenum = $_GET['pag'];
    }
    $offset = ($pagenum - 1) * $rowsperpage;
    $query = "SELECT * FROM news ORDER BY dat DESC"." LIMIT $offset, $rowsperpage";
	$result = mysql_query($query) or die(mysql_error());
	while ($rows = mysql_fetch_array($result))
	{
  ?>
  <tr>
    <td><a href="news_detail.php?id=<?php echo $rows['id']; ?>&pag=<?php echo $_REQUEST['pag']; ?>"><?php echo $rows['title']; ?></a></td>
    <td><?php echo $rows['dat']; ?></td>
  </tr>
  <?php
	}
  ?>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  <?php
   $query = "SELECT COUNT(*) AS numrows FROM news ORDER BY dat DESC";
   $result = mysql_query($query) or die(mysql_error());
   $rows = mysql_fetch_array($result, MYSQL_ASSOC);
   $numrows = $rows['numrows'];
   
   // how many pages we have when using paging?
    $maxPage = ceil($numrows/$rowsperpage);

   // print the link to access each page
   $self = $_SERVER['PHP_SELF'];
   $nav  = '';
   
   $pagetotal = 10; // maximum page numbers to display at once, must be an odd number
   $pagelimit = ($pagetotal - 1)/2;
   $pagemax = $pagetotal > $maxPage?$maxPage:$pagetotal;

   if ($pagenum - $pagelimit < 1) {
      $pagemin = 1;
   }

   if (($pagenum - $pagelimit >= 1) && ($pagenum + $pagelimit <= $maxPage)) {
      $pagemin = $pagenum - $pagelimit;
      $pagemax = $pagenum + $pagelimit;
   }

   if (($pagenum - $pagelimit >= 1) && ($pagenum + $pagelimit > $maxPage)) {
      $pagemin = (($maxPage - $pagetotal) + 1) < 1?1:(($maxPage - $pagetotal) + 1);
      $pagemax = $maxPage;
   }

   if (($pagenum + $pagelimit) > $maxPage) {
      $pagemax = $maxPage;
   } 


   for($pag = $pagemin; $pag <= $pagemax; $pag++)
   {
       if ($pag == $pagenum)
       {
           $nav .= " $pag "; // no need to create a link to current page
       }
       else
       {
           $nav .= " <a href=\"$self?pag=$pag&id=$_REQUEST[id]\" class = style10>$pag</a> ";
       }
   }
   
   if ($pagenum > 1)
   {
       $pag  = $pagenum - 1;
       $prev  = " <a href=\"$self?pag=$pag&id=$_REQUEST[id]\" class = style10>[Prev]</a> ";
       $first = " <a href=\"$self?pag=1&id=$_REQUEST[id]\" class = style10>[First Page]</a> ";
   }
   else
   {
       $prev  = '&nbsp;'; // we're on page one, don't print previous link
       $first = '&nbsp;'; // nor the first page link
   }

   if ($pagenum < $maxPage)
   {
       $page = $pagenum + 1;
       $next = " <a href=\"$self?pag=$pag&id=$_REQUEST[id]\" class = style10>[Next]</a> ";
       $last = " <a href=\"$self?pag=$maxPage&id=$_REQUEST[id]\" class = style10>[Last Page]</a> ";
   }
   else
   {
       $next = '&nbsp;'; // we're on the last page, don't print next link
       $last = '&nbsp;'; // nor the last page link
   }   
 ?>
  <tr>
    <td colspan="2" align="center" valign="middle" id="navs"><?php echo $first . $prev . $nav . $next . $last; ?></td>
    </tr>
</table>

        </div>
        
        
        
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