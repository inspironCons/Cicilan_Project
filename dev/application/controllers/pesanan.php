<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pesanan extends Front_Controller {
    public function __construct(){
        parent::__construct();
		$this->load->model(array('request_model'));
        
    }

    public function index(){
        global $SConfig;
        $data['title']= $SConfig->_web_name;
		$this->app->view('header',$data);
		$this->app->view('pesan', $data);
		$this->app->view('footer');
    }

    public function action($param){
        global $SConfig;
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            if($param =='tambah'){
                $rules = $this->request_model->rules;

                $this->form_validation->set_rules($rules);
                if($this->form_validation->run() == TRUE){

                    $post = $this->input->post();
                    $data = array(
                        "nama" => $post['name'],
                        "ktp" => $post['ktp'],
                        "telpon" => $post['kontak'],
                        "pesanan" => json_encode($post['menu']),
                        "keterangan" => $post['keterangan'],
                        "status" => 'pending'
                    );
                    $this->request_model->insert($data);
                    $result = array('status' => 'success');	
                }else{
                    $result = array('status' => 'failed', 'errors' => $this->form_validation->error_array());
                }
                echo json_encode($result);
                
            }
        }
    }
}