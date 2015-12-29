<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

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
		$this -> session -> set_userdata('page', 'map');
		// $this -> load -> model("home_model");
	}

	public function index() {
		// $data["weed_name"] = $this -> home_model -> get_weed_name();
		// print_r($data);
		$this -> load -> view('header');
		$this -> load -> view('nav');
		$this -> load -> view("map_view");
		$this -> load -> view('footer');
	}
}
