<?php 

  /********************
   * @Format convert date from mm-dd-yyyy to yyyy-mm-dd
   * @Type   date || datetime
   * @Author Movent - Jerick Y. Duguran
   */
  function formatDate($date,$type = 'date', $sep = '/')
  {
	if($type == 'date')
	{
		$date = explode($sep,$date);
		if (count($date)){
			$date = $date[2].'-'.$date[0].'-'.$date[1];
		} 
	}else{   
		$date_time = explode(" ",$date);  
		$date 	   = explode($sep,$date_time[0]); 
		if (count($date)){
			$date = $date[2].'-'.$date[0].'-'.$date[1];
		}
		$date = $date." ".$date_time[1];
			
	} 	
	return $date; 
  }
  
  function decorateMenu($menu = "dashboard",$has_sub = false)
  {	
	$current_module = sfContext::getInstance()->getRequest()->getParameter("module","dashboard");
	$decoration     = '';
	
	if(is_array($menu)){
		if(in_array($current_module,$menu)){
			if($has_sub){
				$decoration = ' class="active has-sub"';
			}else{
				$decoration = ' class="active"';
			}
		}else{
			if($has_sub){
				$decoration = ' class="has-sub"';
			}
		}
	}else{
		if($current_module == $menu){
			if($has_sub){
				$decoration = ' class="active has-sub"';
			}else{
				$decoration = ' class="active"';
			}
		}else{
			if($has_sub){
				$decoration = ' class="has-sub"';
			}
		}
	}
	return $decoration;
  }
  //escape data
  function escapeData($data = "")
  {
	return str_replace(array("\r\n", "\n\r","\n","\r","\t")," ",$data);
  }
?>