<?


//---------------------------------------------------------------------------
 function verifyStart($start)
  { 
   $flag = 0;
   
   //if($start =="" || !isset($start) || empty($start))
    //$flag = 1;
	if($start > 1000 || $start < 0)
	 $flag = 1;
	 
	if(empty($start))
      return(0);	
	  
	if($flag == 1)
	  $start = 0;
	  
   return($start);
  }
//---------------------------------------------------------------------------
 function verifyCount($count)
  { 
   $flag = 0;
   
   if($count == "" || !isset($count) || empty($count))
    $flag = 1;
	if($count > 1000 || $count < 0)
	 $flag = 1;
	 
	if($flag == 0)
	  $count = $count;

	if($flag == 1)
	  $count = 10;
	  
   return($count);
  }
//---------------------------------------------------------------------------
 function verifyWeight($weight,$default=100)
  { 
   //if($weight == "" || !isset($weight) || empty($weight))
   // $flag = 1;
 	if($weight > 1000)
		$weight = 1000;

 	if($weight < 0)
		$weight = 0;

	if(empty($weight))
       return($default);
	  
	if($weight == "")
	 return($default);
	   
 
   return($weight);
  }
  
  
?>