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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <title>Yahoo Boss Search</title>
   <link rel="stylesheet" href="reset-fonts-grids.css" type="text/css">
   <script language="javascript" type="text/javascript" src="jquery-1.2.1.pack.js"></script>
   <script language="javascript" type="text/javascript">
   var startall = 0;
   var next = 0;
   function requestHandler(startpos) {
   	document.getElementById('imgload').style.display ='block';
       var request;
       try  {
         request=new XMLHttpRequest();
       }
       catch (e)  {
         try   {
            request=new ActiveXObject("Msxml2.XMLHTTP");
         }
         catch (e)  {
           try  {
              request=new ActiveXObject("Microsoft.XMLHTTP");
           }
           catch (e)  {
              alert("Your browser does not support AJAX!");
              return false;
           }
         }
       }
       if(startpos < 0) startpos = 0;
       startall = startpos;
       
       var srText = document.getElementById('search_text').value;
       var url = 'boss.php?search_text=' + srText + '&startnum=' + startpos;
       
       request.open("GET", url, true);
       request.send(null);
       request.onreadystatechange = function(){
          if (request.readyState == 4 && request.status == 200) {
             if (request.responseText){
                
                    $.getJSON('cache/search.js', function(json) {
                    
                    /* Parse JSON objects */
                    
                    var nextpage = json.ysearchresponse.nextpage;
                    var prevpage = json.ysearchresponse.prevpage;
                    var totalhits = json.ysearchresponse.totalhits;
		            var deephits = json.ysearchresponse.deephits;
		            var countall = json.ysearchresponse.count;
		            var start = json.ysearchresponse.start;
		            var info = document.getElementById('info');
		            info.innerHTML = '';
		            info.innerHTML += '<p>&nbsp;</p>';
		            info.innerHTML += 'Total Results Found ' + deephits;
		            info.innerHTML += '<p>&nbsp;</p>';
		            info.innerHTML += '<a href="#" onclick="requestHandler(' + (startall + 10) + ');">Next </a>&nbsp;&nbsp;';
		            info.innerHTML += '<a href="#" onclick="requestHandler(' + (startall - 10) + ');">Previous </a>&nbsp;&nbsp;';
		            info.innerHTML += '<p>&nbsp;</p>';
		            var divcontent = document.getElementById('content');
		            divcontent.innerHTML = '';
		               $.each(json.ysearchresponse.resultset_web,function(i,item) {
		                  divcontent.innerHTML += '<br><p class="searchblock">';
		                  divcontent.innerHTML += '<a href="' + item.clickurl + '" class="searchtitle">' + item.title + '</a><br>';
                          divcontent.innerHTML += item.abstract + '<br>';
		                  divcontent.innerHTML += '<span class="searchlink">' + item.dispurl + '</span><br></p>';
                
                       });
                       json = '';
                   });
                
             }
          }
       };
       document.getElementById('imgload').style.display='none';
    }
   
   </script>
   <style>
   .searchblock {
      padding: 5px;
      background-color: #FFFFFF;
      color: #000000;
      font-family: verdana,tahoma,arial;
      font-size: 11px;
      text-align: left;
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
      position: relative;
      background-color: #FFFFFF;
      width: auto;
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
	<input type="text" name="search_text" id="search_text" value="<?=$search_text?>">
	<input type="button" name="submit" value="Search" onclick="requestHandler('0');">
	</form>
	</span>
	
	</div>
    <div class="yui-g">
    <div style="display: none; text-align: center" id="imgload"><img src="images/loadingAnimation.gif"></div>
     <div id="info" class="searchblock"></div>
     <div id="content" class="searchblock"></div>
     <div id="pager" class="searchblock"></div>
	</div>
    <span>
    
    </span>
	</div>
   <div id="ft">Footer Here</div>
</div>
</body>
</html>
