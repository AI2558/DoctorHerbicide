<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this -> session -> set_userdata('page', 'login');
		$this -> load -> model("login_model");
	}

	public function index() {
		// print_r($data);
		$data["url_api_value"] = null;
		$this -> load -> view('header');
		$this -> load -> view("login_view", $data);
		$this -> load -> view('footer');
	}

	public function check() {
		$id_card = $this -> input -> post('url_api');

		$information = $this -> login_model -> get_farmer($id_card);
		$this -> session -> set_userdata('id_card', $information[0]["citizen_id"]);
		$this -> session -> set_userdata('province_session', $information[0]["province"]);
		$this -> session -> set_userdata('name_session', $information[0]["first_name"] . " " . $information[0]["last_name"]);
		redirect("home");
	}

	public function logout() {
		$this -> session -> sess_destroy();
		redirect("home");
	}
}
