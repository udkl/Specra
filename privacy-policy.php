<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<link rel="stylesheet" type="text/css" href="css/reset-min.css" /> 
<link href="css/specra.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/slider.js"></script>
<link type="text/css" rel="StyleSheet" href="css/bluecurve/bluecurve.css" />


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
//g.setValue(<?=$gWeight?>);
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
	    {//collapse left panel
	   //expand left panel
		 var els1 = getElementsByClass("res-td",null,"td");
		 var els = getElementsByClass("eng-td",null,"td");
		for (i=0; i<els.length; i++) {
			els1[i].width='100%';
			els[i].style.display='';
			setCookie("leftpanel",0,'1')
        }		

		}
	  else
	  {
		 var els1 = getElementsByClass("res-td",null,"td");
		 var els = getElementsByClass("eng-td",null,"td");
		 for (i=0; i<els.length; i++) {
			els1[i].width='100%';
			els[i].style.display='none';
			setCookie("leftpanel",1,'1')
          }	
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
//-----------
function hideLeft(){
	var els1 = getElementsByClass("res-td",null,"td");
	var els = getElementsByClass("eng-td",null,"td");
	for (i=0; i<els.length; i++) {
		els1[i].width='100%';
		els[i].style.display='none';
		setCookie("leftpanel",1,'1');
	}
}
function showLeft(){
	var els1 = getElementsByClass("res-td",null,"td");
	var els = getElementsByClass("eng-td",null,"td");
	for (i=0; i<els.length; i++) {
		els1[i].width='100%';
		els[i].style.display='';
		setCookie("leftpanel",0,'1');
	}	
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
child.innerHTML = '&nbsp;<a href="http://specra.com/index.php?q='+escape(result.Title)+'&s=0&gw=<?=$gWeight?>&yw=<?=$yWeight?>&lw=<?=$mWeight?>" style="color:#000000">'+result.Title+'</a>';
parent.appendChild(child);
child = document.createElement('br');
parent.appendChild(child);

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

		</div>
		<div id="myAutoComplete">
	   	 	<input id="myInput" class="inp" name="q" value="terminator" />
	  		<div id="myContainer" ></div>
		</div>
		<input type="button" id="searchbutton" value="Search" class="search-form-submit submit-button" />
		<input type="hidden" name="s" value="<?=$thisPage?>"  />
	</div>
	
	<!-- Main Body -->

	<div id="bd">

	<h1>Privacy Policy</h1><br>
	<p>It is Specra's policy to respect your privacy regarding any information we may collect while operating our website.</p><br>

	<p></p><h3>Website Visitors</h3><br>
	<p>Like most website operators, Specra collects non-personally-identifying information of the sort that web browsers and servers typically make available, such as the browser type, language preference, referring site, and the date and time of each visitor request. Specra's purpose in collecting non-personally identifying information is to better understand how Specra's visitors use its website. From time to time, Specra may release non-personally-identifying information in the aggregate, e.g., by publishing a report on trends in the usage of its website.</p><br>

	<p>Specra also collects potentially personally-identifying information like Internet Protocol (IP) addresses. Specra does not use such information to identify its visitors, however, and does not disclose such information, other than under the same circumstances that it uses and discloses personally-identifying information, as described below.</p><br>

	<p></p><h3>Gathering of Personally-Identifying Information</h3><br>
	<p>Certain visitors to Specra's websites choose to interact with Specra in ways that require Specra to gather personally-identifying information. The amount and type of information that Specra gathers depends on the nature of the interaction. For example, we ask visitors who register and login at Specra to provide a valid email address. Those who engage in transactions with Specra - by registering, for example - are asked to provide additional information, including as necessary the personal and financial information required to process those transactions. In each case, Specra collects such information only insofar as is necessary or appropriate to fulfill the purpose of the visitor's interaction with Specra. Specra does not disclose personally-identifying information other than as described below. And visitors can always refuse to supply personally-identifying information, with the caveat that it may prevent them from engaging in certain website-related activities.</p><br>

	<p></p><h3>Aggregated Statistics</h3><br>
	<p>Specra may collect statistics about the behavior of visitors to its websites. For instance, Specra may monitor the most popular parts of the Specra site, and log page views. Specra may display this information publicly or provide it to others. However, Specra does not disclose personally-identifying information other than as described below.</p><br>

	<p></p><h3>Protection of Certain Personally-Identifying Information</h3><br>
	<p>Specra discloses potentially personally-identifying and personally-identifying information only to those of its employees, contractors and affiliated organizations that (i) need to know that information in order to process it on Specra's behalf or to provide services available at Specra's websites, and (ii) that have agreed not to disclose it to others. Some of those employees, contractors and affiliated organizations may be located outside of your home country; by using Specra's websites, you consent to the transfer of such information to them. Specra will not rent or sell potentially personally-identifying and personally-identifying information to anyone. Other than to its employees, contractors and affiliated organizations, as described above, Specra discloses potentially personally-identifying and personally-identifying information only when required to do so by law, or when Specra believes in good faith that disclosure is reasonably necessary to protect the property or rights of Specra, third parties or the public at large. If you are a registered user of a Specra website and have supplied your email address, Specra may occasionally send you an email to tell you about new features, solicit your feedback, or just keep you up to date with what's going on with Specra and our products. We primarily use our blog to communicate this type of information, so we expect to keep this type of email to a minimum. If you send us a request (for example via a support email or via one of our feedback mechanisms), we reserve the right to publish it in order to help us clarify or respond to your request or to help us support other users. Specra takes all measures reasonably necessary to protect against the unauthorized access, use, alteration or destruction of potentially personally-identifying and personally-identifying information.</p><br>

	<p></p><h3>Cookies</h3><br>
	<p>A cookie is a string of information that a website stores on a visitor's computer, and that the visitor's browser provides to the website each time the visitor returns. Specra uses cookies to help Specra identify and track visitors, their usage of Specra website, and their website access preferences. Specra visitors who do not wish to have cookies placed on their computers should set their browsers to refuse cookies before using Specra's websites, with the drawback that certain features of Specra's websites may not function properly without the aid of cookies.</p><br>

	<p></p><h3>Privacy Policy Changes</h3><br>
	<p>Although most changes are likely to be minor, Specra may change its Privacy Policy from time to time, and in Specra's sole discretion. Specra encourages visitors to frequently check this page for any changes to its Privacy Policy. Your continued use of this site after any change in this Privacy Policy will constitute your acceptance of such change.</p><br>
	
	</div>
  </div>
<? include("footer.php"); ?>
</div>
</form>
</body>
</html>
