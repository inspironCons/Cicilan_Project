<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class request_model extends MY_Model {
	
	protected $_table_name = 'request_cicilan';
	protected $_primary_key = 'id_request';
	protected $_order_by = 'date';
	protected $_order_type = 'DESC';

	public $rules = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'nama', 
			'rules' => 'trim|required'
        ),
		'ktp' => array(
			'field' => 'ktp', 
			'label' => 'ktp', 
			'rules' => 'trim|required|min_length[16]|max_length[16]|numeric'
        ),
		'telpon' => array(
			'field' => 'kontak', 
			'label' => 'kontak',
			'rules' => 'trim|required|min_length[10]|numeric'
        ),
		'menu' => array(
			'field' => 'menu[]', 
			'label' => 'menu', 
			'rules' => 'trim|required'
        ),
		'keterangan' => array(
			'field' => 'keterangan', 
			'label' => 'keterangan', 
			'rules' => 'trim|required'
        ),
	);

	function __construct() {
		parent::__construct();
	}
    
}