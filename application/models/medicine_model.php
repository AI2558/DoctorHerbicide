<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Medicine_model extends CI_model {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	function get_tradeName() {
		$this -> db -> from('medicine');
		$query = $this -> db -> get();
		foreach ($query->result_array() as $row) {
			$trade_name[] = $row;
		}
		return $trade_name;
	}
	
	function get_information($med_name) {
		$this -> db -> from('medicine');
		$this -> db -> where('name', $med_name);
		$query = $this -> db -> get();
		$information = null;
		foreach ($query->result_array() as $row) {
			$information[] = $row;
		}
		return $information;
	}

	function get_location($data) {
    $this -> db -> select('store.id, store.latitude, store.longitude');
		$this -> db -> from('store');
    $this -> db -> join('store_medicine', 'store_medicine.store_id = store.id', 'left');
    $this -> db -> where('store_medicine.medicine_id', $data[0]['id']);
		$query = $this -> db -> get();
		foreach ($query->result_array() as $row) {
			$location[] = $row;
		}
		return $location;
	}

	function get_nearest($store_id) {
		$this -> db -> from('store');
		$this -> db -> where('id', $store_id);
		$query = $this -> db -> get();
		$location = null;
		foreach ($query->result_array() as $row) {
			$location[] = $row;
		}
		return $location;
	}

	function get_medicine($id) {
    $this -> db -> select('medicine.id as med_id, medicine.name, medicine.common_name, store_medicine.id, store_medicine.price, store.id as store_id, store.store_name, store.province, store.latitude, store.longitude');
    $this -> db -> from('store');
    $this -> db -> join('store_medicine', 'store_medicine.store_id = store.id');
    $this -> db -> join('medicine', 'medicine.id = store_medicine.medicine_id');
    $this -> db -> where('store_id', $id);
    $query = $this -> db -> get();
    $store_medicine = null;
    foreach ($query->result_array() as $row) {
      $store_medicine[] = $row;
    }
    if($store_medicine != null) {
      return $store_medicine;
    } else {
      $this -> db -> select('store.id as store_id, store.store_name, store.province, store.latitude, store.longitude');
      $this -> db -> from('store');
      $this -> db -> where('store.id', $id);
      $query = $this -> db -> get();
      foreach ($query->result_array() as $row) {
        $store_medicine[] = $row;
      }
      return $store_medicine;
    }
  }
}
