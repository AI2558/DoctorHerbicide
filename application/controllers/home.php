<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this -> session -> set_userdata('page', 'home');
		$this -> load -> model("home_model");
	}

	public function index() {
		$data["weed_name"] = $this -> home_model -> get_weed_name();
		// print_r($data);
		$data["weed"] = $this -> home_model -> get_weed();
		$data["anti"] = null;
		$data["information"] = null;
		$this -> load -> view('header');
		$this -> load -> view('nav');
		$this -> load -> view("home_view", $data);
		$this -> load -> view('footer');
	}

	public function weed() {
		//////////////////////////////////////////////////////////////////////////////////////
		//$weed = $this -> input -> post('weed_select');
		$name = $this -> input -> post('name');
		$data["weed_name"] = $this -> home_model -> get_weed_name();
		$data["weed"] = $this -> home_model -> get_weed();
		$data["anti"] = $this -> home_model -> get_antiName($name);
		$data["information"] = $this -> home_model -> get_information($name);
		$this -> load -> view('header');
		$this -> load -> view('nav');
		$this -> load -> view("home_view", $data);
		$this -> load -> view('footer');
		//////////////////////////////////////////////////////////////////////////////////////
		// redirect("home");
	}
}
