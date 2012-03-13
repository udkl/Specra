<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$query?> - Specra search</title>

<link rel="stylesheet" type="text/css" href="css/combo-min.css"> 

<script type="text/javascript">
function toggletopanel()
{
 var t = document.getElementById("top-panel-button");
 var r = document.getElementById("top-panel-container");
 if(t.innerHTML == "Open Control Panel")
  {
    t.innerHTML = "Close Control Panel"
	r.style.height = "105px";
	r.style.marginTop = "110px";
  }
 else
  {
    t.innerHTML = "Open Control Panel"
	r.style.height = "110px";
	r.style.marginTop = "0px";
  }  
}
function addSearch(){
if (window.external && ("AddSearchProvider" in window.external)) {
            var pluginUrl = window.location.protocol + "//" + window.location.hostname + '/plugin.xml';
            window.external.AddSearchProvider(pluginUrl);
        } else {
            alert("For IE7/Firefox 2 Only");
        }
}		
</script>
</head>

<body>
<form action="index.php" method="get" name="isearchform" id="searchform">
<div id="top-panel">

  <div id="top-panel-container">
   <div id="pan">
     <div class="cel1">
		<table border="0">	 
	    <!-- -->
		 <tr>
		  <td>
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
		 <table style="margin:8px 0 0 25px;">
		<tr>
		 <td>
		     <input type="button" id="res-def" value="Default" class="submit-button submit-top" onClick="restoreDefaults();" />	
		 </td>
		 <td>
		 &nbsp;&nbsp;&nbsp;
		 </td>
		 <td>
		   	<input type="button" id="reload" value="Reload" class="submit-button submittop" onClick="submitForm('searchform');" />		
		 </td>
		</tr>	
		</table>
	   </table>	 
	  </div>
	  <!--- -->
	  <div class="cel">
	   <div id="short-url">
	    <span onClick="get_short();"><img src="images/button.gif" /></span>
	   </div>
	  </div>
   </div>		
  </div>

  <div id="top-panel-tab">
     <span id="top-panel-button" onClick="toggletopanel();" >Open Control Panel</span>
  </div>
 </div> 
<!-- end top panel -->
<div id="wrapper">
  <div align="center" id="center-wrapper">

	<div id="hd">
		<div id="logo" title="specra.com">
	     <a href="http://specra.com/"><img class="logo" src="images/specra-logo.png" alt="Specra" /></a>
		</div>
		<div id="myAutoComplete">
	   	 	<input id="myInput" class="inp inp-top" name="q" value="<? echo urldecode($_GET['q']); ?>" />
	  		<div id="myContainer" ></div>
		</div>
		<input type="submit" id="searchbutton" value="Search" class="search-form-submit submit-button" />
		<input type="hidden" name="s" value="<?=$thisPage?>"  />
	</div>
	
	<!-- Main Body -->

	<div id="bd">
		<div id="bd-content">
			<br /><a style="margin-left:20%;" class="no-visit" href="#" onclick="addSearch();">Click here to add Specra to your browser !! </a><br/><br />
			<span style="margin-left:70px;display:block;">
<script type="text/javascript"><!--
google_ad_client = "pub-2204050190085445";
/* 468x60, created 8/9/09 */
google_ad_slot = "0855455514";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

</span>
			<a href="#" onClick="toggleLeft(this);" id="toggleLeft" class="no-visit" >Hide</a>
			<table border="0">
			<? foreach($final as $res){  ?>
			<tr border="0">
			 <td width="15%" border="0" class="eng-td">
			  <div class="engines">
			   <table>
			    <tr>
			    <td width="28" height="22">
				<? if(in_array("Google",$res->searchEngines)) {?>
				<img src="images/Google.gif" />
				 <? } else echo '<img src="images/Blank.png" width="22" height="22"  />'; ?>
				</td>
			    <td width="28" height="22">
				<? if(in_array("Yahoo",$res->searchEngines)) {?>
				<img src="images/Yahoo.gif" />
				 <? } else echo '<img src="images/Blank.png" width="22" height="22" />'; ?>
				</td>		
			    <td width="28" height="22">
				<? if(in_array("Msn",$res->searchEngines)) {?>
				<img src="images/Msn.gif" />
				 <? } else 	echo '<img src="images/Blank.png" width="22" height="22"  />'; ?>
				</td>				
			  </tr>
			   
			  <tr>

			    <td width="28">
				<div class="eng">
				 <? $k = array_keys($res->searchEngines,"Google");
				 if(!empty($k) && is_array($k))
				   echo "#".$res->searchEngineRankings[$k[0]];
				 else 
					echo "&nbsp;&nbsp;&nbsp;";
				 ?><? //echo "-".$res->score; ?> 
				</div>
				</td>
				
			    <td width="28">
				<div class="eng">
				 <? $k = array_keys($res->searchEngines,"Yahoo");
				 if(!empty($k) && is_array($k))
				   echo "#".$res->searchEngineRankings[$k[0]];
				 else 
					echo "&nbsp;&nbsp;&nbsp;";
				 ?><? //echo "-".$res->score; ?> 
				</div>
				</td>

			    <td width="28">
				<div class="eng">
				 <? $k = array_keys($res->searchEngines,"Msn");
				 if(!empty($k) && is_array($k))
				   echo "#".$res->searchEngineRankings[$k[0]];
				 else 
					echo "&nbsp;&nbsp;&nbsp;";
				 ?><? //echo "-".$res->score; ?> 
				</div>
				</td>				
				
			  </tr>
			  </table>
			   </div>
			   </td>
			  <td border="0" class="res-td">
			  <div class="result">
			    <span class="res-t">
				  <a href="<?=$res->url?>"> <?=$res->title?></a>
				</span>
				<br />
				<span class="res-u">
				<?=$res->summary?>
				</span><br />
				<span class="res-vu">				
				<?=$res->visibleUrl?>
				</span>
              </div>
			  </td>
			 </tr> 
			 <? } ?>
			</table>
			<br /><br />
			<span style="margin-left:70px;display:block;">
<script type="text/javascript"><!--
google_ad_client = "pub-2204050190085445";
/* 468x60, created 8/9/09 */
google_ad_slot = "0855455514";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

</span>
<br />
			<a href="#hd" class="no-visit">Top</a> 
			<br /><br />
					<? $temp1 = array();
		$temp1[$thisPage] = 'sel';
		$query = urlencode($query);?>
		<div class="center">
          <div id="pages" class="tabs">
		   <? if($thisPage!=0)
		    { ?>
			&nbsp;&nbsp;&nbsp;
		  <a href="index.php?s=<? echo $thisPage-1; ?>&q=<?=$query?>&gw=<?=$gWeight?>&yw=<?=$yWeight?>&lw=<?=$lWeight?>">
            <div style="margin-right:5px;" class="tab">&#171 Previous</div>
           </a>	
			<? }
				else{?>
		   <a href="#">
            <div style="margin-right:5px;" class="tab">&#171 Previous</div>
           </a>	
					<? } ?>
		  <a href="index.php?s=0&q=<?=$query?>&gw=<?=$gWeight?>&yw=<?=$yWeight?>&lw=<?=$lWeight?>">
            <div class="tab <?=$temp1[0]?>">1</div>
           </a>	
		  <a href="index.php?s=1&q=<?=$query?>&gw=<?=$gWeight?>&yw=<?=$yWeight?>&lw=<?=$lWeight?>">
            <div class="tab <?=$temp1[1]?>">2</div>
           </a>	
		  <a href="index.php?s=2&q=<?=$query?>&gw=<?=$gWeight?>&yw=<?=$yWeight?>&lw=<?=$lWeight?>">
            <div class="tab <?=$temp1[2]?>">3</div>
           </a>		
		  <a href="index.php?s=3&q=<?=$query?>&gw=<?=$gWeight?>&yw=<?=$yWeight?>&lw=<?=$lWeight?>">
            <div class="tab <?=$temp1[3]?>">4</div>
           </a>		
		  <a href="index.php?s=4&q=<?=$query?>&gw=<?=$gWeight?>&yw=<?=$yWeight?>&lw=<?=$lWeight?>">
            <div class="tab <?=$temp1[4]?>">5</div>
           </a>	
		  <a href="index.php?s=5&q=<?=$query?>&gw=<?=$gWeight?>&yw=<?=$yWeight?>&lw=<?=$lWeight?>">
            <div class="tab <?=$temp1[5]?>">6</div>
           </a>	
		  <a href="index.php?s=6&q=<?=$query?>&gw=<?=$gWeight?>&yw=<?=$yWeight?>&lw=<?=$lWeight?>">
            <div class="tab <?=$temp1[6]?>">7</div>
           </a>			  
		  <a href="index.php?s=7&q=<?=$query?>&gw=<?=$gWeight?>&yw=<?=$yWeight?>&lw=<?=$lWeight?>">
            <div class="tab <?=$temp1[7]?>">8</div>
           </a>	
		   <? if($thisPage!=9)
		    { ?>
		  <a href="index.php?s=<? echo $thisPage+1; ?>&q=<?=$query?>&gw=<?=$gWeight?>&yw=<?=$yWeight?>&lw=<?=$lWeight?>">
            <div style="margin-left:5px;" class="tab">Next &#187 </div>
           </a>	
			<? } ?>

		  </div>	
		</div>  
		<div class="clear"> </div>
		<input id="myInput2" class="inp inp-bottom" type="submit" name="t" value="<? echo urldecode($_GET['q']); ?>" />
		<input type="button" id="searchbutton2" value="Search" class="search-form-submit-bottom submit-button" />
		<div class="clear"> </div>			
		</div>
</form>
		<!-- right col -->	
		<div id="right-col-parent">
		  <div style="border:1px #3B5998 dashed;display:block;">
		   <div style="float:left; margin:10px 10px;">
					<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://specra.com/" show_faces="true" width="200"></fb:like>
		   </div>
		  </div> 
<!--
		<div style="float:left; margin:10px 10px;">
			<img src="http://static.delicious.com/img/delicious.small.gif" height="10" width="10" alt="Delicious" />
			<a href="http://delicious.com/save" class="no-visit" onclick="window.open('http://delicious.com/save?v=5&amp;noui&amp;jump=close&amp;url='http://www.specra.com/'&amp;title='Search multiple search engines at the same time. ', 'delicious','toolbar=no,width=550,height=550'); return false;"> Bookmark Specra.com</a><br /><br />
			<img src="http://static.delicious.com/img/delicious.small.gif" height="10" width="10" alt="Delicious" />
			<a href="http://delicious.com/save" class="no-visit" onclick="window.open('http://delicious.com/save?v=5&amp;noui&amp;jump=close&amp;url='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title), 'delicious','toolbar=no,width=550,height=550'); return false;"> Bookmark this search</a><br /><br />
		<div style="margin-left:25px;">
			<script type="text/javascript">  
				tweetmeme_style = 'compact';  
				tweetmeme_url = 'http://specra.com';  
				//tweetmeme code
				(function(){var _url=window.location.href;var _url=_url.replace(/((?:\?|&)?fbc_receiver=.+)?(?:#.*)?$/,"");var url=escape((typeof tweetmeme_url=="string")?tweetmeme_url:((typeof TWEETMEME_URL=="string")?TWEETMEME_URL:_url)).replace(/\+/g,"%2b");var source=(typeof tweetmeme_source=="string")?escape(tweetmeme_source):((typeof TWEETMEME_SOURCE=="string")?escape(TWEETMEME_SOURCE):false);var style=(typeof tweetmeme_style=="string")?escape(tweetmeme_style):((typeof TWEETMEME_STYLE=="string")?escape(TWEETMEME_STYLE):"normal");var src="http://api.tweetmeme.com/widget.js";switch(style){case"compact":var h=20;var w=90;break;case"rednose":var h=61;var w=50;break;default:var h=61;var w=50;break}src+="?url="+url;src+="&style="+style;if(source!=false){src+="&source="+source}document.write('<iframe src="'+src+'" height="'+h+'" width="'+w+'" frameborder="0" scrolling="no"></iframe>');tweetmeme_url=null;TWEETMEME_URL=null;tweetmeme_source=null;TWEETMEME_SOURCE=null;tweetmeme_style=null;TWEETMEME_STYLE=null})();
				</script>
		</div>
		</div>
		<div style="margin:0 0 10px 0;">
			<script type="text/javascript">
			digg_url = 'http://www.specra.com/';
			digg_title = 'Search multiple search engines at the same time. ';
			digg_bodytext = 'Search the major three search engines at once. Vary the weights and importance given to those search engines with cool sliders.';
			</script>	
			<script src="http://digg.com/tools/diggthis.js" type="text/javascript"></script>
		</div>	
-->		


<br />
<hr />
<b>Search using google !</b><br /><br />

<form action="http://www.google.com/cse" id="cse-search-box" target="_blank">
  <div>
    <input type="hidden" name="cx" value="partner-pub-2204050190085445:dqk4bq-smno" />
    <input type="hidden" name="ie" value="ISO-8859-1" />
    <input type="text" name="q" size="20" value="<? echo urldecode($_GET['q']); ?>" />
    <input type="submit" name="sa" value="Search" />
  </div>
</form>

<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
<br />
<hr />
<br />

	

		<div id="right-col">
			<span class="title"> Related Searches </span>
			 <br /><br />
			<span id="related"> 
			</span>
			<br />
			<? /*
<script type="text/javascript"><!--
amazon_ad_tag = "specra-20"; amazon_ad_width = "120"; amazon_ad_height = "600"; amazon_ad_logo = "hide"; amazon_ad_link_target = "new"; amazon_ad_border = "hide"; amazon_color_border = "FFFFFF"; amazon_color_background = "E7E7E7"; amazon_color_text = "040404"; amazon_color_link = "0F37F3"; amazon_color_logo = "B5AC1F";//--></script>
<script type="text/javascript" src="http://www.assoc-amazon.com/s/ads.js"></script>
 */ ?>
		</div>
	  </div>
	</div>
  </div>
  

<? include("footer.php"); ?>
</div>





<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript">
var g,y,m;

window.onload = function() {
g = new Slider(document.getElementById("slider-1"),document.getElementById("slider-input-1"));
y = new Slider(document.getElementById("slider-2"),document.getElementById("slider-input-2"));
m = new Slider(document.getElementById("slider-3"),document.getElementById("slider-input-3"));

search_rel(); 

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

	  if(getCookie('leftpanel') == 0)
	    {
		 var els1 = getElementsByClass("res-td",null,"td");
		 var els = getElementsByClass("eng-td",null,"td");
		for (i=0; i<els.length; i++) {
			els1[i].width='100%';
			els[i].style.display='';
        }		
		   document.getElementById("toggleLeft").innerHTML = "Hide";			
			setCookie("leftpanel",0,'1')
		}
	  else
	  {
		 var els1 = getElementsByClass("res-td",null,"td");
		 var els = getElementsByClass("eng-td",null,"td");
		 for (i=0; i<els.length; i++) {
			els1[i].width='100%';
			els[i].style.display='none';
          }	
			document.getElementById("toggleLeft").innerHTML = "Show";	  
			setCookie("leftpanel",1,'1')		  
	  }

}
//----------

function toggletopanel()
{
 var t = document.getElementById("top-panel-button");
 var r = document.getElementById("top-panel-container");
 if(t.innerHTML == "Open Control Panel")
  {
    t.innerHTML = "Close Control Panel"
	r.style.height = "105px";
	r.style.marginTop = "110px";
  }
 else
  {
    t.innerHTML = "Open Control Panel"
	r.style.height = "110px";
	r.style.marginTop = "0px";
  }  
}
//-------
function toggleLeft(t)
{

 if(t.innerHTML == "Show")
  {
    t.innerHTML = "Hide";
	var els1 = getElementsByClass("res-td",null,"td");
	var els = getElementsByClass("eng-td",null,"td");
	for (i=0; i<els.length; i++) {
		els1[i].width='100%';
		els[i].style.display='';
	}
		setCookie("leftpanel",0,'1');	
  }
 else if(t.innerHTML == "Hide")
  {
    t.innerHTML = "Show"; 
	var els1 = getElementsByClass("res-td",null,"td");
	var els = getElementsByClass("eng-td",null,"td");
	for (i=0; i<els.length; i++) {
		els1[i].width='100%';
		els[i].style.display='none';
	}	 
		setCookie("leftpanel",1,'1');	
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
//-------
		function setCookie(c_name,value,expiredays)
		{
			var exdate=new Date();
			exdate.setDate(exdate.getDate()+expiredays);
			document.cookie=c_name+ "=" +escape(value)+
			((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
		}
		
		function getCookie(c_name)
		{
			if (document.cookie.length>0)
			{
			c_start=document.cookie.indexOf(c_name + "=");
			if (c_start!=-1)
				{
				c_start=c_start + c_name.length+1;
				c_end=document.cookie.indexOf(";",c_start);
				if (c_end==-1) c_end=document.cookie.length;
				return unescape(document.cookie.substring(c_start,c_end));
				}
			}
			return "";
		}
		//-------
function getElementsByClass(searchClass,node,tag) {
	var classElements = new Array();
	if ( node == null )
		node = document;
	if ( tag == null )
		tag = '*';
	var els = node.getElementsByTagName(tag);
	var elsLen = els.length;
	var pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)");
	for (i = 0, j = 0; i < elsLen; i++) {
		if ( pattern.test(els[i].className) ) {
			classElements[j] = els[i];
			j++;
		}
	}
	return classElements;
}

//----------
var AppId = "&Appid=D373FB14231783B3B24148EA9C5AAE2686913CE9";
var serviceURI =
"http://api.search.live.net/json.aspx?JsonType=callback&JsonCallback=searchDone_rel&sources=RelatedSearch";



function search_rel() {
var search = "&query=" + document.getElementById("myInput").value;
var fullUri = serviceURI + AppId + search;

var head = document.getElementsByTagName('head');
var script = document.createElement('script');
script.type = "text/javascript";
script.src = fullUri;
head[0].appendChild(script);
}


function searchDone_rel(results) {
var result = null;
var parent = document.getElementById('related');
//parent.innerHTML = '';
var child = null;
var res = results.SearchResponse.RelatedSearch.Results;

for (var i = 0; i < res.length; i++) {
result = res[i];
child = document.createElement('li');
child.style.color = "#3D8DA8";
child.style.fontWeight = "bold";
child.innerHTML = '&nbsp;<a href="http://specra.com/index.php?q='+escape(result.Title)+'&s=0&gw=<?=$gWeight?>&yw=<?=$yWeight?>&lw=<?=$mWeight?>" style="color:#000000; 	margin-left:10px;">'+result.Title+'</a>';
parent.appendChild(child);
child = document.createElement('br');
parent.appendChild(child);

}
}

function get_short() {

var rn = Math.floor(Math.random()*11);
var service;

if(rn < 5)
 service = "http://tighturl.info/index.php?api=1"
else 
 service = "http://smaurl.info/index.php?api=1"


var longUrl = "&url=" + escape(document.URL);
var div = "&div=short-url";
var fullUri = service + longUrl + div;

var head = document.getElementsByTagName('head');
var script = document.createElement('script');
script.type = "text/javascript";
script.src = fullUri;
head[0].appendChild(script);
}

function short_callback(small)
{
  document.getElementById('short-url').innerHTML = small;
}


</script>
<? include("trackingcode.php"); ?>
</body>
</html>
