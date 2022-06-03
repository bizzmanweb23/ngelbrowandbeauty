<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement_Model extends CI_Model
{
	function getAllUser()
    {
      $this->db->select('nbb_users.*,nbb_roles.role_name ');
      $this->db->from('nbb_users');
			$this->db->join('nbb_roles', 'nbb_roles.id = nbb_users.role_id', 'LEFT');
      return $this->db->get()->result_array();
    }
	function getAllRoles()
    {
      $this->db->select('*');
      $this->db->from('nbb_roles');
      return $this->db->get()->result_array();
    }
		function getAllPermission()
    {
      $this->db->select('*');
      $this->db->from('nbb_permission');
			$this->db->order_by("nbb_permission.id", "DESC");
      return $this->db->get()->result_array();
    }
		function getAllRolePermission()
    {
      $this->db->select('nbb_rolepermission.*,nbb_roles.role_name,nbb_permission.menuname ');
      $this->db->from('nbb_rolepermission');
			$this->db->join('nbb_roles', 'nbb_roles.id = nbb_rolepermission.role_id', 'LEFT');
			$this->db->join('nbb_permission', 'nbb_permission.id = nbb_rolepermission.permission_id', 'LEFT');
      return $this->db->get()->result_array();
    }
}
?>
