<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tasks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
 
        $this->load->model('operations_model');
    }

    public function index()
  {
    echo 'home';
   }
}