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
	 	
	 	$get_farmer = $this -> report_model -> get_farmer_all();

	 	// $data['get_farmer'] = $this -> report_model -> get_farmer_name($get_farmer);
	 	print_r($get_farmer);
	 	$data['show_table'] = $this -> report_model -> get_table();
		$data['id'] = $this -> report_model -> get_farmer($id_card);
		$data['weed'] = $this -> report_model -> get_weed();
		$this -> load -> view('header');
		$this -> load -> view('nav');
		$this -> load -> view('report_view', $data);
		$this -> load -> view('footer');
	}

	public function save() {
		$weed = $this -> input -> post();
		$i = 0;
		$len = count($weed);

		$id_card = $this -> session -> userdata('id_card');
		$province = $this -> session -> userdata('province_session');
		$this -> report_model -> delete_report($id_card);

		foreach ($weed as $r) {
			$this -> report_model -> insert_report($id_card, $r, $province);
		}
		redirect(base_url("report"));
	}
}
