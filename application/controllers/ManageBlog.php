<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageBlog extends CI_Controller {

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
		$this->db->from('tblblogs');
		$data['blogs'] = $this->db->get()->result_array();
        $this->load->view('be/blog/index', $data);
    }

    public function edit($id) {
		
		if ($id != 0) {
			$this->db->select('*');
			$this->db->where('ID', $id);
			$this->db->from('tblblogs');
			$blog = $this->db->get()->row_array();
			$blog['ID'] = $id;
		}
		else {
			$blog['Title'] ='';
			$blog['Content'] = '';
			$blog['Portfolio'] = '';
			$blog['Enable'] = 'YES';
			$blog['ID'] = 0;
		}
		
        $this->load->view('be/blog/edit', $blog);
	}
	
	public function deleteBlog() {
		$ID = $this->input->post('ID');

		$this->db->where('ID', $ID);
		$result = $this->db->get('tblblogs')->row_array();

		if (!empty($result['Portfolio']) && file_exists('assets/images/blogs/'.$result['Portfolio']))
			unlink('assets/images/blogs/'.$result['Portfolio']);

		$this->db->where('ID', $ID);
		$this->db->delete('tblblogs');

		echo json_encode(array(
			'success' => true
		));
	}

	public function updateBlog() {
		$date = time();
        $avatar = "";

		$ID = $this->input->post('ID');

        $blog_data = array(
            'Title' => $this->input->post('Title'),
			'Content' => $this->input->post('Content'),
			'Enable' => $this->input->post('Enable'),			
        );

        if (!empty($_FILES["Portfolio"]["name"])) {
            $config['upload_path'] = 'assets/images/blogs/';
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
		
		$returnedID = 0;

		if ($ID == '0') {
			$blog_data['Portfolio'] = $avatar;
			$blog_data['CreatedDate'] = date('Y-m-d H:i:s');
			$this->db->set($blog_data);
			$returnedID = $this->db->insert('tblblogs');
		}
		else {
			if ($avatar !== '') {
				$this->db->select('Portfolio');
				$this->db->from('tblblogs');
				$this->db->where('ID', $ID);
				$result = $this->db->get()->row_array();

				if (!empty($result['Portfolio']) && file_exists('assets/images/blogs/'.$result['Portfolio']))
					unlink('assets/images/blogs/'.$result['Portfolio']);
				$blog_data['Portfolio'] = $avatar;
			}			

			$this->db->where('ID', $ID);
			$this->db->update('tblblogs', $blog_data);

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