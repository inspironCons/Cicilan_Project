<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App{
	public $side;
    public $template;

    function view($pages,$data=NULL){
        $_this =& get_instance();
        if($data){
            $_this->load->view($this->template.'/'.$pages,$data);
        }else{
            $_this->load->view($this->template.'/'.$pages);            
        }
    }

	function is_logged_in(){
		$_this =& get_instance();
		$user_session = $_this->session->userdata;
		if($this->side == 'backend'){
			if($_this->uri->segment(2) == 'login'){
				if(isset($user_session['logged_in']) && $user_session['logged_in'] == TRUE && $user_session['active'] == 'aktif'){
					redirect(set_url('konsumen'));
				}
			}
			else{
				if(!isset($user_session['logged_in'])){
					$_this->session->sess_destroy();
					redirect(set_url('login'));
				}
			}
		}
		else{
			if(!isset($user_session['logged_in'])){
				$_this->session->sess_destroy();
				redirect(set_url('user/login'));
			}
		}
	}
}