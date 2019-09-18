<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_Controller extends MY_Controller{

    function __construct(){
        parent::__construct();

        $this->load->helper(array('user_helper'));

        $this->app->side = 'backend';
        $this->app->template = 'purple';
        $this->app->is_logged_in();
    }
}