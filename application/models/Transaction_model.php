<?php
class Transaction_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function addReceipt($data)
    {
        $this->db->insert('receipt_info', $data);
        return $this->db->insert_id();
    }

    public function addOrder($data)
    {
        $this->db->insert('order_details', $data);
    }

    public function getTransactions() 
   {
        $this->db->select('r.*, s.fname as staff, w.fname as worker');
        $this->db->from('receipt_info r');
        $this->db->join('people s', 'r.people_id = s.people_id');
        $this->db->join('people w', 'r.worker_id = w.people_id');
        
        return $this->db->get()->result_array();

    }

    public function closeTransaction($id)
    {
        $this->db->where('ri_id', $id);
        $this->db->update('receipt_info', array('remarks' => 'close'));
    }

    public function deliverTransaction($id)
    {
        $this->db->where('ri_id', $id);
        $this->db->update('receipt_info', array('status' => 'delivered', 'delivery_date' => date('Y-m-d')));
    }
}