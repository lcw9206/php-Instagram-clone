<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends MY_Controller {

	# MY_Controller를 상속받았으므로 기본적으로 생성자를 호출해야한다.
	public function __construct()
	{
		parent::__construct();

		# 쿠키를 굽기위한 선언
		$this->load->helper('cookie');
		$this->load->library('encrypt');
	}

	public function index()
	{
		if($this->current_user) {
			redirect('/');
		}

		$this->data['redirect_url'] = $this->input->get_post('redirect_url');
		$this->data['header'] = $this->_header();
		$this->data['footer'] = $this->_footer();

		$this->load->view('sign', $this->data);
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

	public function in() 
	{
		$user_id = $this->input->get_post('user_id');
		$user_password = $this->input->get_post('user_password');
		$redirect_url = $this->input->get_post('redirect_url');
		if(trim($user_id)=="") {
			send_json(400, '아이디를 입력해주세요.');
		}

		if(trim($user_password)=="") {
			send_json(400, '비밀번호를 입력해주세요.');
		}

		$this->db->where('id', $user_id);
		$this->db->where('password', pwd_hash($user_password));
		
		$user = $this->db->get('users')->row_array();

		if($user) {

			// 쿠키 데이터 지정
			$cookie_data['no'] = $user['no'];
			$cookie_data['id'] = $user['id'];
			$cookie_data['name'] = $user['name'];

			// 쿠키 옵션 지정
			$serialized_string = serialize($cookie_data);
			$encrypted_string = $this->encrypt->encode($serialized_string);
			// $expire = COOKIE_EXPIRE; // 86400 = 1day, 864000 = 10day, 8640000 = 100day
			// 만료일 0은 무한정
			$expire = 0;
			$cookie_option = array(
	                   'name'   => 'ticket',
	                   'value'  => $encrypted_string,
	                   'expire' => $expire,
	                   // 'domain' => strtolower($this->CI->config->item('default_domain')),
	                   // path에 /만 적어줄 경우, 해당 사이트 모든 곳에서 쿠키를 적용
	                   'path'   => '/'
	                   //'prefix' => 'myprefix_',
	               );

			// 쿠키 굽기
			set_cookie($cookie_option);

			$result['redirect_url'] = $redirect_url ? $redirect_url : '/';
			send_json(200, '로그인에 성공하셨습니다.', $result);
		} else {
			send_json(405, '아이디가 존재하지 않거나 비밀번호가 일치하지 않습니다.');
		}
	}

	public function out()
	{
		delete_cookie('ticket');
		redirect('/');
	}
}
