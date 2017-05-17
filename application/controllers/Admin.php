<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $this->load->view('template/header');

        $this->load->model('Transaction_model');
        $result = $this->Transaction_model->getTransactions();
        
        $this->load->view('admin_main', array('data' => $result));
        $this->load->view('template/footer');
    }

    public function close()
    {
        $this->load->model('Transaction_model');

        $id = $this->input->get('id');
        $result = $this->Transaction_model->closeTransaction($id);
        redirect('/admin');
    }

    public function deliver()
    {
        $this->load->model('Transaction_model');

        $id = $this->input->get('id');
        $result = $this->Transaction_model->deliverTransaction($id);
        redirect('/admin');
    }
}
