<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PartTime extends CI_Controller {

  public function __construct() {
  		parent::__construct();

	}

  public function index(){

      $this->db->select('*');
      $this->db->from('nbb_employees');
      $this->db->where('job_type_id',4);
      $data['employees'] = $this->db->get()->result_array();

      $this->db->select('*');
      $this->db->from('nbb_packages');
      $this->db->join('nbb_child_category','nbb_child_category.parent_category_id = nbb_packages.category');
      $data['data'] = $this->db->get()->result_array();

      $this->db->select('*');
      $this->db->from('nbb_product');
      $this->db->where('light_medical_beauty',1);
      $data['product'] = $this->db->get()->result_array();

      $this->db->select('*');
      $this->db->from('nbb_daily_sales');
      $data['sales'] = $this->db->get()->result_array();

      $this->layout->view('emp_part_time', $data);

  }

  public function get_details()
  {

  }
  public function save()
  {
    print "<pre>";
    echo "input data";
    print_r($this->input->post());
    exit();
  }

}

?>
