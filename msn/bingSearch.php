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
  
  http://api.search.live.net/xml.aspx?Appid=D373FB14231783B3B24148EA9C5AAE26D468744D&query=sushi&sources=web&web.count=1
==================================================================
*/


class bingSearch {
       /**
        * @access  private
        */
	    private $result_format	= 'xml';
	    private $rcode = '';
		private $previous = '';
		private $next = '';
		private $search_url = 'http://api.search.live.net/xml.aspx?';
		private $query = '';
		private $deephit = '';		
		private $imageFilter;
		private $imageDimesion;
		private $requestType;
		
		/**
		 * @access public
		 */
		public $name = 'Msn';
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
			$this->searchtype = 'web';
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
			$this->search_url = 'http://api.search.live.net/xml.aspx?';
			$this->search_url.= '&Appid='.$this->api;			
			$this->search_url.= "&query=".urlencode($search_string);
			$this->search_url.= "&sources=".$this->searchtype;
			if($this->searchtype=="web")
			 {
				$this->search_url.= '&web.offset='.$this->start;
				$this->search_url.= '&web.count='.$this->result_per_page;
			 }
			else if($this->searchtype=="images")
			 {
			  $this->search_url.= '&mms.offset='.$this->start;
			  $this->search_url.= '&mms.count='.$this->result_per_page;
			 } 
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
			try {
			   $curl = curl_init($qstr);
			   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			   $result = curl_exec($curl);
			   $this->result = $result;
			   curl_close($curl);
			   if($this->result_format == 'json' && $this->requestType != 'ajax') {
				   $result = json_decode($result,0);
				   $this->processResult($result);
			   }
			   else if($this->result_format == 'xml' && $this->requestType != 'ajax') {
			     xml2array($result, $get_attributes=1, $priority = 'tag'); 
				 //echo "<pre>";
				// echo "query strinr :- $qstr
				// ";
				 //print_r(xml2array($result,1));
				 //die("dying");
				  $this->processResult(xml2array($result,1)); 
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
				$temp = $result['SearchResponse']['web:Web'];
				   $this->totalhits = $temp['web:Total'];
				   $this->start = $temp['web:Offset'];

				   if($this->searchtype == 'web') {
					   $this->search_results = $temp['web:Results'];
					   	$this->processResultsWeb();
						//print_r($result,true); //no idea why it dosent work when this is removed.
				   }
				   elseif($this->searchtype == 'images') {
					   $this->search_results = $temp->resultset_images;
				   }
				   elseif($this->searchtype == 'news') {
					   $this->search_results = $temp->resultset_news;
				   }
			}
			catch(Exception $e) {
			    throw new Exception("Could not retreive result:",$e->getMessage(), "\n");
		    }
		}
		
		public function processResultsWeb(){
		
			global $id,$final;
			$resultArray = $this->search_results;
			$resultArray = $resultArray['web:WebResult'];
			$total = count($resultArray);
		
		//arrange properly as a search result object
		for($i=0;$i<$total;$i++)
		{
			$result = $resultArray[$i];

			$foundId = inFinalMsn($result);
			if($foundId == -99) //not already found by another search engine.
			{
			$res = new SearchResult; 
			$res->id = $id; $id++;
			$res->title = $result['web:Title'];
			$res->url   = $result['web:Url'];
			$res->visibleUrl   = $result['web:Url'];
			$res->summary   = $result['web:Description'];
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




function xml2array($contents, $get_attributes=1, $priority = 'tag') { 
    if(!$contents) return array(); 

    if(!function_exists('xml_parser_create')) { 
        //print "'xml_parser_create()' function not found!"; 
        return array(); 
    } 

    //Get the XML parser of PHP - PHP must have this module for the parser to work 
    $parser = xml_parser_create(''); 
    xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss 
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0); 
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1); 
    xml_parse_into_struct($parser, trim($contents), $xml_values); 
    xml_parser_free($parser); 

    if(!$xml_values) return;//Hmm... 

    //Initializations 
    $xml_array = array(); 
    $parents = array(); 
    $opened_tags = array(); 
    $arr = array(); 

    $current = &$xml_array; //Refference 

    //Go through the tags. 
    $repeated_tag_index = array();//Multiple tags with same name will be turned into an array 
    foreach($xml_values as $data) { 
        unset($attributes,$value);//Remove existing values, or there will be trouble 

        //This command will extract these variables into the foreach scope 
        // tag(string), type(string), level(int), attributes(array). 
        extract($data);//We could use the array by itself, but this cooler. 

        $result = array(); 
        $attributes_data = array(); 
         
        if(isset($value)) { 
            if($priority == 'tag') $result = $value; 
            else $result['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode 
        } 

        //Set the attributes too. 
        if(isset($attributes) and $get_attributes) { 
            foreach($attributes as $attr => $val) { 
                if($priority == 'tag') $attributes_data[$attr] = $val; 
                else $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr' 
            } 
        } 

        //See tag status and do the needed. 
        if($type == "open") {//The starting of the tag '<tag>' 
            $parent[$level-1] = &$current; 
            if(!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag 
                $current[$tag] = $result; 
                if($attributes_data) $current[$tag. '_attr'] = $attributes_data; 
                $repeated_tag_index[$tag.'_'.$level] = 1; 

                $current = &$current[$tag]; 

            } else { //There was another element with the same tag name 

                if(isset($current[$tag][0])) {//If there is a 0th element it is already an array 
                    $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result; 
                    $repeated_tag_index[$tag.'_'.$level]++; 
                } else {//This section will make the value an array if multiple tags with the same name appear together 
                    $current[$tag] = array($current[$tag],$result);//This will combine the existing item and the new item together to make an array 
                    $repeated_tag_index[$tag.'_'.$level] = 2; 
                     
                    if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well 
                        $current[$tag]['0_attr'] = $current[$tag.'_attr']; 
                        unset($current[$tag.'_attr']); 
                    } 

                } 
                $last_item_index = $repeated_tag_index[$tag.'_'.$level]-1; 
                $current = &$current[$tag][$last_item_index]; 
            } 

        } elseif($type == "complete") { //Tags that ends in 1 line '<tag />' 
            //See if the key is already taken. 
            if(!isset($current[$tag])) { //New Key 
                $current[$tag] = $result; 
                $repeated_tag_index[$tag.'_'.$level] = 1; 
                if($priority == 'tag' and $attributes_data) $current[$tag. '_attr'] = $attributes_data; 

            } else { //If taken, put all things inside a list(array) 
                if(isset($current[$tag][0]) and is_array($current[$tag])) {//If it is already an array... 

                    // ...push the new element into that array. 
                    $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result; 
                     
                    if($priority == 'tag' and $get_attributes and $attributes_data) { 
                        $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data; 
                    } 
                    $repeated_tag_index[$tag.'_'.$level]++; 

                } else { //If it is not an array... 
                    $current[$tag] = array($current[$tag],$result); //...Make it an array using using the existing value and the new value 
                    $repeated_tag_index[$tag.'_'.$level] = 1; 
                    if($priority == 'tag' and $get_attributes) { 
                        if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well 
                             
                            $current[$tag]['0_attr'] = $current[$tag.'_attr']; 
                            unset($current[$tag.'_attr']); 
                        } 
                         
                        if($attributes_data) { 
                            $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data; 
                        } 
                    } 
                    $repeated_tag_index[$tag.'_'.$level]++; //0 and 1 index is already taken 
                } 
            } 

        } elseif($type == 'close') { //End of tag '</tag>' 
            $current = &$parent[$level-1]; 
        } 
    } 
     
    return($xml_array); 
} 

?>