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
	
<h3>Terms of Service (TOS)</h3>
<p>
The following terms and conditions govern all use of the Specra website and all content, services and products available at or through the website (taken together, the Website). The Website is owned and operated by Specra. The Website is offered subject to your acceptance without modification of all of the terms and conditions contained herein and all other operating rules, policies and procedures that may be published from time to time on this Site by Specra (collectively, the "Agreement").

Please read this Agreement carefully before accessing or using the web site. By accessing or using any part of the web site, you agree to become bound by the terms and conditions of this agreement. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these terms and conditions are considered an offer by Specra, acceptance is expressly limited to these terms.
</p>
<h3>1. Your Account.</h3>
<p>
You are responsible for maintaining the security of your account, and you are fully responsible for all activities that occur under the account and any other actions taken in connection with it. You must not use your account in a misleading or unlawful manner, including in a manner intended to trade on the name or reputation of others, and Specra may change or remove any description or keyword that it considers inappropriate or unlawful, or otherwise likely to cause Specra liability. You must immediately notify Specra of any unauthorized uses of your account or any other breaches of security. Specra will not be liable for any acts or omissions by You, including any damages of any kind incurred as a result of such acts or omissions.
</p>
<h3>2. Responsibility of Contributors.</h3>
<p>
If you operate a blog, comment on a blog, post material to the Website, post links on the Website, or otherwise make (or allow any third party to make) material available by means of the Website (any such material, "Content"), You are entirely responsible for the content of, and any harm resulting from, that Content. That is the case regardless of whether the Content in question constitutes text, graphics, an audio file, or computer software. By making Content available, you represent and warrant that:
</p>
<p>
* the downloading, copying and use of the Content will not infringe the proprietary rights, including but not limited to the copyright, patent, trademark or trade secret rights, of any third party;
</p>
<p>
* if your employer has rights to intellectual property you create, you have either (i) received permission from your employer to post or make available the Content, including but not limited to any software, or (ii) secured from your employer a waiver as to all rights in or to the Content;
</p><p>
* you have fully complied with any third-party licenses relating to the Content, and have done all things necessary to successfully pass through to end users any required terms;
</p><p>
* the Content does not contain or install any viruses, worms, malware, Trojan horses or other harmful or destructive content;
</p><p>
* the Content is not spam, and does not contain unethical or unwanted commercial content designed to drive traffic to third party sites or boost the search engine rankings of third party sites, or to further unlawful acts (such as phishing) or mislead recipients as to the source of the material (such as spoofing);
</p><p>
* the Content is not obscene, libelous or defamatory (more info on what that means), hateful or racially or ethnically objectionable, and does not violate the privacy or publicity rights of any third party; and
</p><p>
* you have, in the case of Content that includes computer code, accurately categorized and/or described the type, nature, uses and effects of the materials, whether requested to do so by Specra or otherwise.
</p><p>
By submitting Content to Specra for inclusion on your Website, you grant Specra a world-wide, royalty-free, and non-exclusive license to reproduce, modify, adapt and publish the Content solely for the purpose of displaying, distributing and promoting your blog. If you delete Content, Specra will use reasonable efforts to remove it from the Website, but you acknowledge that caching or references to the Content may not be made immediately unavailable.
</p><p>
Without limiting any of those representations or warranties, Specra has the right (though not the obligation) to, in Specra's sole discretion (i) refuse or remove any content that, in Specra's reasonable opinion, violates any Specra policy or is in any way harmful or objectionable, or (ii) terminate or deny access to and use of the Website to any individual or entity for any reason, in Specra's sole discretion. Specra will have no obligation to provide a refund of any amounts previously paid.
</p>
</p><p>
<h3>3. Responsibility of Website Visitors.</h3>
Specra has not reviewed, and cannot review, all of the material, including computer software, posted to the Website, and cannot therefore be responsible for that material's content, use or effects. By operating the Website, Specra does not represent or imply that it endorses the material there posted, or that it believes such material to be accurate, useful or non-harmful. You are responsible for taking precautions as necessary to protect yourself and your computer systems from viruses, worms, Trojan horses, and other harmful or destructive content. The Website may contain content that is offensive, indecent, or otherwise objectionable, as well as content containing technical inaccuracies, typographical mistakes, and other errors. The Website may also contain material that violates the privacy or publicity rights, or infringes the intellectual property and other proprietary rights, of third parties, or the downloading, copying or use of which is subject to additional terms and conditions, stated or unstated. Specra disclaims any responsibility for any harm resulting from the use by visitors of the Website, or from any downloading by those visitors of content there posted.
</p><p>
<h3>4. Content Posted on Other Websites.</h3>
We have not reviewed, and cannot review, all of the material, including computer software, made available through the websites and webpages to which Specra links, and that link to Specra. Specra does not have any control over those non-Specra websites and webpages, and is not responsible for their contents or their use. By linking to a non-Specra website or webpage, Specra does not represent or imply that it endorses such website or webpage. You are responsible for taking precautions as necessary to protect yourself and your computer systems from viruses, worms, Trojan horses, and other harmful or destructive content. Specra disclaims any responsibility for any harm resulting from your use of non-Specra websites and webpages.
</p><p>
<h3>5. Copyright Infringement and DMCA Policy.</h3>
As Specra asks others to respect its intellectual property rights, it respects the intellectual property rights of others. If you believe that material located on or linked to by Specra violates your copyright, you are encouraged to notify Specra in accordance with Specra's Digital Millennium Copyright Act ("DMCA") Policy. Specra will respond to all such notices, including as required or appropriate by removing the infringing material or disabling all links to the infringing material. In the case of a visitor who may infringe or repeatedly infringes the copyrights or other intellectual property rights of Specra or others, Specra may, in its discretion, terminate or deny access to and use of the Website. In the case of such termination, Specra will have no obligation to provide a refund of any amounts previously paid to Specra.
</p><p>
<h3>6. Intellectual Property.</h3>
This Agreement does not transfer from Specra to you any Specra or third party intellectual property, and all right, title and interest in and to such property will remain (as between the parties) solely with Specra. Specra, http://Specra.com, and all other trademarks, service marks, graphics and logos used in connection with Specra, or the Website are trademarks or registered trademarks of Specra or Specra's licensors. Other trademarks, service marks, graphics and logos used in connection with the Website may be the trademarks of other third parties. Your use of the Website grants you no right or license to reproduce or otherwise use any Specra or third-party trademarks.
</p><p>
<h3>7. Changes.</h3>
Specra reserves the right, at its sole discretion, to modify or replace any part of this Agreement. It is your responsibility to check this Agreement periodically for changes. Your continued use of or access to the Website following the posting of any changes to this Agreement constitutes acceptance of those changes. Specra may also, in the future, offer new services and/or features through the Website (including, the release of new tools and resources). Such new features and/or services shall be subject to the terms and conditions of this Agreement.
</p><p>
<h3>8. Termination.</h3>
Specra may terminate your access to all or any part of the Website at any time, with or without cause, with or without notice, effective immediately. If you wish to terminate this Agreement or your account (if you have one), you may simply discontinue using the Website. Notwithstanding the foregoing, if you have a Services account, such account can only be terminated by Specra if you materially breach this Agreement and fail to cure such breach within thirty (30) days from Specra's notice to you thereof; provided that, Specra can terminate the Website immediately as part of a general shut down of our service. All provisions of this Agreement which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.
</p><p>
<h3>9. Disclaimer of Warranties.</h3>
The Website is provided "as is". Specra and its suppliers and licensors hereby disclaim all warranties of any kind, express or implied, including, without limitation, the warranties of merchantability, fitness for a particular purpose and non-infringement. Neither Specra nor its suppliers and licensors, makes any warranty that the Website will be error free or that access thereto will be continuous or uninterrupted. You understand that you download from, or otherwise obtain content or services through, the Website at your own discretion and risk.
</p><p>
<h3>10. Limitation of Liability.</h3>
In no event will Specra, or its suppliers or licensors, be liable with respect to any subject matter of this agreement under any contract, negligence, strict liability or other legal or equitable theory for: (i) any special, incidental or consequential damages; (ii) the cost of procurement or substitute products or services; (iii) for interruption of use or loss or corruption of data; or (iv) for any amounts that increase the fees paid by you to Specra under this agreement during the twelve (12) month period prior to the date the cause of the action accrues. Specra shall have no liability for any failure or delay due to matters beyond their reasonable control. The foregoing shall not apply to the extent prohibited by applicable law.
</p><p>
<h3>11. General Representation and Warranty.</h3>
You represent and warrant that (i) your use of the Website will be in strict accordance with the Specra Privacy Policy, with this Agreement and with all applicable laws and regulations (including without limitation any local laws or regulations in your country, state, city, or other governmental area, regarding online conduct and acceptable content, and including all applicable laws regarding the transmission of technical data exported from the United States or the country in which you reside) and (ii) your use of the Website will not infringe or misappropriate the intellectual property rights of any third party.
</p><p>
<h3>12. Indemnification.</h3>
<p>
You agree to indemnify and hold harmless Specra, its contractors, and its licensors, and their respective directors, officers, employees and agents from and against any and all claims and expenses, including attorneys' fees, arising out of your use of the Website, including but not limited to out of your violation this Agreement.
</p>

<h3>13. Miscellaneous.</h3>
<p>
This Agreement constitutes the entire agreement between Specra and you concerning the subject matter hereof, and they may only be modified by a written amendment signed by an authorized executive of Specra, or by the posting by Specra of a revised version. Except to the extent applicable law, if any, provides otherwise, this Agreement, any access to or use of the Website will be governed by the laws of the state of California, excluding its conflict of law provisions, and the proper venue for any disputes arising out of or relating to any of the same will be the state and federal courts located in San Francisco County, California. Except for claims for injunctive or equitable relief or claims regarding intellectual property rights (which may be brought in any competent court without the posting of a bond), any dispute arising under this Agreement shall be finally settled in accordance with the Comprehensive Arbitration Rules of the Judicial Arbitration and Mediation Service, Inc. ("JAMS") by three arbitrators appointed in accordance with such Rules. The arbitration shall take place in San Francisco, California, in the English language and the arbitral decision may be enforced in any court.</p>

The prevailing party in any action or proceeding to enforce this Agreement shall be entitled to costs and attorneys' fees. If any part of this Agreement is held invalid or unenforceable, that part will be construed to reflect the parties' original intent, and the remaining portions will remain in full force and effect. A waiver by either party of any term or condition of this Agreement or any breach thereof, in any one instance, will not waive such term or condition or any subsequent breach thereof. You may assign your rights under this Agreement to any party that consents to, and agrees to be bound by, its terms and conditions; Specra may assign its rights under this Agreement without condition. This Agreement will be binding upon and will inure to the benefit of the parties, their successors and permitted assigns.

	</div>
  </div>
<? include("footer.php"); ?>
</div>
</form>
</body>
</html>
