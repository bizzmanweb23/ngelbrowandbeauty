<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement extends CI_Controller {

	public function __construct() {

		parent::__construct();
		//$this->load->library('m_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}

	public function user_details(){
        $data['user']=$this->UserManagement->getAllUser();
        $this->layout->view('users',$data);
    }
	public function add_adminUser()
    {	
		$data['name'] = $this->session->userdata('name');
		$data['allRoles']=$this->UserManagement->getAllRoles();
      	$this->layout->view('add_users',$data); 
    }
	public function post_add_user(){
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'email' => $this->input->post('email'),
			'password' => hash('sha512', $this->input->post('password')),
			'role_id' => $this->input->post('role_id'),
			'status' => '1');

			$insert = $this->Main->insert('nbb_users',$data); 
			if($insert){
				redirect('admin/UserManagement/user_details');
			}		
	}
	public function deleteAdminUser()
	{
	   if($this->session->has_userdata('id')!=false)
	   	{
		   $userId = $this->uri->segment(4);
		   $result = $this->Main->delete('id',$userId,'nbb_users');
		   if($result==true)
		   {
			   redirect('admin/UserManagement/user_details');
		   }
	  	}
	}
	public function all_roles(){

		$data['allRoles']=$this->UserManagement->getAllRoles();
        $this->layout->view('all_roles',$data);
	}
	public function add_post_userRole(){
		$data = array(
			'role_name' => $this->input->post('role_name'));

			$insert = $this->Main->insert('nbb_roles',$data); 
			if($insert){
				redirect('admin/userManagement/all_roles');
			}		
	}
	public function deleteRoles()
	{
	   if($this->session->has_userdata('id')!=false)
	   	{
		   $roleId = $this->uri->segment(4);
		   $result = $this->Main->delete('id',$roleId,'nbb_roles');
		   if($result==true)
		   {
			   redirect('admin/UserManagement/all_roles');
		   }
	  	}
	}
	public function all_permission(){
		$data['name'] = $this->session->userdata('name');
		$data['allPermission']=$this->UserManagement->getAllPermission();
      	$this->layout->view('all_permission',$data);
	}
	public function add_post_permission(){

		$menuname = $this->input->post('menuname');

		$data = array(
			'menuname' => $menuname
		);	

		$permission_query = $this->db->query("SELECT nbb_permission.* 
		FROM nbb_permission 
		WHERE nbb_permission.menuname = '".$menuname."'");
		$permission_rownum = $permission_query->num_rows();
		
		if($permission_rownum > 0){
			$update=$this->Main->update('menuname',$menuname, $data,'nbb_permission');  
		}else{
			$insert = $this->Main->insert('nbb_permission',$data); 
		}

		if($insert || $update){
			redirect('admin/userManagement/all_permission');
		}		
	}
	public function deletePermission()
	{
	   if($this->session->has_userdata('id')!=false)
	   	{
		   $permissionId = $this->uri->segment(4);
		   $result = $this->Main->delete('id',$permissionId,'nbb_permission');
		   if($result==true)
		   {
			   redirect('admin/UserManagement/all_permission');
		   }
	  	}
	}
	public function all_rolePermission(){
		$data['name'] = $this->session->userdata('name');
		$data['rolePermission']=$this->UserManagement->getAllRolePermission();
		$data['allRoles']=$this->UserManagement->getAllRoles();
		$data['allPermission']=$this->UserManagement->getAllPermission();
      	$this->layout->view('all_rolePermission',$data);
	}
	public function add_post_RolePermission(){

		$permission_id = $this->input->post('menuname');
			//print_r($permission_id);exit;

			$permission_count = count($permission_id);
	
				for($i = 0;$i < $permission_count;$i++) {

					$data = array(
						'role_id' => $this->input->post('role_name'),
						'permission_id' => $permission_id[$i]
					);
				   
					$insert = $this->Main->insert('nbb_rolepermission',$data); 
	
				}
		
		if($insert){
			redirect('admin/userManagement/all_rolePermission');
		}		
	}
	public function deleteRolePermission()
	{
	   if($this->session->has_userdata('id')!=false)
	   	{
		   $RolepermissionId = $this->uri->segment(4);
		   $result = $this->Main->delete('id',$RolepermissionId,'nbb_rolepermission');
		   if($result==true)
		   {
			   redirect('admin/UserManagement/all_rolePermission');
		   }
	  	}
	}

}


?>
