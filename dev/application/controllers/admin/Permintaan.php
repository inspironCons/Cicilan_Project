<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class permintaan extends Backend_controller {
    public function __construct(){
		parent::__construct();
		$this->load->model(array('konsumen_model','request_model'));
		$this->load->helper(array('tanggalIndo_helper'));
    }
    public function index()
	{	
		$data= array();
		$this->app->view('MY_Header');
		$this->app->view('pages/permintaan/index',$data);
		$this->app->view('MY_Footer');
    }

    public function action($param){
        global $SConfig;
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            if($param=='ambil'){
                $post = $this->input->post(NULL,TRUE);
                if(!empty($post['id'])){		
                    echo json_encode(array(
                        'status' => 'success',
                        'data'=> $this->request_model->get($post['id'])
                    ));
                }else{
                    $total_rows = $this->request_model->count();
                    $offset = NULL;
    
                    if(!empty($post['hal_aktif']) && $post['hal_aktif'] > 1 ){
                        $offset = ($post['hal_aktif'] - 1) * $SConfig->_AppPerpage ;
                    }
    
                    $record = $this->request_model->get_by(array('status'=>'pending'),$SConfig->_AppPerpage ,$offset);
                    echo json_encode(
                        array(
                            'total_rows' => $total_rows,
                            'perpage' => $SConfig->_AppPerpage,
                            'record'=> $record
                        )
                        
                    );
                }
               
            }else if($param == 'ubah'){
                $post = $this->input->post(NULL,TRUE);
            
                $this->request_model->update(array('status'=>'success'), array('id_request' => $post['id']));
				$result = array('status' => 'success');
            }
        }
    }
}
    
