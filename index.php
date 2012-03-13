<?php
//close the error reporting of PHP

global $final,$id,$Engines,$totalResults;
$Engines = Array(); // has the registered Search Engines
$En = array(); //contains total results
$id = 1;
$final = array(); //contains the group of res results
$yDWeight = 800;
$gDWeight = 1000;
$mDWeight = 800;
$status = 1;

//--SearchResult
class SearchResult 
{
 var $id = 1;
 var $score = 0;
 var $title = "Untitled";
 var $url= "#"; //click url
 var $summary = "No summary";
 var $visibleUrl = "#";
 var $cacheUrl =  null;
 var $searchEngines =  Array(); //various searchengines where the result is present (weight)
 var $searchEngineRankings =  Array(); //
 var $resultElement =  null;

}



//------------------
class SearchEngine
{
 private  $name;
 private  $icon = null;
 private  $weight = 1000;
 private  $resultFormat = 'json';
 private  $apiKey;
 private $searchType = 'web';
 
 public  $result;
 
 function search($query,$type,$start,$count=10){}
 
 function setWeight($weight)
  {
   //check if empty
   if($weight = '' || empty($weight))
    $weight = 0;
   //check if weight is  int and between 0 and 1000 
   $weight = (int)$weight;
   
   if($weight < 0 || $weight > 1000)
    {
	 $weight = 0;
	 echo "Weight out of bounds";
	} 
	$this->weight = $weight;
   return true;	
  }

}
//http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=Paris%20Hilton?start=0
//http://code.google.com/apis/ajaxsearch/documentation/#fonje


//========================================================

class SearchEngineGoogle extends SearchEngine
{
 var $name = "Google";
 var $icon = "images/google.gif";
 var $weight = 1000; 
 var $apiKey = "ABQIAAAAwIluEOYiIlTXVrp1Hj_kshT2yXp_ZAY8_ufC3CFXhHIE1NvwkxSzZlG4dc_V26z4BlIOfZqSrduhzQ";
 var $searchUrl; //not mentioned here cause different for web,image etc
 var $resultFormat = "json";
 
 
 //--------
 function __construct($weight,$type='web') 
  {
   $this->setWeight($weight);
   $this->name = "Google";
   $this->searchType = $type; 
  }
 
 
 //---------
 public function searchQuery($query,$start,$count=10) 
  {
  switch($this->searchType)
    {
	 default:
	 case 'web' :
			$this->searchUrl= "http://ajax.googleapis.com/ajax/services/search/web?v=1.0";
			$this->searchUrl .= '&q='.urlencode($query);
			$this->searchUrl .= '&start='.$start;
			$this->searchUrl .= '&count='.$count;
			$this->searchUrl .= '&rsz=large';
			//echo $this->searchUrl;
		break;	
   //placeholders for images/news etc
   }
   $this->searchNow($this->searchUrl);
  } 
 //------------------
 public function searchNow($url)
  {
   require_once('lib/json/json.php'); //do not shift this statement above. Only include if everything else is right.
   try 
    {
	 $curl = curl_init($url);
	 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	 $result = curl_exec($curl);
	 $this->result = $result;
	 curl_close($curl);
	 
	 if($this->resultFormat = 'json') 
	  {
	   $result = json_decode($result,0); //not needed if jasonToArray is used. if not used, comment the include statment above.
	   //convert into array.
	   //$resultArray = jasonToArray($result); //better than jsondecode w.r.t performance. But, may give worng results.
	   $resultArray = $result->responseData->results;
//print_r($resultArray);
	   //send to the processing engine
	  $this->processResult($resultArray);
	  
	  }
	}
	catch(Exception $e) 
	 {
	  throw new Exception("Could not retreive result:",$e->getMessage(), "\n"); //Needed to show the User ? maybe mail error.
	 }
   //for optimization, do not return array.
    return true;   
  }

//---------
 function processResult($resultArray)	
  {
   global $id,$final;
   $total = count($resultArray);
   //arrange properly as a search result object
   for($i=0;$i<$total;$i++)
    {
	 $result = $resultArray[$i];
	 	 $result->visibleUrl = stripslashes($result->url);
	 $foundId = inFinal($result);
     if($foundId == -99) //not already found by another search engine.
	  {
       $res = new SearchResult; 
       $res->id = $id; $id++;
       $res->title = $result->title;
       $res->url   = $result->url;
       $res->visibleUrl   = $result->url;	   
       $res->summary   = $result->content;
	   array_push($res->searchEngines,$this->name);
	   array_push($res->searchEngineRankings,$i+1);	
	   //finally push into Final array.
	   array_push($final,$res);
	  } 
	 else//found by another search engine.
      {
	   array_push($final[$foundId]->searchEngines,$this->name);
	   array_push($final[$foundId]->searchEngineRankings,$i+1);
      }	  
    }	 
  }
}

//========================================================

class SearchEngineYahoo extends SearchEngine
{
 var $name = "Yahoo";
 var $icon = "images/yahoo.gif";
 var $weight = 1000; 
 var $apiKey = "xsbYH9zV34EvsrHpgy5oG8JdPutEwFlyvUlP67inOivHASc3U.J8EHprTa6kAe2SG3iVhZQ-";
 var $searchUrl;
 var $resultFormat = "json";
 
 
 //--------
 function __construct($weight,$type='web') 
  {
   $this->setWeight($weight);
   $this->name = "Yahoo";
   $this->searchType = $type; 
  }
 
 
 //---------
 public function searchQuery($query,$start,$count=10) 
  {
  switch($this->searchType)
    {
	 default:
	 case 'web' :
			$this->searchUrl= "http://boss.yahooapis.com/ysearch/web/v1/".urlencode($query)."?appid=".$this->apiKey;
			$this->searchUrl .= '&start='.$start;
			$this->searchUrl .= '&count='.$count;
			$this->searchUrl .= '&format='.$this->resultFormat;	
			$this->searchUrl .= '&abstract=long';	
			//echo $this->searchUrl ;
//http://boss.yahooapis.com/ysearch/web/v1/ireland? appid={yourBOSSappid}&format=xml&view=keyterms	
		break;	
   //placeholders for images/news etc
   }
   $this->searchNow($this->searchUrl);
  } 
 //------------------
 public function searchNow($url)
  {
   global $totalResults;
   require_once('lib/json/json.php');
   try 
    {
	 $curl = curl_init($url);
	 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	 $result = curl_exec($curl);
	 $this->result = $result;
	 curl_close($curl);
	 
	 if($this->resultFormat = 'json') 
	  {
	   $result = json_decode($result,0); //not needed if jasonToArray is used. if not used, comment the include statment above.
	   //convert into array.
	   //$resultArray = jasonToArray($result); //better than jsondecode w.r.t performance. But, may give worng results.
	   $resultArray = $result->ysearchresponse->resultset_web;
	   $totalResults = 0;
	  // print_r($resultArray);
	   //die();
	   //send to the processing engine
	  $this->processResult($resultArray);
	  
	  }
	}
	catch(Exception $e) 
	 {
	  throw new Exception("Could not retreive result:",$e->getMessage(), "\n"); //Needed to show the User ? maybe mail error.
	 }
   //for optimization, do not return array.
    return true;   
  }

//---------
 function processResult($resultArray)	
  {
   global $id,$final;
   $total = count($resultArray);
   //arrange properly as a search result object
   for($i=0;$i<$total;$i++)
    {
	 $result = $resultArray[$i];
	 $result->visibleUrl = stripslashes($result->url);
	 $foundId = inFinal($result);
     if($foundId == -99) //not already found by another search engine.
	  {
       $res = new SearchResult; 
       $res->id = $id; $id++;
       $res->title = $result->title;
       $res->url   = $result->clickurl;
	   $res->visibleUrl   = $result->url;
       $res->summary   = $result->abstract;
	   array_push($res->searchEngines,$this->name);
	   array_push($res->searchEngineRankings,$i+1);	
	   //finally push into Final array.
	   array_push($final,$res);
	  } 
	 else //found by another search engine.
      {
	   array_push($final[$foundId]->searchEngines,$this->name);
	   array_push($final[$foundId]->searchEngineRankings,$i+1);	
      }	  
    }	 
  }
  
//example
/*
$yWeight = (int) verifyWeight($_GET['yw'],$yDWeight);
$Y = new SearchEngineYahoo($yWeight,$type);
$Y->searchQuery($query,$start,$count);
//register search engine
$Engines['Yahoo'] = $yWeight;
$En['Yahoo'] = $count;
*/
  
  
}

//---------------------------------------------------------------------------
 function weightThem()
  {
   global $final,$Engines,$En;
   $total = count($final);
   
   for($j=0;$j<$total;$j++)
    {
	 $res = $final[$j]; //$res can be removed later.
	 $score = 0;
	 for($i=0;$i<count($res->searchEngines);$i++)
	   $score = $score + $Engines[$res->searchEngines[$i]] * (($En[$res->searchEngines[$i]] + 1) - $res->searchEngineRankings[$i]);
	   //score = weight * position
	 $final[$j]->score = $score;
	}
	
   //lets order it now. normal bubble sort  for now.
   for($j=0;$j<$total;$j++)
    {
     for($i=0;$i<$total;$i++)
      {
	   if($final[$i]->score < $final[$j]->score)
	    {
         $temp = $final[$j];
		 $final[$j] = $final[$i];
		 $final[$i] = $temp;
		}
	  }
    }	
  }

//=================================

 function inFinal($res)
  {
   global $final;
   $total = count($final);
   for($i=0;$i<$total;$i++)
    {
	 if($res->visibleUrl == $final[$i]->visibleUrl)
	   return($i);
    }
  return -99;	
  }
  

 function inFinalMsn($res)
  {
   global $final;
   $total = count($final);
   for($i=0;$i<$total;$i++)
    {
	 if($res['web:Url'] == $final[$i]->visibleUrl)
	   return($i);
    }
  return -99;	
  }  

//------------------------------------------------------------------------
include("verify.php");


//===================||||||||||||||||||============================

//usage
//general options
$start = (int) verifyStart($_GET['s']);
$count = (int) verifyCount($_GET['c']);
$type = 'web';
//$type = verifyType($type);
$query = rawurldecode($_GET['q']);
//$query =  verifyQuery($query);


$thisPage = $start;

if($status == 1)
 {

//------
$gWeight = (int) verifyWeight($_GET['gw'],$gDWeight);
$G = new SearchEngineGoogle($gWeight,$type);
$G->searchQuery($query,$start*8,$count);
//register search engine
$Engines['Google'] = $gWeight;
$En['Google'] = 8;
//------
$yWeight = (int) verifyWeight($_GET['yw'],$yDWeight);
include("yboss/search.php");
$Engines['Yahoo'] = $yWeight;
$En['Yahoo'] = $count;
//------
//print_r($final);
$mWeight = (int) verifyWeight($_GET['lw'],$mDWeight);
include("msn/search.php");
$Engines['Msn'] = $mWeight;
$En['Msn'] = $count;
//echo "---------";
//print_r($final);
//------Now lets calculate the weights
weightThem();
}
   //$final now has the ranked results
   //Now to Style them
//include("indo.php");
if(isset($query) && !empty($query))
 include("trial.php");
else
 include("main.php"); 



//----OPT - unset all previous datastructures/objects to lower memory load.

//echo "<pre>";
//print_r($final);


//OPT---Process result as a standalone procedure/function
// Multithreading of the search process.

?>