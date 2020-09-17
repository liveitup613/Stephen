<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageWhatWeDo extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		
		parent::__construct();
		date_default_timezone_set('EST');
	}

	public function index()
	{		
		$this->db->select('*');
		$this->db->from('tblwhatwedo');
		$data['services'] = $this->db->get()->result_array();
        $this->load->view('be/whatwedo/index', $data);
	}
	
	public function addNewService() {
		$date = time();
        $avatar = "";

        $service_data = array(
            'Title' => $this->input->post('Title'),
			'Content' => $this->input->post('Content'),
			'Enable' => 'YES'            
        );

        if (!empty($_FILES["Portfolio"]["name"])) {
            $config['upload_path'] = 'assets/images/whatwedo/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['overwrite'] = true;
            $config['file_name'] = 'portfolio'.$date;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('Portfolio')) {
                $error =  $this->upload->display_errors();
                echo json_encode(array('message' => $error, 'success' => false));
                return;
            }
            $data = $this->upload->data();
            $avatar = $data['file_name'];
        }

        $service_data['Portfolio'] = $avatar;

		$this->db->set($service_data);
		$Id = $this->db->insert('tblwhatwedo');

		if ($Id == 0)
			echo json_encode(array(
				'success' => false,
			));
		else 		
        	echo json_encode(array(
				'success' => true
			));
	}

	public function updateService() {
		$ID = $this->input->post('ID');
		$Enable = $this->input->post('Enable');

		$this->db->where('ID', $ID);
		$this->db->set('Enable', $Enable);
		$this->db->update('tblwhatwedo');

		echo json_encode(array(
			'success' => true
		));
	}

	public function deleteService() {
		$ID = $this->input->post('ID');

		$this->db->where('ID', $ID);
		$this->db->from('tblwhatwedo');
		$service = $this->db->get()->row_array();
		if ($service == null) {
			echo json_encode(array(
				'success' => false
			));
		}

		if (!empty($service['Portfolio']) && file_exists('assets/images/whatwedo/'.$service['Portfolio'])) {
			unlink('assets/images/whatwedo/'.$service['Portfolio']);
		}

		$this->db->where('ID', $ID);
		$this->db->delete('tblwhatwedo');
		$deletedCnt = $this->db->affected_rows();

		if ($deletedCnt == 0) {
			echo json_encode(array(
				'success' => false
			));
		}
		else {
			echo json_encode(array(
				'success' => true
			));
		}		
	}
}