<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see http://codeigniter.com/user_guide/general/urls.html
   */
  public function __construct() {
    parent::__construct();
    $this -> session -> set_userdata('page', 'admin_store');
    $admin = $this -> session -> userdata('admin_session');
    if($admin == null) {
      redirect(base_url('admin'));
    } else {
      $this -> load -> model("admin/store_model");
    }
  }

  public function index(){ 
    //lazy code should be here
  }
  
  public function r($store_id) {
    $data['medicine'] = $this -> store_model -> get_medicine($store_id);
    $data['medicine_name'] = $this -> store_model -> get_medicine_list();

    $this -> load -> view('header');
    $this -> load -> view('nav');
    $this -> load -> view('admin/store_view', $data);
    $this -> load -> view('footer');
  }

  public function edit() {
    $data = $this -> input -> post();
    $this -> store_model -> set_medicine($data);
    redirect(base_url('admin/store'));
  }

  public function add() {
    $data = $data = $this -> input -> post();
    $this -> store_model -> add_medicine($data);
    redirect(base_url('admin/store'));
  }

  public function remove($id) {
    $this -> store_model -> remove_medicine($id);
    redirect(base_url('admin/store'));
  }
}
