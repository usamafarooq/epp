<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Controller extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->model('my_model');
	}
}
