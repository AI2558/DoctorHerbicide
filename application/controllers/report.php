<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
		$this -> session -> set_userdata('page', 'report');
		$this -> load -> model("report_model");
	}

	public function index() {
	 	$id_card = $this -> session -> userdata('id_card');
	 
		$data['id'] = $this -> report_model -> get_farmer($id_card);
		$data['weed'] = $this -> report_model -> get_weed();

		// print_r($data['weed']);
		$this -> load -> view('header');
		$this -> load -> view("report_view", $data);
		$this -> load -> view('footer');
	}

	public function save() {
		$weed = $this -> input -> post();
		foreach ($weed as $r) {
			$data .= $r . ",";
		}
		print($data);
	}
}
