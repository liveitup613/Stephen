<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageAboutUs extends CI_Controller {

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
		$this->db->where('ID', 1);
		$this->db->from('tblaboutus');
		$data = $this->db->get()->row_array();

		$this->db->select('*');
		$this->db->from('tblcorevalues');
		$data['coreValues'] = $this->db->get()->result_array();

        $this->load->view('be/aboutus/index', $data);
	}
	
	public function updateTitle(){
		$data = $this->input->post();

		$this->db->where('ID', 1);
		$this->db->update('tblaboutus', $data);

		echo json_encode(array(
			'success' => true
		));
	}

	public function addCoreValue() {
		$data = $this->input->post();

		$this->db->insert('tblcorevalues', $data);

		echo json_encode(array(
			'success' => true
		));
	}

	public function deleteCoreValue() {
		$ID = $this->input->post('ID');

		$this->db->where('ID', $ID);
		$this->db->delete('tblcorevalues');

		echo json_encode(array(
			'success' => true
		));
	}
}