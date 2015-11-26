<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_oto extends CI_Controller {

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
		$this -> session -> set_userdata('page', 'home_oto');
	}

	public function index() {
		$data["anti"] = null;
		$this -> load -> view('header');
		$this -> load -> view("home_oto_view", $data);
		$this -> load -> view('footer');
	}

	public function weed() {
		//////////////////////////////////////////////////////////////////////////////////////
		$weed = $this -> input -> post('weed_select');

		$json = file_get_contents("http://158.108.143.121:8080/CropCalendarServer/api/med/".$weed);
		$obj = json_decode($json, true);
		// echo $obj;
		$data["weed"] = $weed;
		$data["anti"] = explode(",", $obj['medicine']);
		$this -> load -> view('header');
		$this -> load -> view("home_oto_view", $data);
		$this -> load -> view('footer');
		//////////////////////////////////////////////////////////////////////////////////////
		// redirect("home");
	}

}
