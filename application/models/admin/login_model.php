<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Login_model extends CI_model {

  function __construct() {
    parent::__construct();
    $this -> load -> database();
  }

  function authorize($username, $password) {
    $admin = null;
    if($username == 'admin' && $password == 'admin') {
      $this -> db -> from('farmer');
      $this -> db -> where('first_name', $username);
      $this -> db -> where('last_name', $password);
      $query = $this -> db -> get();
      
      foreach ($query->result_array() as $row) {
        $admin[] = $row;
      }
    }
    return $admin;
  }

}
