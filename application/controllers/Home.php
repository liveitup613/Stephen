<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->db->from('tblhome');
		$data = $this->db->get()->row_array();

		$this->db->select('*');
		$this->db->where('Enable', 'YES');
		$this->db->from('tblwhoweserve');
		$data['services'] = $this->db->get()->result_array();

		$this->db->select('*');
		$this->db->where('Enable', 'YES');
		$this->db->from('tblwhatwedo');
		$data['WhatWeDo'] = $this->db->get()->result_array();

		$this->load->view('fe/home', $data);
    }
    
    public function whatwedo() {
		$this->db->select('*');
		$this->db->where('Enable', 'YES');
		$this->db->from('tblwhatwedo');
		$data['services'] = $this->db->get()->result_array();

        $this->load->view('fe/what-we-do', $data);
    }

    public function aboutUs() {
		$this->db->select('*');
		$this->db->where('ID', 1);
		$this->db->from('tblaboutus');
		$data = $this->db->get()->row_array();

		$this->db->select('*');
		$this->db->from('tblcorevalues');
		$data['coreValues'] = $this->db->get()->result_array();

        $this->load->view('fe/about-us', $data); 
	}
	
	public function blog() {
		$this->db->select('*');
		$this->db->where('Enable', 'YES');
		$this->db->from('tblblogs');
		$data['blogs'] = $this->db->get()->result_array();

		$this->load->view('fe/blog', $data);
	}

	public function blogView($ID) {
		$this->db->select('*');
		$this->db->where('ID', $ID);
		$this->db->from('tblblogs');
		$data = $this->db->get()->row_array();

		$this->load->view('fe/blog-view', $data);
	}

	public function joinUs() {
		$this->db->select('*');
		$this->db->where('Enable', 'YES');
		$this->db->from('tbljobs');
		$data['jobs'] = $this->db->get()->result_array();
		$this->load->view('fe/join-us', $data);
	}

	public function joinUsView($ID) {		
		$this->db->select('*');
		$this->db->where('ID', $ID);
		$this->db->from('tbljobs');
		$data = $this->db->get()->row_array();

		$this->load->view('fe/join-us-view', $data);
	}

	public function contactUs() {
		$this->load->view('fe/contact-us');
	}
}
