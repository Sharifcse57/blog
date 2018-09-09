<?php

 function str_spacecase($slug){
    return str_replace(['-', '_'], " ", $slug);
 }

 function check_menu_active($current_location,$optionsArr){
		$condition = false;

		list($current['controller'], $current['action']) = explode('@', $current_location);	
	
		if( in_array($current_location,$optionsArr) == true || in_array( $current['controller'],$optionsArr) == true){
			$condition = true;
		} 	

		if($condition == true){
			return 'in '.str_replace('@','_', $current_location);
		}
	}

//show value with format
function showDateWithFormat($value) {
        return Carbon\Carbon::parse($value)->format('d/m/Y H:i');
    }
  //get value from input field
function getDateFormInput($value){
        return Carbon\Carbon::parse($value)->format('Y-m-d');
    }

 function mystudy_case($value){
      return ucwords(str_replace(['-', '_'], ' ', $value));
 }

 function transLangs($static_langs=array(),$params='params',$langsName='1'){
 	$data=str_slug($params,'_'); 	
	if(array_has($static_langs,$langsName.'.'.$data)){
		return $static_langs[$langsName][$data];
	}else{
		return $params;
	};
 }

function checkMenuActive($needle,$haystackArr){
	if(is_array($needle)){
		$result = array_intersect($needle, $haystackArr);
		if(count($result) > 0){
			return true;
		}
	}else{
		if(in_array($needle, $haystackArr)){
			return true;
		}
	}
	return false;
}

function get_file_name($string) {
    // Transliterate non-ascii characters to ascii
    $str = trim(strtolower($string));
    $str = iconv('UTF-8', 'ISO-8859-1//IGNORE', $str);

    // Do other search and replace
    $searches = array(' ', '&', '/');
    $replaces = array('-', 'and', '-');
    $str = str_replace($searches, $replaces, $str);

    // Make sure we don't have more than one dash together because that's ugly
    $str = preg_replace("/(-{2,})/", "-", $str );

    // Remove all invalid characters
    $str = preg_replace("/[^A-Za-z0-9-.]/", "", $str );

    // Done!
    return $str;
}

function setCurrency($currencyObj=null,$current_language,$priceVal=null){
	if($currencyObj){
		$symbol = $currencyObj->$current_language->symbol;
		$position = $currencyObj->$current_language->position;
		if($priceVal && $position =='left'){
			return $symbol .' '.$priceVal;
		}elseif($priceVal && $position =='right'){
			return $priceVal.' '.$symbol;
		}else{
			return '';
		}
	}
}

?>