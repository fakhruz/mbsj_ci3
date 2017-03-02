<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $unlocked = ['welcome','auth'];
        $curClass = strtolower(get_class($this));

        if(!in_array($curClass, $unlocked)) {
            if (!$this->ion_auth->logged_in()) {
                redirect('auth/login');
            }
        }
    }
}