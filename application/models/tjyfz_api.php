<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class tjyfz_api extends CI_Model {
	
	public function get($stuid, $pwd, $date)
	{
		$curlPost = 'xsid=' . urlencode($stuid) . '&pwd=' . urlencode($pwd) . '&rq=' . $date;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://www.tjyfz1.edu.sh.cn/cjcx/andr_gzsd/asp/ye_xs.asp');
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 0); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
		$data = curl_exec($ch);
		curl_close($ch);
		if(empty($data)){
			return '-1';	//Login error
		}elseif($data=='2'){
			return '0';		//No homework that day
		}else{
			$homeworks = explode('*$*', $data);
			unset($homeworks[0]);
			return $homeworks;
		}
	}
}
