<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function index()
    {
        $data['title'] = 'Dashboard';

        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('dashboard');
        $this->load->view('templates/footer.php');
    }
}

/* End of file Dashboard.php */
/* Location: ./application/controller/Dashboard.php */