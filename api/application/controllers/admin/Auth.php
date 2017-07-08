<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('my_model');
	}

	public function index()
	{
		$postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
		$email = $request->email;
		$password = $request->password;
		$table = 'user';
        $select = array('*');
        $where = array('(email = "'.$email.'" OR username = "'.$email.')" AND password = "'.$password.'"');
        $user = $this->my_model->get_table_data($table,$select,$where,true);
        if(!empty($user)) {
            if ($user['is_verified'] == 1) 
            {
	            $this->session->set_userdata(array(
					'is_login' => TRUE,
					'id' => $user[0]['id'],
					'username' => $user[0]['username'],
					'email' => $user[0]['email'],
					'user_role' => $user[0]['user_role_id'],
					'user_type' => $user[0]['user_type_id'],
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
        else{
        	$msg = ['msg'=>'username or password is incorrect','success'=>false];
            	echo json_encode($msg);
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





	public function check_email()
	{
		$postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
		$email = $request->email;

		$table = 'user';
        $select = array('*');
        $where = array('(email = "'.$email.'"');
        $user = $this->my_model->get_table_data($table,$select,$where,true);
        if ( $user != NULL ) 
        {
        	$msg = ['msg'=>'email exist','success'=>false];
            echo json_encode($msg);
        }
        else 
        {
        	$msg = ['msg'=>'email exist','success'=>true];
            echo json_encode($msg);
        }
	}





	public function check_username()
	{
		$postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
		$username = $request->username;

		$table = 'user';
        $select = array('*');
        $where = array('(usernaem = "'.$username.'"');
        $user = $this->my_model->get_table_data($table,$select,$where,true);
        if ( $user != NULL ) 
        {
        	$msg = ['msg'=>'email exist','success'=>false];
            echo json_encode($msg);
        }
        else 
        {
        	$msg = ['msg'=>'email exist','success'=>true];
            echo json_encode($msg);
        }
	}





	public function register()
	{
		$postdata 			= file_get_contents("php://input");
        $request 			= json_decode($postdata);
		$email 				= $request->email;
		$username 			= $request->username;
		$user_type 			= $request->user_type;
		$user_role 			= $request->user_role;
		$verification_code 	= md5(date('Y-m-d H:i:s'));
		$created_at 		= date('Y-m-d');
		$updated_at 		= date('Y-m-d');
		
		$options = array(
			'email' 			=> $email , 
			'username' 			=> $username , 
			'password'			=> $password , 
			'user_type' 		=> $user_type , 
			'user_role' 		=> $user_role , 
			'verification_code' => $verification_code , 
			'created_at' 		=> $created_at , 
			'updated_at' 		=> $updated_at
		);

		$insert_id = $this->my_model->insert_data('user', $options);
		if ( $insert_id > 0 ) 
        {
        	$msg = ['msg'=>'Registerd successfully','success'=>true];
            echo json_encode($msg);
        }
        else 
        {
        	$msg = ['msg'=>'Registration failed','success'=>false];
            echo json_encode($msg);
        }

	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */