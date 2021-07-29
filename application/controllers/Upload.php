<?php
	class Upload extends CI_Controller 
	{ 
		public function index(){ 
			$this->load->view('vw_upload'); 
			} 
			public function upload_file(){ 
				$config['allowed_types'] = 'jpg|png'; 
				$config['upload_path'] = './uploads/';
				$this->load->library('upload',$config); 
				$this->load->library('upload',$config); 
				if ($this->upload->do_upload('image')) { 
					print_r($this->upload->data()); 
					} else { 
						print_r($this->upload->display_errors()); 

					}
				}	

	} 
?>
