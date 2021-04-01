<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    /* * **************************************************************
     * Class Name        : Admin Controller 
     * Description       : In this file all users actions will be handled.
     * Author            : Rekha Patel
     * Create Date       : 31/03/2021 (DD/MM/YYYY)
     * Revision          :
     * Modified by       : xxxxxx
     * Modified Date     : (DD/MM/YYYY)
     * Modified Reason   : xxxx xxxxxx
     * *************************************************************** */

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

	public function index()
	{
		$data['users'] = $this->user_model->getUsers();
		$data['content'] = $this->load->view('admin/index', $data, TRUE);
		$this->load->view('template', $data);
    }

    public function edituser($id)
    {
        $this->user_model->checkAdminLogin();
        $user = $this->user_model->userdata($id);

        if (empty($user)) {
            $this->session->set_userdata(['error' => 'Data Not Found.Please Try Again..']);
            redirect('admin');
        }

        if ($this->input->post('edituser')) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $config = array(
                array(
                    'field' => 'first_name',
                    'label' => 'First Name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'last_name',
                    'label' => 'Last Name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'mobile_number',
                    'label' => 'Mobile Number',
                    'rules' => 'trim|required|numeric|min_length[10]|max_length[12]'
                )
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() === TRUE){
                //Save User data
                $userData = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'mobile_number' => $this->input->post('mobile_number'),
                    'bio' => $this->input->post('bio'),
                    'address' => $this->input->post('address')
                );
                $content = $this->user_model->saveUserProfile($userData, 'update');
                $this->session->set_userdata(['success' => 'User Data Updated Succesfully']);
                redirect('admin');
            }
        }
        
        $data['user'] = $user;
        $data['content'] = $this->load->view('admin/edit_user', $data, TRUE);
        $this->load->view('template', $data);
    }

    public function deleteuser($id)
    {
        // Check Login
        $this->user_model->checkAdminLogin();
        if ($id === '') {
            $this->session->set_userdata(['error' => 'Data Not Found.Please Try Again..']);
            redirect('admin');
        }
        $this->admin_model->delete('salons', $id);
        $this->session->set_userdata(['success' => 'User Data Deleted Succesfully']);
        redirect('admin');
    }
}