<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {

	public function index()	
	{
		// $sql = "SELECT * FROM posts WHERE is_secret != 'Y' ORDER BY created DESC";
		// $result = mysqli_query($link, $sql);

		$this->db->where('is_secret !=', 'Y');
		$this->db->order_by('created', 'desc');
		$posts = $this->db->get('posts')->result_array();
		$data['posts'] = $posts;	# key, value 값 설정으로 $data를 이용해 손쉽게 view로 데이터를 보낼 수 있다.
		$data['header'] = $this->_header();	# 헤더파일 불러오기.
		$data['footer'] = $this->_footer();

		$this->load->view('board', $data);
	}

	public function _header()	# 메서드 앞에 '_'를 붙이면 외부에서 접근이 불가능하다. 주로 설정파일 같은 것들에 사용한다.
	{
		return $this->load->view('_header','',true);	# true를 하면 값을 뿌려주는 것이 아닌 값을 반환(return)한다.
	}

	public function _footer()
	{
		return $this->load->view('_footer','',true);
	}

}