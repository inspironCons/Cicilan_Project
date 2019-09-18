<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tagihan_model extends MY_Model {

    protected $_table_name = 'tagihan';
	protected $_primary_key = 'id_tagihan';
	protected $_order_by = 'jatuhTempo';
	protected $_order_type = 'DESC';

    public $rules = array();

    
    function __construct() {
		parent::__construct();
	}

	function generate_faktur(){
		date_default_timezone_set("Asia/Jakarta");
		$this->db->select_max('noFaktur');
		$where= "noFaktur LIKE '%".date('dmy')."%'";
		$query= $this->get_by($where,NULL,NULL,TRUE);

		//rumusan nya
		
		if($query->noFaktur > 0){
			$last 		= $query->noFaktur; //mengambil angka terakhir di noFaktur
			$ambilLast	= substr($last, -3);
			$next 		= $ambilLast + 1;
			$hasil 		= str_pad($next,3,"0",STR_PAD_LEFT);
			
			return date('dmy').$hasil;
		}else{
			return date('dmy').'001';
		}

	}
	
	function getKonsumenDetail($where = NULL, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL){
		$this->db->select('{PRE}tagihan.id_tagihan, {PRE}tagihan.JatuhTempo, {PRE}tagihan.tanggalBayar,{PRE}tagihan.jumlah, {PRE}konsumen.*');
		$this->db->join('{PRE}konsumen', '{PRE}tagihan.id_konsumen  = {PRE}konsumen.id_konsumen', 'LEFT' );
		return parent::get_by($where,$limit,$offset,$single,$select);
	}
}