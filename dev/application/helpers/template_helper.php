<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function get_template_directory($path, $dir_file){
		global $SConfig;

		$replace_path = str_replace('\\', '/', $path);
		$get_digit_doc_root = strlen($SConfig->_document_root);
		$full_path = substr($replace_path, $get_digit_doc_root);

		return $SConfig->_site_url.$full_path.'/'.$dir_file;
	}

	function get_template($view){
		$_this =& get_instance();

		return $_this->app->view($view);
	}

	function set_url($sub){
		$_this =& get_instance();
		if($_this->app->side == 'backend'){
			return site_url('admin/'.$sub);
		}
		else{
			return site_url($sub);
		}	
		
	}

	function is_active_menu($page,$class){
		$_this =& get_instance();
		if($page == $_this->uri->segment(2)){
			return $class;
		}
	}

	function title(){
		$_this =& get_instance();
		global $SConfig;

		$array_page = array(
			'konsumen'=> 'Konsumen',
			'Laporan' => 'Pelaporan',
			'permintaan' =>'Permintaan',
			'login' =>'Login',
			'akun' =>'Akun'
		);

		$title = NULL;
		if($_this->app->side == 'backend' && (array_key_exists($_this->uri->segment(2), $array_page))){
			return $array_page[$_this->uri->segment(2)].' : : '. $SConfig->_web_name ;
		}
	}

	function rupiah($angka){
	
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
	 
	}
