<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function index()
    {

    }

    public function all()
    {
        $this->load->view('template/header');

        $this->load->model('Account_model');
        $result = $this->Account_model->getAll();

        $this->load->view('account_list', array('data' => $result));
        
        $this->load->view('template/footer');
    }

    public function remove()
    {
        $id = $this->input->get('id');

        $this->load->model('Account_model');
        $result = $this->Account_model->delete($id);

        redirect('/account/all');
    }

    public function modal()
    {
        $data = array('user' => false);

        if (count($this->input->get()) != 0) {
            $this->load->model('Account_model');
            $result = $this->Account_model->getUser($this->input->get('id'));
            $data['user'] = $result[0];
        }

        $this->load->view('template/account_modal', $data);
    }

    public function register()
    {

        $this->load->library('form_validation');

        $rules = array(
            array(
                'field'     => 'uname',
                'label'     => 'Username',
                'rules'     => 'required|max_length[45]'
            ),
            array(
                'field'     => 'pass',
                'label'     => 'Password',
                'rules'     => 'required|max_length[45]|matches[retype]'
            ),
            array(
                'field'     => 'retype',
                'label'     => 'Retype',
                'rules'     => 'required|max_length[45]|matches[pass]'
            ),
            array(
                'field'     => 'fName',
                'label'     => 'First name',
                'rules'     => 'required|max_length[100]'
            ),
            array(
                'field'     => 'lName',
                'label'     => 'Last name',
                'rules'     => 'required|max_length[100]'
            ),
            array(
                'field'     => 'mName',
                'label'     => 'Middle Initial',
                'rules'     => 'required|max_length[2]'
            ),
            array(
                'field'     => 'contact',
                'label'     => 'Contact Info',
                'rules'     => 'required|max_length[45]'
            ),
            array(
                'field'     => 'addr',
                'label'     => 'Address',
                'rules'     => 'required|max_length[200]'
            ),
            array(
                'field'     => 'gender',
                'label'     => 'Gender',
                'rules'     => 'required|in_list[male,female]'
            ),
            array(
                'field'     => 'usertype',
                'label'     => 'User type',
                'rules'     => 'required|in_list[customer,staff,admin, worker]'
            ),
            array(
                'field'     => 'day',
                'label'     => 'Day',
                'rules'     => 'required|less_than[32]'
            ),
            array(
                'field'     => 'month',
                'label'     => 'Month',
                'rules'     => 'required|less_than[13]'
            ),
            array(
                'field'     => 'year',
                'label'     => 'Year',
                'rules'     => 'required|less_than[2001]|greater_than[1959]'
            ),
        );

        $this->form_validation->set_rules($rules);

        //perform validation in the future
        // $this->form_validation->run()
        $this->load->model('Account_model');

        if ($this->input->post('mode') == 'create') {
            $this->Account_model->createAccount();
        } else {
            $this->Account_model->updateAccount();
        }

        redirect('/account/all');
    }

    public function login()
    {
        $data = $this->input->post();
        $this->load->model('Account_model');

        $result = $this->Account_model->verifyLogin($data);
        $result['cart'] = array();
        if ($result !== false) {
            $this->session->set_userdata($result);
        }

        redirect('/');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
