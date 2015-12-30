<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home2 extends CI_Controller {

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
		$this -> session -> set_userdata('page', 'home2');
		$this -> load -> model("home2_model");
	}

	public function index() {
		$data["weed_name"] = $this -> home2_model -> get_weed_name();
		$data["weed"] = $this -> home2_model -> get_weed();
		// print_r($data);
		$data["anti"] = null;
		$data["information"] = null;
		$this -> load -> view('header');
		$this -> load -> view('nav');
		$this -> load -> view("home2_view", $data);
		$this -> load -> view('footer');
	}

	public function weed() {
		//////////////////////////////////////////////////////////////////////////////////////
		//$weed = $this -> input -> post('weed_select');
		$name = $this -> input -> post('name');
		$data['noti'] = null;
		$data["weed_name"] = $this -> home2_model -> get_weed_name();
		$data["weed"] = $this -> home2_model -> get_weed();
		$data["anti"] = $this -> home2_model -> get_antiName($name);
		$data["information"] = $this -> home2_model -> get_information($name);
		$this -> load -> view('header');
		$this -> load -> view('nav');
		$this -> load -> view("home2_view", $data);
		$this -> load -> view('footer');
		//////////////////////////////////////////////////////////////////////////////////////
		// redirect("home");
	}

	public function send_report() {
		$weed_name = $this -> input -> post('name_report');
		$citizen_id = $this -> session -> userdata('id_card');
		$province = $this -> session -> userdata('province_session');
		$this -> home2_model -> add_report($weed_name, $citizen_id, $province);

		$name = $weed_name;
		$data['noti'] = "รายงานสำเร็จ! ขอบคุณที่รายงาน";
		$data["weed_name"] = $this -> home2_model -> get_weed_name();
		$data["weed"] = $this -> home2_model -> get_weed();
		$data["anti"] = $this -> home2_model -> get_antiName($name);
		$data["information"] = $this -> home2_model -> get_information($name);
		$this -> load -> view('header');
		$this -> load -> view('nav');
		$this -> load -> view("home2_view", $data);
		$this -> load -> view('footer');
		// print_r($name);
	}
}
