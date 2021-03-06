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
		
		$data["information"] = null;
		$this -> load -> view('header');
		$this -> load -> view('nav');
		$this -> load -> view('medicine_view', $data);
		$this -> load -> view('footer');
	}

	public function show() {
		$name = $this -> input -> post('name');
		$data["trade_name"] = $this -> medicine_model -> get_tradeName();
		$data["information"] = $this -> medicine_model -> get_information($name);
		$data['store'] = $this -> medicine_model -> get_location($data["information"]);
		$data["user_latitude"] = $this -> session -> userdata('latitude');
		$data["user_longitude"] = $this -> session -> userdata('longitude');
		
		$pick_store = 0;
		$i=0;
		foreach ($data['store'] as $r) {
			$sum_lat = abs($data["user_latitude"] - $r['latitude']);
			$sum_log = abs($data["user_longitude"] - $r['longitude']);
			$sum = abs($sum_lat - $sum_log);
			if($i==0) {
				$pick_store = $r['id'];
			} else if($pick_store > $sum) {
				$pick_store = $r['id'];
			}
			$i++;
		}

		$data['pick_store'] = $this -> medicine_model -> get_nearest($pick_store);
		$data['medicine'] = $this -> medicine_model -> get_medicine($pick_store);
		$this -> load -> view('header');
		$this -> load -> view('nav');
		$this -> load -> view('medicine_view', $data);
		$this -> load -> view('footer');
	}
}
