<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class home extends CI_Controller {
	public function index() {
		if($this->input->cookie('ph_logged_in', TRUE)) {
			redirect('home/main');
		} else {
			redirect('login');
		}
	}
	
	public function main($date=null, $direction='past')	//$date参数传入日期；$direction参数传入查询方向，值为'past','next','customized'
	{
		$this->load->library('user_agent');
		if(!$this->input->cookie('ph_logged_in', TRUE)){
			redirect('login');
			exit();
		}
		if(!$this->input->cookie('ph_legacysupport')&&$this->agent->is_browser('Internet Explorer')&&$this->agent->version()<=7){
			redirect('sp/update_browser');
			exit();
		}
		$today=FALSE;
		$latest_no_work=FALSE;
		$stuid=$this->input->cookie('ph_stuid', TRUE);
		$pwd=$this->input->cookie('ph_pwd', TRUE);
		$pwd=$this->encrypt->decode($pwd);
		if(empty($date)){
			$date=date('Ymd');
			$today=TRUE;
		}
		$date=strtotime($date);
		if($direction!='customized'){	//如果选择日期即跳过查询可用时间戳
			$i=0;
			while(TRUE){
				$requestdate=date('Y-m-d', $date);
				if($this->tjyfz_api->get($stuid, $pwd, $requestdate)=='0'){
					if($direction=='past'){
						$date=$date-86400;
					} elseif($direction=='next') {
						$date=$date+86400;	//实际可用的时间戳
					} else {
						echo '参数错误';
					}
					$i+=1;
					if($i>10){
						$date=time();
						$recent_no_work=TRUE;
						break;
					}
				}else{
					break;
				}
			}
		}
		$apidate=date('Y-m-d', $date);	//API用，最新有作业的天数
		$homework=$this->tjyfz_api->get($stuid, $pwd, $apidate);
		$data=array('date'=>$date, 'homework'=>$homework, 'page'=>'home', 'today'=>$today, 'recent_no_work'=>$recent_no_work);
		$this->load->view('0_header', $data);
		$this->load->view('1_logo', $data);
		$this->load->view('2_sidebar', $data);
		$this->load->view('3_2_container_home', $data);
		$this->load->view('4_footer', $data);
	}

	public function tjyfz(){
		if(!$this->input->cookie('ph_logged_in', TRUE)){
			redirect('login');
			exit();
		}
		header('Expires: 0');
		header('Last-Modified: '. gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: no-store, no-cahe, must-revalidate');
		//for IE
		header('Cache-Control: post-chedk=0, pre-check=0', false);
		//for HTTP/1.0
		header('Pragma: no-cache');
		header('P3P: CP="CAO DSP COR CUR ADM DEV TAI PSA PSD IVAi IVDi CONi TELo OTPi OUR DELi SAMi OTRi UNRi PUBi IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE GOV"');
		delete_cookie('cok', 'www.tjyfz.edu.sh.cn', '/cjcx');
		$stuid=$this->input->cookie('ph_stuid', TRUE);
		$pwd=$this->input->cookie('ph_pwd', TRUE);
		$pwd=$this->encrypt->decode($pwd);
		$data=array('stuid'=>$stuid, 'pwd'=>$pwd);
		$this->load->view('tjyfz_login', $data);
	}
}
