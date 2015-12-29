<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home_model extends CI_model {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	function get_antiName($weed_name) {
		$this -> db -> from('weed_resistance');
		$this -> db -> join('weed_name', 'weed_name.id = weed_resistance.weed_id');
		$this -> db -> where('weed_name.weed_name', $weed_name);
		// $this -> db -> group_by('group');
		$query = $this -> db -> get();
		$antiName = null;
		foreach ($query->result_array() as $row) {
			$antiName[] = $row;
		}
		return $antiName;
	}
	
	function get_information($weed_name) {
		$this -> db -> from('t_weed');
		$this -> db -> join('t_weed_image', 't_weed.weed_id = t_weed_image.weed_id');
		$this -> db -> where('t_weed.CommonName', $weed_name);
		$query = $this -> db -> get();
		$information = null;
		foreach ($query->result_array() as $row) {
			$information[] = $row;
		}
		return $information;
	}
	
	function get_weed_name() {
		$this -> db -> select('t_weed.CommonName, t_weed.LocalName, t_weed_image.weed_id, path_image');
		$this -> db -> from('t_weed');
		$this -> db -> join('t_weed_image', 't_weed.weed_id = t_weed_image.weed_id');
		$query = $this -> db -> get();
		foreach ($query->result_array() as $row) {
			$weed[] = $row;
		}
		return $weed;
	}

	function get_weed(){
		$query = $this -> db -> get('t_weed');
		foreach ($query->result_array() as $row) {
			$weed[] = $row;
		}
		return $weed;
	}
}
