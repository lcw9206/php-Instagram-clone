<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {

	public function index()	{
		// $sql = "SELECT * FROM posts WHERE is_secret != 'Y' ORDER BY created DESC";
		// $result = mysqli_query($link, $sql);

		$this->db->where('is_secret !=', 'Y');
		$this->db->order_by('created', 'desc');
		$posts = $this->db->get('posts')->result_array();
		$data['posts'] = $posts;	# key, value 값 설정을 통해 $data를 이용해 손쉽게 view로 데이터를 보낼 수 있다.

		$this->load->view('board', $data);
	}
}