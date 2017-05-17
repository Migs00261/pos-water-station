<?php
class Account_model extends CI_Model {
    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

    public function createAccount()
    {
        $data = $this->input->post();
        $data['mi'] = $data['mName'];
        $data['address'] = $data['addr'];


        $user = array(
            'username' => $data['uname'],
            'password' => $data['pass'],
            'usertype' => $data['usertype']
        );

        $bdate = $data['year'] . '-' . $data['month'] . '-' . $data['day'];

        unset($data['mode']);
        unset($data['uname']);
        unset($data['pass']);
        unset($data['usertype']);
        unset($data['retype']);
        unset($data['year']);
        unset($data['day']);
        unset($data['month']);
        unset($data['mName']);
        unset($data['addr']);
        unset($data['register-submit']);
        
        $people = $data;
        $people['bdate'] = $bdate;
        
        $this->db->insert('people', $people);
        $this->db->insert('user', $user);
    }

    public function updateAccount()
    {
        $data = $this->input->post();
        $data['mi'] = $data['mName'];
        $data['address'] = $data['addr'];


        $user = array(
            'username' => $data['uname'],
            'password' => $data['pass'],
            'usertype' => $data['usertype']
        );

        $bdate = $data['year'] . '-' . $data['month'] . '-' . $data['day'];

        unset($data['mode']);
        unset($data['uname']);
        unset($data['pass']);
        unset($data['usertype']);
        unset($data['retype']);
        unset($data['year']);
        unset($data['day']);
        unset($data['month']);
        unset($data['mName']);
        unset($data['addr']);
        unset($data['register-submit']);
        
        $people = $data;
        $people['bdate'] = $bdate;
        
        $this->db->where('people_id', $data['people_id']);
        $this->db->update('people', $people);

        $this->db->where('people_id', $data['people_id']);
        $this->db->update('user', $user);
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('people p', 'u.people_id = p.people_id', 'left');
        return $this->db->get()->result_array();
    }

    public function getUser($id)
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('people p', 'u.people_id = p.people_id', 'left');
        $this->db->where('u.people_id', $id);
        return $this->db->get()->result_array();
    }

    public function getWorkers()
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('people p', 'u.people_id = p.people_id', 'left');
        $this->db->where('u.usertype', 'worker');
        return $this->db->get()->result_array();
    }

    public function getCustomers()
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('people p', 'u.people_id = p.people_id', 'left');
        $this->db->where('u.usertype', 'customer');
        return $this->db->get()->result_array();
    }


    public function delete($id)
    {
        $this->db->delete('people', array('people_id' => $id));
        $this->db->delete('user', array('people_id' => $id));
    }

    public function verifyLogin($data)
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('people p', 'u.people_id = p.people_id', 'left');
        $this->db->where('u.username', $data['username']);
        $this->db->where('u.password', $data['password']);
        
        $result = $this->db->get()->result_array();
        if (count($result) === 1) {
            return $result[0];
        } else {
            return false;
        }
    }
}
?>