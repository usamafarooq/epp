<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends Main_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
       	$role             = $request->role;
		$email = $request->email;
		$password = $request->password;
		// $username = $request->username;
		$table = 'user';
        $select = array('*');
        $where = array('(email = "'.$email.'" OR username = "'.$email.')" AND password = "'.$password.'"');
        $user = $this->Sms_Model->get_table_data($table,$select,$where,false);
        if(!empty($user)) {
            if ($user['is_verified'] == 1) 
            {
	            $this->session->set_userdata(array(
					'is_login' => TRUE,
					'id' => $user['id'],
					'username' => $user['username'],
					'email' => $user['email'],
					'user_role' => $user['user_role_id'],
					'user_type' => $user['user_type_id'],
				));

				$msg = ['msg'=>'user is logged in','success'=>true];
            	echo json_encode($msg);
            }
            else
            {
            	$msg = ['msg'=>'email not verrified','success'=>false];
            	echo json_encode($msg);
            }
        }
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