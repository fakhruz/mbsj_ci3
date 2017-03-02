<?php
/**
 * Created by PhpStorm.
 * User: fakhruzzaman
 * Date: 01/03/17
 * Time: 9:41 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');


class M_employee extends CI_Model {

    private $tbl = 'employees';

    public function get_employee(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
    }

    public function get($limit=10, $offset=0, $where=""){

        if("" !== $where){
            $this->db->where($where);
        }
        $query = $this->db->get($this->tbl, $limit, $offset);

        $employees = [];

        if($query->num_rows() > 0){
            $employees = $query->result();
        }

        return $employees;
    }

    public function record_count(){
        return $this->db->count_all($this->tbl);
    }
}