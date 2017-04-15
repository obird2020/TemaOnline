<?php
	include_once('scripts/conn.php');
	
	// Return a string truncated to a maximum number of characters. If the string
	// has been truncated, it will have $tail appended to the end.
	function trim_body($text, $max_length = 300, $tail = '...') 
	{
		$tail_len = strlen($tail);
		if (strlen($text) > $max_length) 
		{
			$tmp_text = substr($text, 0, $max_length - $tail_len);
			if (substr($text, $max_length - $tail_len, 1) == ' ') 
			{
				$text = $tmp_text;
			}
			else 
			{
				$pos = strrpos($tmp_text, ' ');
				$text = substr($text, 0, $pos);
			}
			$text = $text . $tail;
		}
		return $text;
	}
	
	function trim_b($text, $max_length = 100, $tail = '...') 
	{
		$tail_len = strlen($tail);
		if (strlen($text) > $max_length) 
		{
			$tmp_text = substr($text, 0, $max_length - $tail_len);
			if (substr($text, $max_length - $tail_len, 1) == ' ') 
			{
				$text = $tmp_text;
			}
			else 
			{
				$pos = strrpos($tmp_text, ' ');
				$text = substr($text, 0, $pos);
			}
			$text = $text . $tail;
		}
		return $text;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tema Online | home</title>
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
	    <form action="index.php" method="post" id="form1">
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
        
        <form action="index.php" method="post" id="form1">
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
    
   	
    <div id="news">
       
     <div id="newstop"></div>
     
     <!-- NEWS ANIMATION --> 
     <div id="newsmid">
     
     <div id="lofslidecontent45" class="lof-slidecontent  lof-snleft">
<div class="preload"><div></div></div>
 <!-- MAIN CONTENT FOR NEWS--> 
  <div class="lof-main-outer">
  	<ul class="lof-main-wapper">
  		
  <?php 
	$rowsper = 5;
    $page = 1;
   
    if(isset($_GET['page']))
    {
       $page = $_GET['page'];
    }
    $off = ($page - 1) * $rowsper;
    $quer = "SELECT * FROM news ORDER BY id DESC"." LIMIT $off, $rowsper";
	$resul = mysql_query($quer) or die(mysql_error());
	while ($row = mysql_fetch_array($resul))
	{
		$image = "";
		if ($row['imagename'] == 0)
		{
			$image = "back/news/0.jpg";
		}
		else
		{
			$image = "back/news/" . $row['imagename'];
		}
		
  ?>
        
        <li>
        		<img src=<?php echo $image; ?> title="<?php echo $row['title']; ?>" height="300" width="500">           
                 <div class="lof-main-item-desc">
                <h3><a target="_parent" title="<?php echo $row['title']; ?>" href="news_detail.php?id=<?php echo $row['id']; ?>&pag=1"><?php echo $row['title']; ?></a></h3>

                <p><?php echo trim_body(stripslashes($row['body'])); ?></p>
             </div>
        </li>
         
  <?php
	}
  ?>       
         
      </ul>  	
  </div>
  <!-- END MAIN CONTENT --> 
    <!-- NAVIGATOR -->

  <div class="lof-navigator-outer">
  		<ul class="lof-navigator">
   <?php 
	$rowsper = 5;
    $page = 1;
   
    if(isset($_GET['page']))
    {
       $page = $_GET['page'];
    }
    $off = ($page - 1) * $rowsper;
    $quer = "SELECT * FROM news ORDER BY id DESC"." LIMIT $off, $rowsper";
	$resul = mysql_query($quer) or die(mysql_error());
	while ($row = mysql_fetch_array($resul))
	{
		$image = "";
		if ($row['imagename'] == 0)
		{
			$image = "back/news/0.jpg";
		}
		else
		{
			$image = "back/news/thumbs/" . $row['imagename'];
		}
		
  ?>
            <li>
            	<div>
                	<img src=<?php echo $image; ?> width="70" height="70" />
                	<h3> <?php echo $row['title']; ?> </h3>
                  	<?php echo trim_b(stripslashes($row['body'])); ?>
                </div>    
            </li>
            
   <?php
	}
   ?>
                		
        </ul>
  </div>
 </div>
       
     </div>
     
     <div id="newsbottom"></div>
     
    </div>
    
    
    <!-- item lists -->
     <div id="newstop"></div>
     
     <div id="newsmid">
     
 <?php  
 	$rowsperpage = 100;
    $pagenum = 1;
   
    if(isset($_GET['page']))
    {
        $pagenum = $_GET['page'];
    }
    $offset = ($pagenum - 1) * $rowsperpage;
    
    $sql = "SELECT * FROM categories ORDER BY category ASC"." LIMIT $offset, $rowsperpage";
	$getpic = mysql_query($sql) or die(mysql_error());
	$num = mysql_num_rows($getpic);      
	$i = 1;
    $j = 1;
	$three = 4;
		
	while ($i <= $num) 
	{	
	   while ($j <= $three)	
	   { 
	       while ($rows = mysql_fetch_array($getpic))
		   { 
		     $id[$j] = $rows['id'];	
			 $category[$j] = $rows['category'];    
			 break;
		   }
		   $j++;
		   $i++;
	   }
	   $three = $three + 4;	   		  		  
?>
     
    <table class="cats" width="880" border="0">
    <tr>
    	<td width="220"><img src="images/link.gif" /> <a href="instbycat.php?id=<?php echo $id[$j - 4]; ?>"><?php echo $category[$j - 4]; ?></a></td>
   		<td width="220"><img src="images/link.gif" /> <a href="instbycat.php?id=<?php echo $id[$j - 3]; ?>"><?php echo $category[$j - 3]; ?></a></td>
    	<td width="220"><img src="images/link.gif" /> <a href="instbycat.php?id=<?php echo $id[$j - 2]; ?>"><?php echo $category[$j - 2]; ?></a></td>
    	<td><img src="images/link.gif" /> <a href="instbycat.php?id=<?php echo $id[$j - 1]; ?>"><?php echo $category[$j - 1]; ?></a></td>
   </tr>
   </table>
   
<?php
	}
?>
    
     </div>
     
     <div id="newsbottom"></div>
     
    
    
    
    <!-- ### Footer ### -->

	<div id="footer">
	<a href="contact.html">Contact Us</a> | <a href="terms.html">Terms and Conditions</a> | <a href="login.php">Login</a>
    <div id="jmo"><a target="_blank" href="http://jmosolns.p4o.net">Powered by Jmoo Solutions</a></div>
	</div>
</div>

</body>
</html>