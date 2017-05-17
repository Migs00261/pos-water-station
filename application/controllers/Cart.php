<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    public function index()
    {
        $this->load->view('template/header');

        $this->load->model('Account_model');
        $workers = $this->Account_model->getWorkers();
        $customers = $this->Account_model->getCustomers();

        $this->load->view('cart', 
            array(  'data' => $this->session->userdata('cart'),
                    'workers' => $workers,
                    'customers' => $customers,)
        );

        $this->load->view('template/footer');
    }

    public function cashout()
    {
        $data = array(
            'receive_date'  => date('Y-m-d'),
            'total'         => $this->input->get('total'),
            'payment'       => $this->input->get('cash'),
            'remarks'       => 'open',
            'delivery_date' => NULL,
            'people_id'     => $this->input->get('customer'),
            'status'        => 'pending',
            'worker_id'     => $this->input->get('worker'),
        );

        $this->load->model('Product_model');
        $this->load->model('Transaction_model');
        $id = $this->Transaction_model->addReceipt($data);

        //create order_details
        $carts = $this->session->userdata('cart');

        $sorted_cart = array();
        foreach ($carts as $cart) {
            $sorted_cart[$cart['p_id']][] = $cart;
        }

        foreach ($sorted_cart as $cart) {
            $data = array(
                'ri_id'     => $id,
                'p_id'      => $cart[0]['p_id'],
                'quantity'  => count($cart),
            );
            $this->Product_model->buy($cart[0]['p_id']);
            $this->Transaction_model->addOrder($data);
        }

        //dump cart
        $this->session->set_userdata('cart', array());

        redirect('/');
    }
}