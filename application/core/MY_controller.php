<?php
# 코드이그나이터의 기본 컨트롤러인 CI_Controller의 기본 메서드들을 재정의해서 사용하기 위해 컨트롤러 생성
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_controller extends CI_Controller {

	# CI_Controller를 상속받았으므로 기본적으로 생성자를 호출해야한다.
	# php에서 언더바가 2개 들어간 메서드들을 매직 메서드라 칭한다.
	public function __construct()
	{
		parent::__construct();
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
