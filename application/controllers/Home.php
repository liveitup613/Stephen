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

	public function sendEmail() {
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$message = $this->input->post('message');

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'systone.webcontacts@gmail.com',
			'smtp_pass' => 'Systoneit$',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1'
			);

		$this->load->library('email', $config);		

		$this->email->set_newline("\r\n");
		$this->email->from('systone.webcontacts@gmail.com', 'Contact Us');
		$this->email->to('contactus@systoneit.com');
		$this->email->subject('Contact Us');

		$cotent = "Name: <strong>".$name. "</strong><br>Phone: <strong>" . $phone . "</strong><br>Email: <strong>" .$email ."</strong><br>Message:<br><strong>". $message.'</strong>';
		$this->email->message($cotent);

		if ($this->email->send())
		{
			echo "Email was successfully sent.";
		}
		else {  
			show_error($this->email->print_debugger());
		}
	}
}
