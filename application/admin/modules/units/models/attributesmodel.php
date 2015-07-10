<?php

class Attributesmodel extends Basemodel {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function findAll() {
        $results = $this->db->get('units_attributes')->result_array();
        return $results;
    }

    function save() {
        $data = rSF('units_attributes');
        $id = gParam('id');
        if ($id) {
            $this->db->where('id', $id);
            $this->db->update('units_attributes', $data);
            $this->session->set_flashdata('SUCCESS', 'attribute_updated');
        } else {
            $this->db->insert('units_attributes', $data);
            $this->session->set_flashdata('SUCCESS', 'attribute_added');
        }
    }

    function getAttributes($key) {
        $this->db->where('unit_type', $key);
//        $this->db->order('sort','asc');
        $result = $this->db->from('units_attributes')->get()->result_array();
        return $result;
    }

    function getAttributeValue($unit_id, $type) {
        $this->db->select('t1.*,t2.value');
        $this->db->from('units_attributes t1');
        $this->db->join('units_attributes_value t2', 't1.id=t2.attribute_id and t2.unit_id=' . $unit_id, 'left');
        if ($type)
            $this->db->where('unit_type', $type);
        $results = $this->db->get()->result_array();
        return $results;
    }

}
