<?php
# 코드이그나이터의 기본 컨트롤러인 CI_Controller의 기본 메서드들을 재정의해서 사용하기 위해 컨트롤러 생성
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_controller extends CI_Controller {

	# CI_Controller를 상속받았으므로 기본적으로 생성자를 호출해야한다.
	# php에서 언더바가 2개 들어간 메서드들을 매직 메서드라 칭한다.
	public function __construct()
	{
		parent::__construct();
		$this->_set_ticket_user();
	}

	public $current_user = array();
	public $data = array();

	# 쿠키의 로그인 정보를 가져와

	public function _restrict()
	{
		if(!$this->current_user) {
			redirect('/sign?redirect_url='.current_url_with_querystring());
		}
	}

	public function _set_ticket_user() 
	{
		$this->load->helper('cookie');
		$this->load->library('encrypt');

		$cookiestring = get_cookie('ticket', TRUE);

		$decrypted_string = $this->encrypt->decode($cookiestring);
		$cookie_data = unserialize($decrypted_string);

		$user_no = $cookie_data['no'];

		$this->db->where('no', $user_no);
		$user = $this->db->get('users')->row_array();

		$this->current_user = $user;
		$this->data['current_user'] = $this->current_user;
	}

	# 메서드 앞에 '_'를 붙이면 외부에서 접근이 불가능하다. 주로 설정파일 같은 것들에 사용한다.
	public function _header()	
	{
		# true를 하면 값을 뿌려주는 것이 아닌 값을 반환(return)한다.
		return $this->load->view('_header','',true);	
	}

	public function _footer()
	{
		return $this->load->view('_footer','',true);
	}

}
