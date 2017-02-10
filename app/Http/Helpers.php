<?php
	
	//Inverso funzione slug (seo)
	function r_slug($str){
		return str_replace("-", " ", $str);
	}

	//Ora ore:minuti:secondi
	function ora(){
		return "[Ora: ".date('H:i:s')."] ";
	}
	
	//Data per inserimento database
	function db_data($data){
		$data=explode('/', $data);
		return $data[2].'/'.$data[1].'/'.$data[0];
	}
	
	//Data per view
	function vw_data($data){
		$data=explode('-', $data);
		return $data[2].'/'.$data[1].'/'.$data[0];
	}
	
	//Timestamp per view
	function vw_timestamp($timestamp){
		$data=explode(' ', $timestamp);
		$data[0]=vw_data($data[0]);
		return implode(' ', $data);
	}

	function check_active_url($url){
		$check=explode('/', url()->current());
		return $url === $check[3];
	}
?>