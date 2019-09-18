<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Backend_controller{

		protected $user_detail;
		
    public function __construct(){
			parent::__construct();		
			$this->load->model(array('user_model'));
			date_default_timezone_set("Asia/jakarta");

		}
	public function index(){
			$data = array();
			$this->app->view('index', $data);	
  }

	public function logout(){
		$this->user_model->update(array('aktif'=> 'tidak aktif','terakhirMasuk'=> date('Y-m-d H:i:s')), array('id_user' => $this->session->userdata['ID']));
		
		delete_cookie('username');
		delete_cookie('password');
		$this->session->sess_destroy();
		redirect(set_url('logout'));
			
	}

	public function action($param){
		global $SConfig;
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
			if($param == 'tambah' || $param == 'ubah'){

					if($param == 'ubah'){
						$rules = $this->user_model->rules_update;					
					}
					else{
						$rules = $this->user_model->rules_register;
					}
					
					$this->form_validation->set_rules($rules);

					if ($this->form_validation->run() == TRUE) {
						
						$post = $this->input->post();
						$data = array(
								'username' => $post['username'],
								'password' => bCrypt($post['password'],12),							
								'dibuat'=>date('Y-m-d'),
								'terakhirMasuk' => null,							
								'aktif' => 'tidak aktif',
								'role'=>$post['role']
							);

						if($param == 'ubah'){
							unset($data['aktif']);
							unset($data['terkahirMasuk']);
							unset($data['dibuat']);

							if(!empty($post['password']) && !empty($post['passwordbase'])) {
								if($post['passwordbase'] == $post['password'] ){
									$data['password'] = bCrypt($post['password'],12);
								}else{
									$result = array('status' => 'password salah');
								}				}
							else{
								unset($data['password']);
							}

							$this->user_model->update($data, array('id_user' => $post['id']));
							$hasil = $data;
						}
						else{
							$this->user_model->insert($data);
							$hasil = $data;
						}
						
						$result = array('status' => 'success','hasil'=> $hasil);
					}
					else{
						$result = array('status' => 'failed', 'errors' => $this->form_validation->error_array());
					}

					echo json_encode($result);			
			}else if($param == 'ambil'){
				$post = $this->input->post();

				if(!empty($post['id'])){
					$record = $this->user_model->get($post['id']);
					echo json_encode(array('status' => 'success', 'data' => $record));
				}
				else{
					$offset = NULL;
					
					if(!empty($post['hal_aktif']) && $post['hal_aktif'] > 1){
						$offset = ($post['hal_aktif'] - 1) * $SConfig->_AppPerpage ;
					}

				
					$record = $this->user_model->get_by(NULL,$SConfig->_AppPerpage,$offset,FALSE,'id_user,username,role,terakhirMasuk,aktif');	
					$total_rows = $this->user_model->count();						
					

					echo json_encode(array(
						'record' => $record,
						'total_rows' => $total_rows, 
						'perpage' => $SConfig->_AppPerpage,
					) );					
				}	
			}else if($param == 'hapus'){
				$post = $this->input->post();
				if(!empty($post['id'])){
					$this->user_model->delete($post['id']);
					$result = array('status' => 'success');
				}

				echo json_encode($result);
			}
		}
	}

	public function password_check($str){
    	$user_detail =  $this->user_detail;
		if (@$user_detail->password == crypt($str,@$user_detail->password)){
			return TRUE;
		}else if(@$user_detail->password){
			$this->form_validation->set_message('password_check', 'Passwordnya Anda salah...');
			return FALSE;
		}else{
			$this->form_validation->set_message('password_check', 'Anda tidak punya akses Admin...');
			return FALSE;	
		}		
	}

	public function account(){
		$this->app->view('MY_Header');
		$this->app->view('pages/account/index');
		$this->app->view('MY_Footer');
	}

	public function username_check($str){
		/* bisa digunakan untuk mengecek ke dalam database nantinya */
		if ($this->user_model->count(array('username' => $str)) > 0){
            $this->form_validation->set_message('username_check', 'Username sudah digunakan, mohon diganti yang lain...');
            return FALSE;
        }
        else{
            return TRUE;
        }
	}	

	public function login(){
		
		/* tahap 3 finishing */
		$post = $this->input->post(NULL, TRUE);
		
		if(isset($post['username']) ){ 
			$this->user_detail = $this->user_model->get_by(array('username' => $post['username']), 1, NULL, TRUE);
		}

		$this->form_validation->set_message('required', '%s kosong, tolong diisi!');
		
		$rules = $this->user_model->rules;
		$this->form_validation->set_rules($rules);	

		if($this->form_validation->run() == FALSE){	
				$this->app->view('index');
    }else{
			$login_data = array(
							'ID' => $this->user_detail->id_user,
			        'username'  => $post['username'],			        
			        'logged_in' => TRUE,
			        'active' => $this->user_detail->aktif,
			        'last_login' => $this->user_detail->terakhirMasuk,
			);						

			$this->session->set_userdata($login_data);

			if(isset($post['remember']) ){
				$expire = time() + (86400 * 7);
				set_cookie('username', $post['username'], $expire , "/");
				set_cookie('password', $post['password'], $expire , "/" );
			}
			$update = array(
				'aktif' => 'aktif',
				'terakhirMasuk' => date('Y-m-d H:i:s')
			);

			$this->user_model->update($update,array('id_user'=> $login_data['ID']));
			redirect(set_url('konsumen'));
        }
    }
}