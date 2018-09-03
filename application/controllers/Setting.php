<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {

	# MY_Controller를 상속받았으므로 기본적으로 생성자를 호출해야한다.
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->_restrict();
		
		$data['header'] = $this->_header();
		$data['footer'] = $this->_footer();

		$this->load->view('setting', $data);
	}
}
