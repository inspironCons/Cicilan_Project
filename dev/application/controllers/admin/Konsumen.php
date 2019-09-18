<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends Backend_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('konsumen_model','tagihan_model'));
		$this->load->helper(array('tanggalIndo_helper'));
	}
	public function index()
	{	
		$data= array();
		$this->app->view('MY_Header');
		$this->app->view('pages/konsumen/index',$data);
		$this->app->view('MY_Footer');
	}

	public function action($param){
		global $SConfig;
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
			if($param == 'ambil'){
				$post = $this->input->post(NULL,TRUE);
				if(!empty($post['id'])){		
						echo json_encode(array(
							'status' => 'success',
							'data'=> $this->konsumen_model->get($post['id'])
						));
				}else{
					$total_rows = $this->konsumen_model->count();
					
					$offset = NULL;
					if(!empty($post['hal_aktif']) && $post['hal_aktif'] > 1 ){
						$offset = ($post['hal_aktif'] - 1) * $SConfig->_AppPerpage ;
					}	
						$record = $this->konsumen_model->get_by(NULL,$SConfig->_AppPerpage ,$offset);
						//var_dump($recod);
						echo json_encode(
							array(
								'total_rows' => $total_rows,
								'perpage' => $SConfig->_AppPerpage,
								'record'=> $record
							)
							
						);
				}
			}elseif($param == 'tambah' || $param == 'ubah'){
				$rules = $this->konsumen_model->rules;
				$this->form_validation->set_rules($rules);
				
				if($this->form_validation->run() == TRUE){
					$post = $this->input->post();
					
					$data = array(
						'nama' => $post['nama'],
						'alamat' => $post['alamat'],
						'telpon' => $post['telpon'],
						'harga' => filter_var( str_replace(".", "", $post['harga']), FILTER_SANITIZE_NUMBER_INT)
					);

					if($param == 'ubah'){
						$this->konsumen_model->update($data, array('id_konsumen' => $post['id']));
						$result = array('status' => 'success');
					}else{
						$getID = $this->konsumen_model->insert($data);
						
						if(!empty($getID)){
							// Membuat Array untuk menampung bulan bahasa indonesia
							$bulanIndo = array(
								'01' => 'Januari',
								'02' => 'Februari',
								'03' => 'Maret',
								'04' => 'April',
								'05' => 'Mei',
								'06' => 'Juni',
								'07' => 'Juli',
								'08' => 'Agustus',
								'09' => 'September',
								'10' => 'Oktober',
								'11' => 'November',
								'12' => 'Desember'
							);
							
							
							for($i=0; $i<$post['cicilan']; $i++){
								//membuat tanggal jatuh tempo nya setiap tanggal 10
								$jatuhtempo = date( "Y-m-d", strtotime( "+$i week", strtotime($post['jatuhTempo']) ) );
	
								$bulan = $bulanIndo[date('m', strtotime($jatuhtempo))]." ".date('Y',strtotime($jatuhtempo));
	
								$data_detail_tagihan = array(
										'id_konsumen' => $getID,
										'jatuhTempo' => $jatuhtempo,
										'jumlah'=> filter_var( str_replace(".", "", $post['jumlah']), FILTER_SANITIZE_NUMBER_INT),	
										'id_admin' =>1,
										'keterangan' => 'BELUM'							
								);
	
								$this->tagihan_model->insert($data_detail_tagihan);
	
							}
	
							$result = array('status' => 'success');	
						}else{
							$result = array('status' => 'failed');
						}
					}
				}else{
					$result = array('status' => 'failed', 'errors' => $this->form_validation->error_array());
				}
				echo json_encode($result);
			}elseif($param == 'hapus'){
				$post = $this->input->post(NULL,TRUE);
				if(!empty($post['id'])){
					$this->konsumen_model->delete($post['id']);
					$this->tagihan_model->delete_by(array('id_konsumen'=> $post['id']));
					$result = array('status' => 'success');
				}

				echo json_encode($result);
			}elseif($param == 'detail'){
				$post = $this->input->post();
				if(!empty($post['id'])){
					echo json_encode(array(
						'status' => 'success',
						'data'=> $this->tagihan_model->get_by(array('id_konsumen'=> $post['id']) )
					));
				}
				
				
			}elseif($param == 'bayar'){
				$id = $_REQUEST['id'];
				$data = array(
					'noFaktur' => $this->tagihan_model->generate_faktur(),
					'tanggalBayar' => date('y-m-d'),
					'keterangan' => 'BAYAR'
				);
				$this->tagihan_model->update($data,array('id_tagihan'=> $id));
				$result = array('status'=> 'success');

				echo json_encode($result);
			}
		}
	}

	public function invoice(){
		$id			= $_GET['no'];
		$idKonsumen = $_GET['id'];

		$data = json_encode(array(
			'dataTagihan' => $this->tagihan_model->get($id),
			'datakonsumen' => $this->konsumen_model->get($idKonsumen)
		),JSON_PRETTY_PRINT);
				
		$json['data'] = json_decode($data,true);
		
		$this->app->view('pages/invoice/invoice',$json);
		$this->app->view('MY_Footer');
	}
}
