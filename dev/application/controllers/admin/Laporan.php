<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends Backend_controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper(array());
        $this->load->model(array('tagihan_model'));
        $this->load->library(array());
    }
    public function index(){
        $data = array();
        $this->app->view('MY_header');
		$this->app->view('pages/laporan/index',$data);
		$this->app->view('MY_Footer');
    }

    public function action($filter){
        global $SConfig;
        date_default_timezone_set("Asia/jakarta");
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            if($filter == 'ambil'){
                $AppPerpage = 30;
                $post = $this->input->post(NULL,TRUE);
                $total_rows = $this->tagihan_model->count();
                $offset = NULL;
                
                if(!empty($post['hal_aktif']) && $post['hal_aktif'] > 1 ){
                    $offset = ($post['hal_aktif'] - 1) * $AppPerpage ;
                }

                if(!empty($post['start']) && !empty($post['end']) && $post['start'] !='null' && $post['end'] !='null'){
                    $start = date("Y-m-d",$post['start']);
                    $end = date("Y-m-d",$post['end']);
                    $total_rows = $this->tagihan_model->count(array(
                        'keterangan' => $post['kategori'],
                        'jatuhTempo >=' =>  $start,
                        'JatuhTempo <=' => $end
                    ));
                    $record    = $this->tagihan_model->getKonsumenDetail(array(
                        'keterangan' => $post['kategori'],
                        'jatuhTempo >=' => $start,
                        'JatuhTempo <=' => $end
                    ),$AppPerpage,$offset);
                }elseif(!empty($post['kategori']) && $post['kategori'] !='null' ){
                    $total_rows = $this->tagihan_model->count(array(
                        'keterangan' => $post['kategori']));
                    $record    = $this->tagihan_model->getKonsumenDetail(array(
                        'keterangan' => $post['kategori']
                    ),$AppPerpage,$offset);
                }
                else{
                    $record = $this->tagihan_model->getKonsumenDetail(null,$AppPerpage,$offset);
                }

                echo json_encode(array(
                    'total_rows' => $total_rows,
                    'perpage' => $AppPerpage,
                    'data' => $record,
                ));
            }
        }
    }
}