<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Store_model extends CI_model {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	function get_location() {
		$this -> db -> from('store');
		$query = $this -> db -> get();
		foreach ($query->result_array() as $row) {
			$location[] = $row;
		}
		return $location;
	}

	function get_medicine() {
		$this -> db -> select('medicine.id as med_id, medicine.name, medicine.common_name, store_medicine.id, store_medicine.price, store.id as store_id, store.store_name, store.province, store.latitude, store.longitude');
    $this -> db -> from('store');
    $this -> db -> join('store_medicine', 'store_medicine.store_id = store.id');
    $this -> db -> join('medicine', 'medicine.id = store_medicine.medicine_id');
    $query = $this -> db -> get();
    $store_medicine = null;
    foreach ($query->result_array() as $row) {
      $store_medicine[] = $row;
    }
    return $store_medicine;
	}

	function get_medicine_in() {
		$this -> db -> from('store_medicine');
		$this -> db -> join('medicine', 'medicine.id = store_medicine.medicine_id');
		$this -> db -> group_by('name');
		$query = $this -> db -> get();
		$location = null;
		foreach ($query->result_array() as $row) {
			$location[] = $row;
		}
		return $location;
	}
}
