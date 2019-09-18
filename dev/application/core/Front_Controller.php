<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_Controller extends MY_Controller{

    function __construct(){
        parent::__construct();

        $this->load->helper(array());
        $this->load->model(array());
        $this->load->library(array());


        $this->app->side = 'front';
        $this->app->template = 'front';
    }
}