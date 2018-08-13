<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends MY_Controller {

	# MY_Controller를 상속받았으므로 기본적으로 생성자를 호출해야한다.
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['header'] = $this->_header();
		$data['footer'] = $this->_footer();

		$this->load->view('sign', $data);
	}

	public function up()
	{
		# $_GET, $_POST => GET, POST 방식으로 넘어온 애들을 각각 받을 수 있는 전역변수
		# $_REQUEST => GET, POST 방식 모두 받을 수 있는 전역변수
		# $user_id = $_POST['user_id'];
		# 기본적으로 위처럼 데이터를 가져올 수 있지만, 밑의 코드이그나이터의 문법을 사용한다.
		# $this -> 코드이그나이터 문법이며, SQL 인젝션 처리를 직접 해주므로 할 필요가 없다.
		$user_id = $this->input->get_post('user_id');
		$user_name = $this->input->get_post('user_name');
		$user_password = $this->input->get_post('user_password');

		if(trim($user_id)=="") {
			send_json(400, '아이디를 입력해주세요.');
		}

		if(trim($user_name)=="") {
			send_json(400, '이름을 입력해주세요.');
		}

		if(trim($user_password)=="") {
			send_json(400, '비밀번호를 입력해주세요.');
		}

		# DB에 넣을 값들을 set한다.
		$this->db->set('id', $user_id);
		$this->db->set('name', $user_name);
		$this->db->set('password', pwd_hash($user_password));
		$this->db->set('created', date('Y-m-d H:i:s'));

		if( ! $this->db->insert('users')) {
			send_json(500, '가입 도중 DB 오류가 발생했습니다.');
		} else {
			send_json(200);
		}
	}

}
