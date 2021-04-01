<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    /* * **************************************************************
     * Class Name        : User Controller 
     * Description       : In this file all users relation actions will be handled.
     * Author            : Rekha Patel
     * Create Date       : 31/03/2021 (DD/MM/YYYY)
     * Revision          :
     * Modified by       : xxxxxx
     * Modified Date     : (DD/MM/YYYY)
     * Modified Reason   : xxxx xxxxxx
     * *************************************************************** */
    
class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation','upload'));
        $this->load->helper('form');
        $this->load->model('user_model');
    }

	public function index()
	{
        if ($this->session->userdata('mobivUserID')) {
            $data['userdata'] = $this->user_model->userdata($this->session->userdata('mobivUserID'));
        }
		$data['pageTitle'] = 'Sign-Up';
		$data['content'] = $this->load->view('user/signup', $data, TRUE);
		$this->load->view('template', $data);
    }

    public function login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($email !== '' && $password !== '') {
            $userdata = $this->user_model->logindata($email, $password);

            if (!empty($userdata)) {
                //Store session data
                $session = array(
                    'isLoggedIn' => true,
                    'mobivUserID' => $userdata['id'],
                    'firstname' => $userdata['first_name'],
                    'lastname' => $userdata['last_name'],
                    'userEmail' => $userdata['email'],
                    'isAdmin' => $userdata['is_admin']
                );
                $this->session->set_userdata($session);
                if($userdata['is_admin'] === 'Yes' ){ echo 'Admin'; exit(); }
                echo "Success";
                exit();
            } else {
                echo 'Fail';
                exit();
            }
        } else {
            echo 'Fail';
            exit();
        }
    }

    public function forgotPassword() {
        $email = $this->input->post('email');

        $this->db->where('email', $email);
        $query = $this->db->get('users');
        $data = $query->row_array();
        
        if($query->num_rows() > 0){
            $subject = PROJECT_NAME ." Forgot Password Reminder";
            $msg = "Hello " . $data['first_name'].' '. $data['last_name'] . ",<br><br>
                \nYou have recently requested to reset your password for your account
                \nYou may log into by using the below credentials details:<br><br>
                \nEmail  : " . $email . "<br><br>
                \nPassword  : " . DEFAULT_PASSWORD . "<br><br>
                \n\nKind Regards,<br><br>
                \n" . PROJECT_NAME . " Team";
            //$mail = $this->send_mail(PROJECT_NAME, "noreply@test.com", $email, $subject, $msg);
            //if($mail === 1) {
                $this->db->where(array('email' => $email));
                $this->db->update('users',array('password'=> md5(DEFAULT_PASSWORD)));

                $content = "true"."_"."Mail Sent Successfully";
            //} else {
                //$content = "false"."_"."Mail Delivery Failed";
            //}
        }else{
            $content = "false"."_"."User Does Not Exist";
        }  
        echo $content; exit();
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('');
    }

    public function saveusersignupdate() {
        //Check email is valid or not
        if ($this->input->post('signgup_email') !== '') {
            if (!preg_match('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/', $this->input->post('signgup_email'))) {
                $flag = 1;
                echo 'invalidemail'; exit();
            }
        }

        //Creating Array of User data
        $userData = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('signgup_email'),
            'mobile_number' => $this->input->post('mobile_number'),
            'password' => md5($this->input->post('password'))
        );

    	//Save User data
        $content = $this->user_model->saveUserProfile($userData, 'new');
		
		//Send SignUp email
		$username = ucfirst($this->input->post('first_name').' '.$this->input->post('last_name'));
        $email = $this->input->post('signgup_email');  
        $password = $this->input->post('password');
        $subject = "Welcome to ".PROJECT_NAME;
        $msg = "Hello " . $username . ",<br><br>
            \nYou have been successfully registered to " . PROJECT_NAME . ".
            \nYou may log into by using the below credentials details:<br><br>
            \nEmail  : " . $email . "<br><br>
            \nPassword  : " . $password . "<br><br>
            \n\nKind Regards,<br><br>
            \n" . PROJECT_NAME . " Team";
        //$mail = $this->send_mail(PROJECT_NAME, "noreply@test.com", $email, $subject, $msg);
        echo $content; exit();
    }

    public function updateProfile(){
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
        $status = $msg = $image = "";

        if ($this->form_validation->run() === TRUE){
            //Image upload process
            $config['upload_path'] = './files/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = TRUE;
     
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('customFile')){
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            } else {
                $data = $this->upload->data();
                $image = $data['file_name'];
                $status = 'success';
            }

            //update user data
            $userData = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'mobile_number' => $this->input->post('mobile_number'),
                'bio' => $this->input->post('bio'),
                'address' => $this->input->post('address'),
                'image' => $image
            );
            $content = $this->user_model->saveUserProfile($userData, 'update');
        }
        echo $content; exit();
    }

    // Mail Sent Functionality
    function send_mail($name,$email,$to,$subject,$result) {
        $this->load->library('email');
        $this->email->clear(TRUE);
        $this->email->set_newline("\r\n");
        $this->email->from($email,$name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->set_mailtype('html');
        $this->email->message($result);
        if($this->email->send()) {
            return 1;
        } else {
            return 0;
            //show_error($this->email->print_debugger());
        }
    }
}
