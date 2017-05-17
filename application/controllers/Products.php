<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    public function index()
    {
        $this->load->view('template/header');

        $this->load->model('Product_model');
        $result = $this->Product_model->getAll();

        $this->load->view('products', array('data' => $result));

        $this->load->view('template/footer');
    }

    public function remove()
    {
        $id = $this->input->get('id');

        $this->load->model('Product_model');
        $result = $this->Product_model->delete($id);

        redirect('/products/all');
    }

    public function all()
    {
        $this->load->view('template/header');

        $this->load->model('Product_model');
        $result = $this->Product_model->getAll();

        $this->load->view('products_list', array('data' => $result));
        
        $this->load->view('template/footer');
    }

    public function modal()
    {
        $this->load->model('Product_model');
        $result = $this->Product_model->getCategory();

        $data = array('product' => false, 'categories' => $result);

        if (count($this->input->get()) != 0) {
            $this->load->model('Product_model');
            $result = $this->Product_model->getProduct($this->input->get('id'));
            $data['product'] = $result[0];
        }

        $this->load->view('template/product_modal', $data);
    }

    public function register()
    {

        $this->load->library('form_validation');

        $rules = array(
            array(
                'field'     => 'description',
                'label'     => 'Description',
                'rules'     => 'required|max_length[64]'
            ),
            array(
                'field'     => 'quantity',
                'label'     => 'Quantity',
                'rules'     => 'required|integer'
            ),
            array(
                'field'     => 'price',
                'label'     => 'Price',
                'rules'     => 'required|decimal'
            ),

        );

        $this->form_validation->set_rules($rules);

        //perform validation in the future
        // $this->form_validation->run()
        $this->load->model('Product_model');

        if ($this->input->post('mode') == 'create') {
            $this->Product_model->createProduct();
        } else {
            $this->Product_model->updateProduct();
        }

        redirect('/products/all');
    }

    public function category()
    {
        $this->load->view('template/header');

        $this->load->model('Product_model');
        $result = $this->Product_model->getCategory();

        $this->load->view('product_category', array('data' => $result));
        
        $this->load->view('template/footer');
    }

    public function cat_add()
    {
        $this->load->model('Product_model');
        $result = $this->Product_model->addCategory($this->input->get('text'));
        redirect('/products/category');
    }

    public function cat_del()
    {
        $id = $this->input->get('id');

        $this->load->model('Product_model');
        $result = $this->Product_model->deleteCategory($id);

        redirect('/products/category');
    }

    public function cat_edit()
    {
        $id = $this->input->get('id');
        $text = $this->input->get('text');

        $this->load->model('Product_model');
        $result = $this->Product_model->editCategory($id, $text);

        redirect('/products/category');
    }

    public function cart_add()
    {
        $this->load->model('Product_model');
        $result = $this->Product_model->getProduct($this->input->get('id'));
        if (count($result) > 0) {
            $cart = $this->session->userdata('cart');
            $cart[] = $result[0];
            $this->session->set_userdata('cart', $cart);
        }
        
        redirect('/products');
    }

    public function cart_del()
    {
        $id = $this->input->get('id');

        $cart = $this->session->userdata('cart');
        array_splice($cart, $id, 1);
        $this->session->set_userdata('cart', $cart);

        redirect('/cart');
    }
}
