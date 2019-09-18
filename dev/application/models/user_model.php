<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends MY_Model {
	
	protected $_table_name = 'user';
	protected $_primary_key = 'id_user';
	protected $_order_by = 'id_user';
	protected $_order_by_type = 'DESC';

	public $rules = array(
		'username' => array(
            	'field' => 'username',
            	'label' => 'username',
            	'rules' => 'trim|required'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'password', 
			'rules' => 'trim|required|callback_password_check'
		)
	);
	public $rules_update = array(
		'username' => array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required'
		)
    );
    
    public $rules_register = array(
		'username' => array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required|callback_username_check'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		)
	);

	function __construct() {
		parent::__construct();
	}	
	
}