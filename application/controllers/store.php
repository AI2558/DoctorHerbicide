<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

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
		$this -> session -> set_userdata('page', 'store');
		$this -> load -> model("store_model");
	}

	public function index() {
		$data['store'] = $this -> store_model -> get_location();
		$data['medicine'] = $this -> store_model -> get_medicine();
		$data['store_medicine'] = $this -> store_model -> get_medicine_in();
		$this -> load -> view('header');
		$this -> load -> view('nav');
		$this -> load -> view('store_view', $data);
		$this -> load -> view('footer');
	}

	public function get_medicine() {
		$store_id = $this->input->post('store_id');
		$data['store'] = $this -> store_model -> get_location();
		$data['medicine'] = $this -> store_model -> get_medicine();
		$data['store_medicine'] = $this -> store_model -> get_medicine_in($store_id);
		print_r($data);
		$this -> load -> view('store_view', $data);
	} 
}
