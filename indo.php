<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>Specra </title>

 <!-- Combo-handled YUI CSS files: -->
  <link rel="stylesheet" type="text/css"
        href="http://yui.yahooapis.com/combo?2.7.0/build/reset-fonts-grids/reset-fonts-grids.css&2.7.0/build/base/base-min.css&2.7.0/build/autocomplete/assets/skins/sam/autocomplete.css&2.7.0/build/button/assets/skins/sam/button.css">
 	<link rel="stylesheet" type="text/css" href="css/specra.css"> 		  
</head>

<body class="yui-skin-sam">
<div id="doc3" >	
	<div id="hd">
	<a href="http://specra.com/"><img class="logo" src="images/specra-logo.gif" alt="Specra" /></a>
	
	 <div class="res">
		<p>
		 <form id="searchform" method="get" name="isearchform" action="index.php">
		 <div id="myAutoComplete">
		  <input id="myInput" class="inp" name="q" value="<? echo urldecode($_GET['q']); ?>" />
		  	<div id="myContainer" ></div>
		 </div>
		<input type="button" id="searchbutton" value="Search" />
		<input type="hidden" name="s" value="<?=$thisPage?>"  />
		</p>
	  </div>	
	</div>
	
	<div class="info">
	<span class="c">
	  <a href="#" id="toggle" class="no-visit">Hide</a>
	  <a href="#" id="toggle-on" class="no-visit">Show</a>
	</span>
	 <span class="r">
	  <?=$bs->totalhits?> total results.
	 </span>
	</div>
	<div class="clear"> </div>
	 <div id="pan" >
		<div class="cel1">
			<span style="padding-left:6em;font-weight:bold;">Search Engine Weights</span>
			
			<div style="padding-top:15px;padding-left:8px;">
				<img src="images/Google.gif" style="float:left; margin-right:1em;" />			
				<div id="slider-bg" class="yui-h-slider" tabindex="-1" title="Slider" style="float:left;">
					<div id="slider-thumb" class="yui-slider-thumb" style="float:left;" ><img src="http://yui.yahooapis.com/2.7.0/build/slider/assets/thumb-n.gif"></div>
					<input id="slider-converted-value" type="text" value="0" size="4" maxlength="4"  name="gw" />
				</div>
			</div>
			
			<div style="padding-top:15px;margin-left:8px;margin-top:20px;">
				<img src="images/Yahoo.gif" style="float:left; margin-right:1em;" />		
				<div id="slider-bg1" class="yui-h-slider" tabindex="-1" title="Slider" style="float:left;">
					<div id="slider-thumb1" class="yui-slider-thumb" style="float:left;" ><img src="http://yui.yahooapis.com/2.7.0/build/slider/assets/thumb-n.gif"></div>
					<input id="slider-converted-value1" type="text" value="0" size="4" maxlength="4" name="yw"  />
				</div>
			</div>

			<div style="padding-top:15px;margin-left:8px;margin-top:20px;">
				<img src="images/Msn.gif" style="float:left; margin-right:1em;" />		
				<div id="slider-bg2" class="yui-h-slider" tabindex="-1" title="Slider" style="float:left;">
					<div id="slider-thumb2" class="yui-slider-thumb" style="float:left;" ><img src="http://yui.yahooapis.com/2.7.0/build/slider/assets/thumb-n.gif"></div>
					<input id="slider-converted-value2" type="text" value="0" size="4" maxlength="4" name="lw"  />
				</div>
			</div>
			
			
			<div style="padding-left:5em;margin-top:3em;">
				<input type="button" id="putval" value="Restore Defaults" />
<input type="submit" id="reloadbutton" value="Reload" />
			</div><br /><br />
		
		</div>
		<div class="cel" >	<br />				<span style="padding-left:6em;font-weight:bold;">Bookmark Us</span>
			<div style="margin-left:15px;" >
			<div style="margin-top:15px;">
			  <strong>1. Drag This --> </strong>
			  <a href="javascript:(function(){var%20x=document.getElementsByTagName('head').item(0);var%20o=document.createElement('script');if(typeof%20o!='object')o=document.standardCreateElement('script');o.setAttribute('src','http://specra.com/js/bm.js');o.setAttribute('type','text/javascript');x.appendChild(o);})();" class="no-visit" >Specra</a>		 &nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://youtube.com/sasdfsdfd" class="no-visit" > Help ! </a>
			</div>	
		
  <br />     <br />
    <strong>2. </strong>
    <a href="#" id="addSearch" class="no-visit" title="For IE7/Firefox 2 Only" >Add to Browser Search Box</a>
	
	     <br />     <br /><br />
				<strong>3.</strong>
				<script type="text/javascript" src="http://w.sharethis.com/button/sharethis.js#publisher=1184ec7b-4f16-413e-8dfb-b10f8ee1aeee&amp;type=website&amp;post_services=facebook%2Cmyspace%2Cdigg%2Cdelicious%2Cybuzz%2Ctwitter%2Cstumbleupon%2Creddit%2Ctechnorati%2Csimpy%2Ccurrent%2Cxanga%2Cyahoo_bmarks%2Cn4g%2Cmeneame%2Cfaves%2Cmister_wong%2Coknotizie%2Cdiigo%2Ccare2%2Cfunp%2Ckirtsy%2Csphinn%2Cdealsplus%2Clivejournal%2Cblogmarks%2Cslashdot%2Cfriendster%2Cmixx%2Cfresqui%2Cfurl%2Cfriendfeed%2Corkut%2Cyigg%2Cblinklist%2Cblogger%2Ctypepad%2Cgoogle_bmarks%2Cwordpress%2Cwindows_live%2Cfark%2Cbus_exchange%2Cpropeller%2Cnewsvine%2Clinkedin"></script>
				
	<br /><br />
		</div>
 		</div>
	
		<div class="cel">
		Invite Friends.	 
		</div>
		
	 </div>
	<div id="bd">

		<!-- Use Standard Nesting Grids and Special Nesting Grids to subdivid regions of your layout. -->
		<!-- Special Nesting Grid E has two children, the first is 3/4, the second is 1/4 -->
		<div class="yui-ge">
			<!-- the first child of a Grid needs the "first" class -->
			<div class="yui-u first">
			<a href="#" id="hideleft" class="no-visit" >Hide</a>
			<a href="#" id="showleft" class="no-visit">Show</a>
			<table border="0">
			<? foreach($final as $res){  ?>
			<tr border="0">
			 <td width="15%" border="0" class="eng-td">
			  <div class="engines">
			   <table>
			    <tr>
			    <td width="22" height="22">
				<? if(in_array("Google",$res->searchEngines)) {?>
				<img src="images/Google.gif" />
				 <? } else echo '<img src="images/Blank.png" width="22" height="22"  />'; ?>
				</td>
			    <td width="22" height="22">
				<? if(in_array("Yahoo",$res->searchEngines)) {?>
				<img src="images/Yahoo.gif" />
				 <? } else echo '<img src="images/Blank.png" width="22" height="22" />'; ?>
				</td>		
			    <td width="22" height="22">
				<? if(in_array("Msn",$res->searchEngines)) {?>
				<img src="images/Msn.gif" />
				 <? } else 	echo '<img src="images/Blank.png" width="22" height="22"  />'; ?>
				</td>				
			  </tr>
			   
			  <tr>

			    <td>
				<div class="eng">
				 <? $k = array_keys($res->searchEngines,"Google");
				 if(!empty($k) && is_array($k))
				   echo "#".$res->searchEngineRankings[$k[0]];
				 else 
					echo "&nbsp;&nbsp;&nbsp;";
				 ?><? //echo "-".$res->score; ?> 
				</div>
				</td>
				
			    <td>
				<div class="eng">
				 <? $k = array_keys($res->searchEngines,"Yahoo");
				 if(!empty($k) && is_array($k))
				   echo "#".$res->searchEngineRankings[$k[0]];
				 else 
					echo "&nbsp;&nbsp;&nbsp;";
				 ?><? //echo "-".$res->score; ?> 
				</div>
				</td>

			    <td>
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

			<a href="#hd" class="no-visit box">Top</a> 			
    	    </div>	
	
	
	
			<div class="yui-u">
			<span class="box">
			 <a href="#" id="cyclefont" class="no-visit" >Cycle Font</a>&nbsp;&nbsp;&nbsp;
			 <a href="#" id="cyclecolor" class="no-visit">Cycle Color</a>	
			</span>
<br />	<br />	<br />			

				  <strong> Related Searches </strong>
				  <br /><br />
					<span id="related"> 
					</span>

			</div>
		</div>
		<br /><br /><br />
			
			<? /*
<div class="cbw snap_nopreview">
<div class="cbw_header"><script src="http://www.crunchbase.com/javascripts/widget.js" type="text/javascript"></script>
<div class="cbw_header_text"><a href="http://www.crunchbase.com/" rel="nofollow">CrunchBase Information</a></div>
</div>
<div class="cbw_content">
<div class="cbw_subheader"><a href="http://specra.com/">Specra</a></div>
<div class="cbw_subcontent"><div class="cbw_subcontent_left"> <a href="http://www.crunchbase.com/product/safari"><img src="http://www.crunchbase.com/assets/images/resized/0004/3079/43079v2-max-150x150.png" border="0" alt="Safari image" /></a></div><div class="cbw_subcontent_right"><table><tr><td class="td_left">Company:</td><td class="td_right"><a href="http://www.crunchbase.com/company/apple">Apple</a></td></tr></table><p>Safari is a web browser developed by Apple Inc. First released as a public beta on January 7, 2003 on the company&#8217;s Mac OS X operating system, it became Apple&#8217;s default browser beginning with Mac OS X v10.3, commonly known as &#8220;OS X Panther.&#8221; Apple&#8230; <a href="http://www.crunchbase.com/product/safari" title="Learn More">Learn More</a></p></div></div>
<div class="cbw_footer">Widget provided by <a href="http://specra.com/" >CrunchBase</a></div>
</div>
</div>

*/ ?>


		<? $temp1 = array();
		$temp1[$thisPage] = 'sel';
		$query = urlencode($query);?>
		<div class="center">
		<a href="http://specra.com/" style="margin-left:15%;" ><img class="logo" src="images/specra-logo.gif" alt="Specra" /></a>
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
		<input id="myInput2" class="inp" name="t" value="<? echo urldecode($_GET['q']); ?>" />
		<input type="button" id="searchbutton2" value="Search" />
		<div class="clear"> </div>
	
	</div>
	<div id="ft">
		<p>Footer - Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas sit amet metus. Nunc quam elit, posuere nec, auctor in, rhoncus quis, dui. Aliquam erat volutpat. Ut dignissim, massa sit amet dignissim cursus, quam lacus feugiat.</p>
	</div>
</div>
</form> 
<script type="text/javascript" src="js/combo.js"></script>		 
<script type="text/javascript" src="js/yui/animation/animation-min.js"></script>
<script type="text/javascript" src="js/yql.js"></script>
<script type="text/javascript" src="js/search.js"></script>
<script type="text/javascript" src="js/autocomplete.js"></script>
<script type="text/javascript" src="js/yui/dragdrop/dragdrop-min.js"></script>
<script type="text/javascript" src="js/yui/slider/slider-min.js"></script>
<!--<script src="http://yui.yahooapis.com/2.7.0/build/dragdrop/dragdrop-min.js"></script>
<script src="http://yui.yahooapis.com/2.7.0/build/slider/slider-min.js"></script>-->
<? $scalingfactor = 5; ?>
<script type="text/javascript">
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


    var attributes = {
        height: { to: 0 }
    };
    var anim = new YAHOO.util.Anim('pan', attributes,1,YAHOO.util.Easing.easeIn);

			YAHOO.util.Event.on('toggle', 'click', function() {
			anim.animate();
			setCookie('panelPosition',0,'1');
			});
			
    var attributes2 = {
        height: { to: 170 }
    };
    var anim2 = new YAHOO.util.Anim('pan', attributes2,1,YAHOO.util.Easing.easeOut);
			YAHOO.util.Event.on('toggle-on', 'click', function() {
			anim2.animate();
			setCookie('panelPosition',1,'1');
  		 });
		 
	YAHOO.util.Event.onDOMReady(function() {
	if(getCookie('cyclecolor') == "")
	   setCookie('cyclecolor',0,'1');
	 else
	  {
		var colorNum = parseInt(getCookie('cyclecolor'));
		var color = ["#FFFFFF","#F5F4EE"];	 		
		document.getElementById('bd').style.backgroundColor = color[colorNum];
		document.getElementById('ft').style.backgroundColor = color[colorNum];	 
	  }
	//change color
	 YAHOO.util.Event.on("cyclecolor", "click", function(e) {
		var colorNum = parseInt(getCookie('cyclecolor'));
		var color = ["#FFFFFF","#F5F4EE"];	 
		if(colorNum == 1)
		 colorNum=-1;			
		colorNum = colorNum + 1;
		document.getElementById('bd').style.backgroundColor = color[colorNum];
		document.getElementById('ft').style.backgroundColor = color[colorNum];		
		setCookie('cyclecolor',colorNum,'1');
       });	
			
	 if(getCookie('cyclefont') == "")
	  {
	   setCookie('cyclefont',"",'1');
	   setCookie('cyclefont',0,'1');
	  }	
	 else
	  {
		var fontNum = getCookie('cyclefont');
		var font = ["Arial","sans-serif","Verdana","Segoe UI"];	 		
		fontNum = parseInt(fontNum);	   
		document.body.style.fontFamily = font[fontNum];	  
	  
	  }
	//change font
	 YAHOO.util.Event.on("cyclefont", "click", function(e) {
		var font = ["Arial","sans-serif","Verdana","Segoe UI"];	 
		var fontNum = getCookie('cyclefont');
		fontNum = parseInt(fontNum);
		if(fontNum == 3)
		 fontNum=-1;			
		fontNum = fontNum + 1;
		document.body.style.fontFamily = font[fontNum];
		setCookie('cyclefont',fontNum,'1');
       });		
	
	
	
	if(getCookie('panelPosition') == '')
	 {
	    anim2.animate();	   
	    return true;
	 }	
	  if(getCookie('panelPosition') == 1)
	    anim2.animate();
	  else
		anim.animate();	
		
	  if(getCookie('leftpanel') == 0)
	    {//collapse left panel
		 var els1 = YAHOO.util.Dom.getElementsByClassName("res-td","td");
		 var els = YAHOO.util.Dom.getElementsByClassName("eng-td","td");
		 for (i=0; i<els.length; i++) {
			els1[i].width='100%';
			els[i].style.display='none';
			setCookie("leftpanel",1,'1')
          }	
		}
	  else
	  {
	   //expand left panel
		var els1 = YAHOO.util.Dom.getElementsByClassName("res-td","td");
		var els = YAHOO.util.Dom.getElementsByClassName("eng-td","td");
		for (i=0; i<els.length; i++) {
			els1[i].width='100%';
			els[i].style.display='inline';
			setCookie("leftpanel",0,'1')
        }
	  }
	});
//http://blog.jc21.com/staging/slideandhide.php		 
			</script>
<script type="text/javascript">
(function() {
    var Event = YAHOO.util.Event,
        Dom   = YAHOO.util.Dom,
        lang  = YAHOO.lang,
        slider, 
        bg="slider-bg", thumb="slider-thumb", 
        textfield="slider-converted-value",		
		slider1, 
        bg1="slider-bg1", thumb1="slider-thumb1", 
        textfield1="slider-converted-value1",
		slider2, 
        bg2="slider-bg2", thumb2="slider-thumb2", 
        textfield2="slider-converted-value2"	

    // The slider can move 0 pixels up
    var topConstraint = 0;
    // The slider can move 200 pixels down
    var bottomConstraint = 200;
    // Custom scale factor for converting the pixel offset into a real value
    var scaleFactor =<?=$scalingfactor?>;

    // The amount the slider moves when the value is changed with the arrow
    // keys
    var keyIncrement = 20;


    Event.onDOMReady(function() {
	

        slider = YAHOO.widget.Slider.getHorizSlider(bg, 
                         thumb, topConstraint, bottomConstraint, 20);
		
		slider1 = YAHOO.widget.Slider.getHorizSlider(bg1, 
                         thumb1, topConstraint, bottomConstraint, 20);
		slider2 = YAHOO.widget.Slider.getHorizSlider(bg2, 
                         thumb2, topConstraint, bottomConstraint, 20);						 
						 
						 
        slider1.setValue(<? echo (int)floor($yWeight/$scalingfactor); ?>,false); //false here means to animate if possible				
        slider.setValue(<? echo (int)floor($gWeight/$scalingfactor); ?>,false); //false here means to animate if possible	
        slider2.setValue(<? echo (int)floor($mWeight/$scalingfactor); ?>,false); //false here means to animate if possible			
        // Sliders with ticks can be animated without YAHOO.util.Anim
        slider.animate = true;
        slider1.animate = true;
        slider2.animate = true;		
		
		search_rel(); //search for related terms.
		
        slider.getRealValue = function() {
            return Math.round(this.getValue() * scaleFactor);
        }
        slider1.getRealValue = function() {
            return Math.round(this.getValue() * scaleFactor);
        }
        slider2.getRealValue = function() {
            return Math.round(this.getValue() * scaleFactor);
        }				

        slider.subscribe("change", function(offsetFromStart) {
            var fld = Dom.get(textfield);
            var actualValue = slider.getRealValue();
            fld.value = actualValue;
            Dom.get(bg).title = "slider value = " + actualValue;
        });
		
        slider1.subscribe("change", function(offsetFromStart) {
            var fld1 = Dom.get(textfield1);
            var actualValue1 = slider1.getRealValue();
            fld1.value = actualValue1;
            Dom.get(bg1).title = "slider value = " + actualValue1;
        });	
        slider2.subscribe("change", function(offsetFromStart) {
            var fld2 = Dom.get(textfield2);
            var actualValue2 = slider2.getRealValue();
            fld2.value = actualValue2;
            Dom.get(bg2).title = "slider value = " + actualValue2;
        });				
		
        Event.on(textfield, "keydown", function(e) {

            // set the value when the 'return' key is detected
            if (Event.getCharCode(e) == 13) {
                var v = parseFloat(this.value, 10);
                v = (lang.isNumber(v)) ? v : 0;

                // convert the real value into a pixel offset
                slider.setValue(Math.round(v/scaleFactor));
            }
			
        });
        Event.on(textfield1, "keydown", function(e) {

            // set the value when the 'return' key is detected
            if (Event.getCharCode(e) === 13) {
                var v = parseFloat(this.value, 10);
                v = (lang.isNumber(v)) ? v : 0;

                // convert the real value into a pixel offset
                slider1.setValue(Math.round(v/scaleFactor));
            }
        });	
        Event.on(textfield2, "keydown", function(e) {

            // set the value when the 'return' key is detected
            if (Event.getCharCode(e) === 13) {
                var v = parseFloat(this.value, 10);
                v = (lang.isNumber(v)) ? v : 0;

                // convert the real value into a pixel offset
                slider2.setValue(Math.round(v/scaleFactor));
            }
        });			
        
        Event.on("putval", "click", function(e) {
            slider.setValue(<? echo (int)floor($gDWeight/$scalingfactor); ?>,false); 
            slider1.setValue(<? echo (int)floor($yDWeight/$scalingfactor); ?>,false); 	
            slider2.setValue(<? echo (int)floor($mDWeight/$scalingfactor); ?>,false); 			
        });
        
        Event.on("reloadbutton", "click", function(e) {
		  document.getElementById('searchform').submit();
        });		
		
        Event.on("searchbutton2", "click", function(e) {
		  document.getElementById('myInput').value =  document.getElementById('myInput2').value;
		  document.getElementById('searchform').submit();
        });	
		
        Event.on("myInput2", "keydown", function(e) {

            // set the value when the 'return' key is detected
            if (Event.getCharCode(e) === 13) {
			document.getElementById('myInput').value =  document.getElementById('myInput2').value;
			document.getElementById('searchform').submit();
            }
        });	
		//hide the left panel
        Event.on("hideleft", "click", function(e) {
		var els1 = YAHOO.util.Dom.getElementsByClassName("res-td","td");
		var els = YAHOO.util.Dom.getElementsByClassName("eng-td","td");
		for (i=0; i<els.length; i++) {
			els1[i].width='100%';
			els[i].style.display='none';
			var exdate=new Date();
			expiredays = 1;
			exdate.setDate(exdate.getDate()+expiredays);
			document.cookie="leftpanel"+ "=" +escape(0)+
			((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
        }	
        });	
		
        Event.on("showleft", "click", function(e) {
		var els1 = YAHOO.util.Dom.getElementsByClassName("res-td","td");
		var els = YAHOO.util.Dom.getElementsByClassName("eng-td","td");
		for (i=0; i<els.length; i++) {
			els1[i].width='100%';
			els[i].style.display='inline';
			var exdate=new Date();
			expiredays = 1;
			exdate.setDate(exdate.getDate()+expiredays);
			document.cookie="leftpanel"+ "=" +escape(1)+
			((expiredays==null) ? "" : ";expires="+exdate.toGMTString());			
        }
        });	
		
		Event.on("addSearch", "click", function(e) {
        if (window.external && ("AddSearchProvider" in window.external)) {
            var pluginUrl = window.location.protocol + "//" + window.location.hostname + '/plugin.xml';
            window.external.AddSearchProvider(pluginUrl);
        } else {
            alert("For IE7/Firefox 2 Only");
        }
		});	
		
	

    });
})();

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
child.className = "no-visit";
child.innerHTML = '&#126;&nbsp;&nbsp;<a href="http://specra.com/index.php?q='+escape(result.Title)+'&s=0&gw=<?=$gWeight?>&yw=<?=$yWeight?>&lw=<?=$mWeight?>" style="color:#000000">'+result.Title+'</a>';
parent.appendChild(child);
child = document.createElement('br');
parent.appendChild(child);

}
}

</script>
			
</body>
</html>
<!-- presentbright.corp.yahoo.com uncompressed/chunked Thu Feb 19 10:53:15 PST 2009 -->
