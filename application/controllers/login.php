<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class login extends CI_Controller {
	
	public function index($errorcode=null)
	{
		$this->load->library('user_agent');
		if($this->input->cookie('ph_logged_in', TRUE)) {
			redirect('home/main');
			exit();
		}
		if(!$this->input->cookie('ph_legacysupport')&&$this->agent->is_browser('Internet Explorer')&&$this->agent->version()<=7){
			redirect('sp/update_browser');
			exit();
		}
		$this->load->view('0_header', array('page'=>'login'));
		$this->load->view('1_logo');
		$this->load->view('2_sidebar');
		$this->load->view('3_1_container_login', array('errorcode'=>$errorcode));
		$this->load->view('4_footer');
	}
	
	public function action()
	{
		$this->load->library('user_agent');
		if($this->input->post('submit')){
			$stuid=$this->input->post('stuid');
			$pwd=$this->input->post('pwd');
			if(empty($stuid)||empty($pwd)){
				redirect('login/index/e1');
			}elseif(!$this->input->cookie('ph_legacysupport')&&$this->agent->is_browser('Internet Explorer')&&$this->agent->version()<=7){
				redirect('sp/update_browser');
			}elseif($this->tjyfz_api->get($stuid, $pwd, date('Ymd'))=='-1'){
				redirect('login/index/e2');
			}else{
				$pwd=$this->encrypt->encode($pwd);
				$expire=0;
				if($this->input->post('autologin')){
					$expire=2592000;
				}
				$this->input->set_cookie('logged_in', TRUE, $expire);
				$this->input->set_cookie('stuid', $stuid, $expire);
				$this->input->set_cookie('pwd', $pwd, $expire);
				redirect(site_url());
			}
		}
	}
	
	public function logout()
	{
		delete_cookie("pwd");
		delete_cookie('stuid');
		delete_cookie('logged_in');
		redirect(site_url());
	}
}
