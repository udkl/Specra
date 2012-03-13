<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Specra.com | Search many search engines at a time.</title>
<link rel="stylesheet" type="text/css" href="css/combo-min.css"> 
</head>

<body>
<form action="index.php" method="get" name="searchform" id="searchform">
<div id="wrapper-home">
  <div align="center" id="center-wrapper">
	<div id="specra-home-logo">
	 <img src="images/specra-home-logo.png" />
	 	<div style="clear:both;"></div>
	 	<input id="myInput" class="inp" name='q' style="width:350px;" /><br /><br />
	<input type="submit" id="searchbutton" value="Search" class="submit-button search-form-home" />
	</div>
	<div style="clear:both;"></div>
	<br /><br /><br /><br />
  <div style="padding-left: 35px; padding-top:25px;">	
	<div style="float:left; padding:25px;text-align:left;">
	 <span class="title"> Sample Searches </span><br /><br />
	 <div class="home-links">
		<a href="http://specra.com/index.php?gw=1000&yw=800&lw=800&q=taj+mahal&s=0" class="home-links-a">Taj Mahal</a> <br /><br />
		<a href="http://specra.com/index.php?gw=1000&yw=800&lw=800&q=billy+joel&s=0" class="home-links-a">Billy Joel</a><br /><br />
		<a href="http://specra.com/index.php?gw=1000&yw=800&lw=800&q=how+to+tie+a+tie&s=0" class="home-links-a">How to tie a tie </a>	<br /><br />
		<a href="http://specra.com/index.php?gw=1000&yw=800&lw=800&q=terminator&s=0" class="home-links-a">Terminator</a>	<br /><br />
		<a href="http://specra.com/index.php?gw=1000&yw=800&lw=800&q=call+of+duty&s=0" class="home-links-a">Call of duty</a>	<br />	 <br />
		</div>
	</div>
  </div>
<div class="home-center">
	 <span class="title"> Search Engine Weights </span><br /><br /><br />
  <div id="container">
   <div id="pan">
     <div class="cel2">
		<table border="0">	 
	    <!-- -->
		 <tr>
		  <td width="30px">
		   <img src="images/Google.gif"  />	
		  </td> 
		  <td>
			<div class="slider" id="slider-1" tabIndex="1" >
			 <input class="slider-input" id="slider-input-1"  name="gw" value="" />
			</div>
		  </td>	
		  <td>
			<span id="s1" style="width:30px;" >
			  <?=$gWeight?>
			</span>  
		  </td>
		</tr>
	    <!-- -->
		 <tr>
		  <td>
		   <img src="images/Yahoo.gif"  />	
		  </td> 
		  <td>
			<div class="slider" id="slider-2" tabIndex="1" >
			 <input class="slider-input" id="slider-input-2"  name="yw" value="" />
			</div>
		  </td>	
		  <td>
			<span id="s2" style="width:30px;" >
			  <?=$yWeight?>
			</span>  
		  </td>
		</tr>
		 <!-- -->
	    <!-- -->
		 <tr>
		  <td>
		   <img src="images/Msn.gif"  />	
		  </td> 
		  <td>
			<div class="slider" id="slider-3" tabIndex="1" >
			 <input class="slider-input" id="slider-input-3"  name="lw" value="" />
			</div>
		  </td>	
		  <td>
			<span id="s3" style="width:30px;" >
			  <?=$mWeight?>
			</span>  
		  </td>
		</tr>
		 <!-- -->
		 <table style="margin:15px 0 0 25px;">
		<tr>
		 <td>
		     <input type="button" id="res-def" value="Default" class="submit-button submit-top" onClick="restoreDefaults();" />	
		 </td>
		 <td>
		 &nbsp;&nbsp;&nbsp;
		 </td>
		 <td>
			 &nbsp;&nbsp;&nbsp;
		 </td>
		</tr>	
		</table>
	   </table>	 
	  </div>
   </div>		
  </div>
</div>
<div class="home-right" style="padding:10px 10px 10px 0;">
	 <span class="title"> How does it work ? </span><br /><br /><br />
	 <p style="margin-left:20px;">
	 When you enter a query into Specra, it searches the big three search engines for your query.<br /><br />
	 It then gathers the results from them and ranks them according to a simple algorithm.<br /><br />
	 The end result is improved quality of results for the query.<br /><br />
	 You can also assign weights to search engines to vary the importance given to their results.
	</p>
</div>
  </div>
<? include("footer.php"); ?>
</div>
</form>

<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript">
var g,y,m;

window.onload = function() {
g = new Slider(document.getElementById("slider-1"),document.getElementById("slider-input-1"));
y = new Slider(document.getElementById("slider-2"),document.getElementById("slider-input-2"));
m = new Slider(document.getElementById("slider-3"),document.getElementById("slider-input-3"));

g.setMaximum(1000);
y.setMaximum(1000);
m.setMaximum(1000);

g.setValue(<?=$gDWeight?>);
y.setValue(<?=$yDWeight?>);
m.setValue(<?=$mDWeight?>);

g.onchange = function () {
   document.getElementById("s1").innerHTML = parseInt(this.getValue());
}
y.onchange = function () {
   document.getElementById("s2").innerHTML = parseInt(this.getValue());
}
m.onchange = function () {
   document.getElementById("s3").innerHTML = parseInt(this.getValue());
}
}
//--------
function restoreDefaults()
{

	g.setValue(1000);
	y.setValue(800);
	m.setValue(800);
}
//--------
function submitForm(form){ document.getElementById(form).submit(); }

	
</script>



<? include("trackingcode.php"); ?>
</body>
</html>
