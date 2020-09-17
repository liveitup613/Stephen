<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageJoinUs extends CI_Controller {

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
		$this->db->from('tbljobs');
		$data['jobs'] = $this->db->get()->result_array();
        $this->load->view('be/joinus/index', $data);
    }

    public function edit($id) {
        if ($id != 0) {
			$this->db->select('*');
			$this->db->where('ID', $id);
			$this->db->from('tbljobs');
			$job = $this->db->get()->row_array();
			$job['ID'] = $id;
		}
		else {
			$job['Title'] ='';
			$job['Content'] = '';
			$job['Enable'] = 'YES';
			$job['ID'] = 0;
		}
		
        $this->load->view('be/joinus/edit', $job);
	}
	
	public function deleteJob() {
		$ID = $this->input->post('ID');

		$this->db->where('ID', $ID);
		$result = $this->db->get('tbljobs')->row_array();
		
		$this->db->where('ID', $ID);
		$this->db->delete('tbljobs');

		echo json_encode(array(
			'success' => true
		));
	}

	public function updateJob() {
		$date = time();
        $avatar = "";

		$ID = $this->input->post('ID');

        $blog_data = array(
            'Title' => $this->input->post('Title'),
			'Content' => $this->input->post('Content'),
			'Enable' => $this->input->post('Enable'),			
        );

		if ($ID == '0') {			
			$blog_data['CreatedDate'] = date('Y-m-d H:i:s');
			$this->db->set($blog_data);
			$returnedID = $this->db->insert('tbljobs');
		}
		else {
			$this->db->where('ID', $ID);
			$this->db->update('tbljobs', $blog_data);

			$returnedID = $this->db->affected_rows();
		}

		if ($returnedID == 0)
			echo json_encode(array(
				'success' => false,
			));
		else 		
        	echo json_encode(array(
				'success' => true
			));
	}
}