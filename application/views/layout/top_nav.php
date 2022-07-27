<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg " >
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
           
          </div>
					<ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
								<a class="nav-link  " href="<?= base_url(); ?>admin/welcome/logout">
									<i class="fa fa-user me-sm-1"></i>
							<?php		
							/*$role_sql="SELECT nbb_users.first_name FROM nbb_users  where id ='".$this->session->userdata('id')."'" ;
							$role_query = $this->db->query($role_sql);
							foreach ($role_query->result_array() as $role_row) 
							{
								$role_id = $role_row['role_id'];
							}*/?>
									<span class="d-sm-inline d-none">Admin</span>
								</a>
            </li>
          </ul>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
								<a class="nav-link  " href="<?= base_url(); ?>admin/welcome/logout">
									<i class="fa fa-sign-out me-sm-1"></i>
									<span class="d-sm-inline d-none"></span>
								</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</main>
    <!-- End Navbar -->


	