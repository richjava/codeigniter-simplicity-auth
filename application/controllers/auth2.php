<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
/**
 * Class for handling authorization and authentication using a modal dialog and ajax.
 */
class Auth2 extends CI_Controller {

    function __construct() {
	parent::__construct();

	$this->load->helper('url');

	$this->_init();
    }

    /**
     * Set up.
     */
    private function _init() {
	$this->output->set_template('default2');

	$this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
	$this->load->js('assets/themes/default/js/jquery-ui-1.8.16.custom.min.js');
	$this->load->js('assets/themes/default/js/script.js');
    }

    /**
     * Display home page.
     */
    public function index() {
	$this->load->view('pages/home');
    }

    /**
     * Display Login page.
     */
    public function login() {
	$this->load->helper('form');
	$this->load->view('pages/login');
    }

    /**
     * Sign the user out and return to home page.
     */
    public function logout() {
	$this->session->sess_destroy();
	$this->load->view('pages/home');
    }

   /**
    * Validate that the user is a member. Used as part of login functionality.
    */
    public function validate() {
	$this->load->model('User');
	if ($this->User->validate()) {
	    $this->_do_login();
	} else { // incorrect username or password
	    $this->session->set_flashdata('error', 'Incorrect username and/or password. Please try again.');
	    redirect('/auth/login', 'refresh');
	}
    }

    /**
     * Log the user in and redirect to home page.
     */
    private function _do_login() {
	$data = array(
	    'username' => $this->input->post('username'),
	    'is_logged_in' => true
	);
	$this->session->set_userdata($data);
	redirect('/auth');
    }
    
    /**
     * Display Sign Up page.
     */
    public function signup() {
	$this->load->helper('form');
	$this->load->view('pages/signup');
    }

    /**
     * Create a new user and store in db. Used as part of Signup functionality.
     */
    public function create_user() {
	$this->load->library('form_validation');
	//validate 
	$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
	$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
	$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
	$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');

	if (!$this->form_validation->run()) {
	    $this->load->view('pages/signup');
	} else {
	    //Create new user
	    $this->load->model('User');
	    $this->User->first_name = $this->input->post('first_name');
	    $this->User->last_name = $this->input->post('last_name');
	    $this->User->email_address = $this->input->post('email_address');
	    $this->User->username = $this->input->post('username');
	    $this->User->password = md5($this->input->post('password'));
	    //save new user
	    if ($this->User->insert_obj() != null) {
		$this->_do_login();
		$this->session->set_flashdata('success', 'Account successfully created.');
		redirect('/auth', 'refresh');
	    } else {
		$this->session->set_flashdata('error', 'An error occurred and the account was not created.');
		redirect('auth/signup');
	    }
	}
    }

}
