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
		print_r($posts);

		$this->load->view('board');
	}
}