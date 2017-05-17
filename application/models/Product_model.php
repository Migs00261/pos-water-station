<?php
class Product_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function createProduct()
    {
        $data = $this->input->post();
        unset($data['mode']);
        unset($data['register-submit']);
        
        $this->db->insert('product', $data);
    }

    public function updateProduct()
    {
        $data = $this->input->post();
        unset($data['mode']);
        unset($data['register-submit']);
        
        $this->db->where('p_id', $data['p_id']);
        $this->db->update('product', $data);
    }

    public function getAll()
    {
        $this->db->select('p.*, pc.description as desc');
        $this->db->from('product p');
        $this->db->join('product_category pc', 'p.pc_id = pc.pc_id', 'left');
        return $this->db->get()->result_array();
    }

    public function getCategory()
    {
        $this->db->select('*');
        $this->db->from('product_category');
        return $this->db->get()->result_array();
    }

    public function getProduct($id)
    {
        $this->db->select('p.*, pc.description as desc');
        $this->db->from('product p');
        $this->db->join('product_category pc', 'p.pc_id = pc.pc_id', 'left');
        $this->db->where('p.p_id', $id);
        return $this->db->get()->result_array();
    }

    public function delete($id)
    {
        $this->db->delete('product', array('p_id' => $id));
    }

    public function addCategory($txt)
    {
        $this->db->insert('product_category', array('description' => $txt));
    }

    public function deleteCategory($id)
    {
        $this->db->delete('product_category', array('pc_id' => $id));
    }

    public function editCategory($id, $text)
    {
        $this->db->where('pc_id', $id);
        $this->db->update('product_category', array('description' => $text));
    }

    public function buy($id)
    {
        $this->db->set('quantity', '`quantity`-1', FALSE);
        $this->db->where('p_id', $id);
        $this->db->update('product');
    }
}
?>