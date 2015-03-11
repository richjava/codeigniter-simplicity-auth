<?php

class User extends MY_Model {

    public $id;
    public $first_name;
    public $last_name;
    public $email_address;
    public $username;
    public $password;

    function validate() {
	$user = $this->get_by(array('username' => $this->input->post('username'), 'password' => md5($this->input->post('password'))));
	if ($user) {
	    return true;
	}
    }

}
