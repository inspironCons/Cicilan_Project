<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class konsumen_model extends MY_Model {
	
	protected $_table_name = 'konsumen';
	protected $_primary_key = 'id_konsumen';
	protected $_order_by = 'id_konsumen';
	protected $_order_type = 'DESC';

	public $rules = array(
		'nama' => array(
			'field' => 'nama', 
			'label' => 'nama', 
			'rules' => 'trim|required'
        ),
		'alamat' => array(
			'field' => 'alamat', 
			'label' => 'alamat', 
			'rules' => 'trim|required'
        ),
		'telpon' => array(
			'field' => 'telpon', 
			'label' => 'telpon', 
			'rules' => 'trim|required'
        ),
		'harga' => array(
			'field' => 'harga', 
			'label' => 'harga', 
			'rules' => 'trim|required'
        )
	);

	function __construct() {
		parent::__construct();
	}	
    
}