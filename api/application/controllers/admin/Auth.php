<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends Main_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $postdata = file_get_contents("php://input");
  //       $request = json_decode($postdata);
 //       $role             = $request->role;
		// $email = $this->input->post('email');
		// $password = $this->input->post('password');
		// $table = 'user';
  //       $select = array('*');
  //       $where = array('email = "'.$email.'" OR username = "'.$username.'" AND password = "'.$password.'" AND disable = "0"');
  //       $user = $this->Sms_Model->get_table_data($table,$select,$where,false);
  //       if(!empty($user)) {
  //           $this->session->set_userdata(array(
		// 		'email' => $user['email'],
		// 		'username' => $user['username'],
		// 		'role' => $user['role_id'],
		// 		'id' => $user['id'],
		// 	));
		// 	redirect('dashboard', 'refresh');	
  //       }
	}





	public function check_login()
	{
		if ( $this->session->userdata('is_login') == TRUE ) 
		{
			$msg = ['msg'=>'user is logged in','success'=>true];
            echo json_encode($msg);
		}
		else
		{
			$msg = ['msg'=>'user is not logged in','success'=>false];
            echo json_encode($msg);
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */