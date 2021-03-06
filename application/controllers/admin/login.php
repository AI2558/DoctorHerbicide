<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
    $this -> session -> set_userdata('page', 'admin');
    $this -> load -> model("admin/login_model");
  }

  public function index() {
    $data['err'] = null;

    $this -> load -> view('header');
    $this -> load -> view("admin/login_view", $data);
    $this -> load -> view('footer');
  }

  public function authorize() {
    $username = $this -> input -> post('username');
    $password = $this -> input -> post('password');

    $information = $this -> login_model -> authorize($username, $password);

    if($information != null) {
      $this -> session -> set_userdata('admin_session', $information[0]["first_name"]);
      redirect(base_url("admin/store"));
    } else {
      $data['err'] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";

      $this -> load -> view('header');
      $this -> load -> view("admin/login_view", $data);
      $this -> load -> view('footer');
    }
  }

  public function logout() {
    $this -> session -> sess_destroy();
    redirect("home");
  }
}
