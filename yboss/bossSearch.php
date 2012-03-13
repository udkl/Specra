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


class bossSearch {
       /**
        * @access  private
        */
	    private $result_format	= 'json';
	    private $rcode = '';
		private $previous = '';
		private $next = '';
		private $search_url = 'http://boss.yahooapis.com/ysearch/';
		private $query = '';
		private $deephit = '';		
		private $imageFilter;
		private $imageDimesion;
		private $requestType;
		
		/**
		 * @access public
		 */
		public $name = 'Yahoo';
		public $searchtype;		
		public $api;				
		public $result_per_page;
		public $start = 0;	
		public $totalhits = '';
		public $search_results	= '';
		public $current = '';
		public $total = '';			
		public $spell_error;
		public $result = '';
		
		const SUCCESS = 200;
		
		/**
		 * Constructor
		 *
		 */
		function __construct() {
			$this->searchtype = 'images';
			$this->api = '';
			$this->result_per_page = 10;
			$this->error = '';
			$this->checkSupport();
			if($this->searchtype == 'images') {
			    $this->imageFilter = 'yes';
		    }
			elseif($this->searchtype == 'web') {
                $this->imageFilter = '-hate,-porn';
			}
			$this->imageDimesion = 'all';
		}
		
		/**
		 * This function sets API key
		 *
		 * @param string $api
		 */
		public function setAPI($api) {
			$this->api = $api;
		}
		/**
		 * This function sets search type viz web, images, news
		 *
		 * @param string $type
		 */
		public function setRequestType($type) {
			$this->requestType = 'ajax';
		}
		public function setSearchType($type) {
			$this->searchtype = $type;
		}
		/**
		 * This function to set number of entries per page
		 *
		 * @param numeric $num
		 */
		public function setResultPerPage($num) {
			$this->result_per_page = $num;
		}
		/**
		 * If you want to turn off image filetring
		 *
		 */
		public function noImageFilter() {
			if($this->searchtype == 'images') {
			    $this->imageFilter = 'no';
		    }
			elseif($this->searchtype == 'web') {
                $this->imageFilter = '';
			}
		}
		/**
        *if you want to set appropriate filter
		*
		*/
		public function setFilter() {
			if($this->searchtype == 'images') {
			    $this->imageFilter = 'yes';
		    }
			elseif($this->searchtype == 'web') {
                $this->imageFilter = '-hate,-porn';
			}
		}
		/**
		 * The start entry number
		 *
		 * @param numeric $start
		 */
		public function setStart($start) {
			$this->start = $start;
		}
		/**
		 * What kind of image it will return
		 *
		 * @param string $dim
		 */
		public function setImageDimension($dim) {
			switch ($dim) {
				case 0:
					$this->imageDimesion = 'all';
				    break;
				case 1:
					$this->imageDimesion = 'small';
				    break;
				case 2:
					$this->imageDimesion = 'medium';
				    break;
				case 3:
					$this->imageDimesion = 'large';
				    break;
				case 4:
					$this->imageDimesion = 'wallpaper';
				    break;
				case 5:
					$this->imageDimesion = 'widewallpaper';
				    break;	
			}
		}
		/**
		 * Check JSON support
		 *
		 */
		private function checkSupport() {
			if(!function_exists('json_encode')) {
				$this->result_format = 'xml';
			}
		}
		/**
		 * This function constructs the API path to be sent to yahoo
		 *
		 * @param string $search_string
		 */
		public function searchQuery($search_string) {
			$this->search_url = 'http://boss.yahooapis.com/ysearch/'.$this->searchtype.'/v1/'.urlencode($search_string).'?appid='.$this->api;
			$this->search_url.= '&start='.$this->start;
			$this->search_url.= '&count='.$this->result_per_page;
			if($this->imageFilter != '') {
				$this->search_url.= '&filter='.$this->imageFilter.'&dimension='.$this->imageDimesion;
			}
			if($this->searchtype == 'news') {
			    $this->search_url.= '&age=60d';
			}
			
			$this->searchNow($this->search_url);
		}
		/**
		 * Used CURL to get the result
		 *
		 * @param string $qstr
		 */
		public function searchNow($qstr) {
		   require_once('lib/json/json.php');
			try {
			   $curl = curl_init($qstr);
			   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			   $result = curl_exec($curl);
			   $this->result = $result;
			   curl_close($curl);
			   if($this->result_format = 'json' && $this->requestType != 'ajax') {
				   $result = json_decode($result,0);
				   $this->processResult($result);
			   }
			   else {
			   	@unlink('cache/search.js');
			   	@file_put_contents('cache/search.js',$result);
			   }
			}
			catch(Exception $e) {
			    throw new Exception("Could not retreive result:",$e->getMessage(), "\n");
		    }			
		}
		/**
		 * Processes the result it obtained
		 *
		 * @param object $result
		 */
		
		public function processResult($result) {
 		try {
			   if(is_object($result->ysearchresponse) && $result->ysearchresponse->responsecode == self::SUCCESS ) {
				   $temp = $result->ysearchresponse;
				   if($temp->nextpage)
				       $this->next = $temp->nextpage;
				   if($temp->prevpage)
				       $this->previous = $temp->prevpage;
				   $this->totalhits = $temp->totalhits;
				   $this->start = $temp->start;
				   $this->result_per_page = $temp->count;
				   $this->deephit = $temp->deephits;
				   if($temp->count > 0) {
				       $this->total  = ceil($temp->totalhits/$temp->count);
				       $this->current = ceil($temp->start/$temp->count);
			       }
			       else {
			    	   $this->total = 0;
			    	   $this->current = 0;
			       }
				
				   if($this->searchtype == 'web') {
					   $this->search_results = $temp->resultset_web;
					   	$this->processResultsWeb();
						print_r($result,true); //no idea why it dosent work when this is removed.
				   }
				   elseif($this->searchtype == 'images') {
					   $this->search_results = $temp->resultset_images;
				   }
				   elseif($this->searchtype == 'news') {
					   $this->search_results = $temp->resultset_news;
				   }

			   }
			}
			catch(Exception $e) {
			    throw new Exception("Could not retreive result:",$e->getMessage(), "\n");
		    }
		}
		
		public function processResultsWeb(){
		
			global $id,$final;
			$resultArray = $this->search_results;
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
			$res->visibleUrl   = $result->dispurl;
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
		
		

}// Class ends

?>