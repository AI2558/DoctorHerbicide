<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Medicine extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this -> session -> set_userdata('page', 'medicine');
		$this -> load -> model("medicine_model");
	}

	public function index() {
		$data["trade_name"] = $this -> medicine_model -> get_tradeName();
		print_r($data);
		
		$this -> load -> view('header');
		$this -> load -> view("medicine_view", $data);
		$this -> load -> view('footer');
	}

	public function weed() {
		//////////////////////////////////////////////////////////////////////////////////////
		$this -> load -> view('header');
		$this -> load -> view("medicine_view", $data);
		$this -> load -> view('footer');
		//////////////////////////////////////////////////////////////////////////////////////
	}
}
