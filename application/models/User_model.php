<?php
	/* * **************************************************************
	 * Class Name        : User Model 
	 * Description       : In this file all database actions related to User Controller will be handled.
	 * Author            : Rekha Patel
	 * Create Date       : 31/03/2021 (DD/MM/YYYY)
	 * Revision          :
	 * Modified by       : xxxxxx
	 * Modified Date     : (DD/MM/YYYY)
	 * Modified Reason   : xxxx xxxxxx
	 * *************************************************************** */

	class User_model extends CI_Model {
        public function checkAdminLogin() {
            if ($this->session->userdata('isAdmin') === 'Yes') {
                return true;
            } else {
                $this->load->library('session');
                $this->session->sess_destroy();
                redirect('');
            }
        }

		public function logindata($email, $password) {
            // Query Retrieves User Details
	        $query = $this->db->get_where('users', array('email' => $email, 'password' => md5($password)));
	        $result = $query->row_array();
	        return $result;
	    }

	    public function saveUserProfile($data, $type) {
            if ($type === "new") {
                $this->db->where('email', $data['email']);
                $query = $this->db->get('users');
                $row = $query->row();
                $resAry = '';
                if (!empty($row) && ($row->email === $data['email'])) {
                    $resAry = "exists";
                } else {
                    $this->db->insert('users', $data);
                    $insertedId = $this->db->insert_id();
                   	$resAry = "true";

                    //Store session data
                   	$session = array(
                        'isLoggedIn' => true,
                        'mobivUserID' => $insertedId,
                        'firstname' => $data['first_name'],
                        'lastname' => $data['last_name'],
                        'userEmail' => $data['email']
                    );
                    $this->session->set_userdata($session);
                }
            }
            if ($type == "update") {
                $this->db->where('id', $this->input->post('id'));
                $this->db->update('users', $data);
                $resAry ="true";
            }
            return $resAry;
        }

        public function userdata($id) {
            // Query Retrieves User Details
            $query = $this->db->get_where('users', array('id' => $id));
            $result = $query->row_array();
            return $result;
        }

        public function getUsers() {
            $this->db->where('is_admin', 'No');
            $this->db->order_by("first_name", "ASC");
            $query = $this->db->get('users');
            $salons = $query->result_array();
            return $salons;
        }

        function delete($table,$id) {
            $this->db->where('id', $id);
            if($this->db->delete($table)) {
                return true;
            } else {
                return false;
            }
        }
	}
