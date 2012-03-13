<?php
/**Copyright (C) 2008-2009 Anirban Bhattacharya

  This software is provided 'as-is', without any express or implied
  warranty.  In no event will the authors be held liable for any damages
  arising from the use of this software.

  Permission is granted to anyone to use this software for any purpose,
  including commercial applications, and to alter it and redistribute it
  freely, subject to the following restrictions:

  1. The origin of this software must not be misrepresented; you must not
     claim that you wrote the original software. If you use this software
     in a product, an acknowledgment in the product documentation would be
     appreciated but is not required.
  2. Altered source versions must be plainly marked as such, and must not be
     misrepresented as being the original software.
  3. This notice may not be removed or altered from any source distribution.
  
  
==================================================================
*/
include_once("search.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <title>YUI Base Page</title>
   <link rel="stylesheet" href="reset-fonts-grids.css" type="text/css">
   <!--<script src="yahoo-min.js"></script> 
   <script src="json-min.js"></script> 
   <script src="event-min.js"></script>
   <script src="connection-min.js"></script>-->
   <style>
   .searchblock {
      padding: 5px;
      background-color: #EFFFFF;
      color: #000000;
      font-family: verdana,tahoma,arial;
      font-size: 11px;
   }
   .searchtitle {
      text-align: left;
      color: #000099;
      font-size: 14px;
      font-style: underline;
   }
   .searchlink {
      color: #009900;
      font-size: 10px;
   }
   .headerblock {
      padding: 5px;
      background-color: #777777;
      color: #FFFFFF;
      font-family: verdana,tahoma,arial;
      font-size: 20px;
      font-style: bold;
      width: 100%;
      text-align: center;
   }
   .textbox {
      width: 200px;
      height: 50 px;
      font-family: verdana,tahoma,arial;
      font-size: 14px;
      border: 1px solid #000000;
   }
   .divimage {
      background-color: #FFFFFF;
      width: 250px;
      height: 250px;
      display: inline;
      font-family: verdana,tahoma,arial;
      font-size: 11px;
   }
   .img {
     float: top;
   }
   .total {
     text-align: right;
     font-size: 10px;
     color: #ffffff;
   }
   </style>
</head>
<body>
<div id="doc4" class="yui-t7">
   <div id="hd"><div class="headerblock">Yahoo Boss Search<div></div>
   <div id="bd">
	<div class="yui-g">
	<span style="text-align:center">
	<form name="search" method="get">
	<input type="text" name="search_text" value="<?=$search_text?>">
	<input type="submit" name="submit" value="Search">
	</form>
	</span>
	</div>
<div class="yui-g">
  <? if($bs->totalhits) { ?>
   <span class="total">Total Results Found: <?=$bs->totalhits?></span>
  <? } ?>
	<?php
	if(isset($bs) && is_object($bs)) {
		if($bs->searchtype == "web") {
		   for($i=0;$i<count($bs->search_results);$i++) {
		      $res = $bs->search_results[$i];
		      /**
		       * The following available
		       * $res->abstract //Search Abstract
               * $res->date //Cache date
               * $res->dispurl //Display URL
               * $res->clickurl //The URL to be clicked
               * $res->size //Size of file
               * $res->title //Title of page
               * $res->url //URL of website
		       */
		      echo '<br><p class="searchblock">';
		      echo '<a href="'.$res->clickurl.'" class="searchtitle">'.$res->title.'</a><br>';  
		      echo $res->abstract,'<br>'; 
		      echo '<span class="searchlink">'.$res->dispurl.'</span><br>';
		      echo '</p>';
	       }
	     }
	     elseif($bs->searchtype == "images") {
	     	echo '<div style="background-color: #FFFFFF">';
	     	 for($i=0;$i<count($bs->search_results);$i++) {
	     	 	/**
	     	 	 * These are available
	     	 	 * $res->abstract //Abstract or description
                 * $res->clickurl //Link to follow to view the page
                 * $res->filename //Image filename
                 * $res->size //Image size
                 * $res->format //Image format
                 * $res->height //Image height
                 * $res->date //Image cache date
                 * $res->mimetype //Image mime type
                 * $res->refererclickurl //Clickable link to page in which image was found 
                 * $res->refererurl //Original link to page in which image was found 
                 * $res->title //Title of image
                 * $res->url //URL of image
                 * $res->width //Width
                 * $res->thumbnail_height 
                 * $res->thumbnail_url
                 * $res->thumbnail_width
	     	 	 */
		         $res = $bs->search_results[$i];
		         echo '<div class="divimage">';
		         echo '<a href="'.$res->clickurl.'"><img src="'.$res->thumbnail_url.'" width="'.$res->thumbnail_width.'" height="'.$res->thumbnail_height.'" alt="'.$res->thumbnail_url.'" title="'.$res->thumbnail_url.'"></a>';
		         echo '<p class="searchlink" style="display:compact">'.$res->title.'</p></div>';
		         
		         if($i>1 && ($i%4)==0) echo '<div>&nbsp;</div>';
	     	 }
	     	 echo '</div>';
	     }
     }
	?>
	</div>
    <span>
    <?php
    if($search_text != '') {
        $total = $bs->total;
        if($total <=0) $total=1;
        $current = $bs->current;
        if($current <=0) $current = 1;
    
        if($current < 5) {
    	   $startpage = 0;
        }
        else {
    	   $startpage = $current - 5;
        }
        for($j=$startpage;$j<$startpage+10;$j++) {
            echo '<a href="index.php?search_text='.$search_text.'&start='.($j*$bs->result_per_page).'">'.($j+1).'</a> | ';
        }
    }
    ?>
    </span>
	</div>
   <div id="ft">Footer Here</div>
</div>
</body>
</html>
