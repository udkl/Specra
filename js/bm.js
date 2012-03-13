var u=window.parent.location.href;
var a1=u.split('/');
var a2=a1[2].split('.');
var s=a2[a2.length-2]+'.'+a2[a2.length-1];

var R = window.getSelection();

var _con=confirm("Search the site  "+s+"\n\n (Pressing 'Cancel' will search the whole Web and not just the Site)");

if(R)
 _q = prompt("Enter Search term :", R);
else
 _q = prompt("Enter Search term :"); 

_f=document.createElement('form');
if(_con)
 _f.action="http://specra.com/index.php?q="+escape(_q)+"+site:"+escape(s)+"&s=0&gw=1000&yw=800&lw=600"
else
 _f.action="http://specra.com/index.php?q="+escape(_q)+"&s=0&gw=1000&yw=800&lw=600"
 
_f.method="post";
document.getElementsByTagName("body")[0].appendChild(_f);
_f.submit();