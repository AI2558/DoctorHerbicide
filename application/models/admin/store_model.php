<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Store_model extends CI_model {

  function __construct() {
    parent::__construct();
    $this -> load -> database();
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

  function get_medicine_list() {
    $this -> db -> from('medicine');
    $query = $this -> db -> get();
    $medicine = null;
    foreach ($query->result_array() as $row) {
      $medicine[] = $row;
    }
    return $medicine;
  }

  function set_medicine($data2) {
    $this -> db -> from('medicine');
    $this -> db -> where('medicine.name', $data2['select_name']);
    $query = $this -> db -> get();
    $medicine = null;
    foreach ($query->result_array() as $row) {
      $medicine[] = $row;
    }

    $data = array(
      'medicine_id' => $medicine[0]['id'],
      'price' => $data2['price']
    );
    $this->db->where('id', $data2['id_edit']);
    $this->db->update('store_medicine', $data);  
  }

  function add_medicine($data2) {
    $this -> db -> from('medicine');
    $this -> db -> where('medicine.name', $data2['add_select_name']);
    $query = $this -> db -> get();
    $medicine = null;
    foreach ($query->result_array() as $row) {
      $medicine[] = $row;
    }

    $data = array(
      'store_id' => $data2['store_id'],
      'medicine_id' => $medicine[0]['id'],
      'price' => $data2['add_price']
    );
    $this->db->insert('store_medicine', $data); 
  }

  function remove_medicine($id) {
    $this->db->delete('store_medicine', array('id' => $id)); 
  }

  function get_all_store() {
    $this -> db -> from('store');
    $query = $this -> db -> get();
    $medicine = null;
    $store = Array();
    foreach ($query->result_array() as $row) {
      $store[] = $row;
    }
    return $store;
  }

  function add_store($data2) {
    $data = array(
      'store_name' => $data2['store_name'],
      'province' => $data2['province'],
      'latitude' => $data2['latitude'],
      'longitude' => $data2['longitude']
    );
    $this->db->insert('store', $data);
  }
}
