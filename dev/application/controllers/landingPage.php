<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class landingPage extends Front_Controller {
    public function __construct(){
        parent::__construct();
        
    }
    
    public function index(){
        global $SConfig;
        $data['title']= $SConfig->_web_name;
		$this->app->view('header',$data);
		$this->app->view('index', $data);
		$this->app->view('footer');
    }
    
    public function menu(){
        global $SConfig;
        $data['title']= $SConfig->_web_name;
        $this->app->view('header',$data);
		$this->app->view('menu', $data);
		$this->app->view('footer');
    }

    public function about(){
        global $SConfig;
        $data['title']= $SConfig->_web_name;
        $this->app->view('header',$data);
		$this->app->view('about', $data);
		$this->app->view('footer');
    }
}