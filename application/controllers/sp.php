<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class sp extends CI_Controller {
	
	public function privacy()
	{
		$this->load->view('0_header');
		$this->load->view('1_logo');
		$this->load->view('2_sidebar');
		$this->load->view('3_3_container_privacy');
		$this->load->view('4_footer');
	}
	public function aboutus()
	{
		$this->load->view('0_header');
		$this->load->view('1_logo');
		$this->load->view('2_sidebar');
		$this->load->view('3_4_container_aboutus');
		$this->load->view('4_footer');
	}
	
	public function updatelog()
	{
		$this->load->view('0_header');
		$this->load->view('1_logo');
		$this->load->view('2_sidebar');
		$this->load->view('3_5_container_updatelog');
		$this->load->view('4_footer');
	}
	public function update_browser(){
		$this->load->library('user_agent');
		if(!$this->agent->is_browser('Internet Explorer')||$this->agent->version()>7){
			$this->input->set_cookie('legacysupport', TRUE, 604800);
		}
		if($this->input->post('submit')){
			$this->input->set_cookie('legacysupport', TRUE, 604800);
			redirect();
		}elseif($this->input->cookie('ph_legacysupport')){
			redirect();
		}else{
			$this->load->view('update_browser');
		}
	}
}
