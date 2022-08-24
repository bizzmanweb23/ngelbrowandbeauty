
<?php 
if ($this->session->userdata('id')) {

// code statements My Account

?>
<main class="main-content position-relative max-height-vh-100 h-100 mt-1" style="background-color:#61d3d4 !important;" >
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
           
          </div>
					<ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
								<a class="nav-link  " href="<?= base_url(); ?>dashboard">
									<i class="fa fa-user me-sm-1"></i>
							<?php		
							$userName_sql="SELECT nbb_users.first_name FROM nbb_users  where id ='".$this->session->userdata('id')."'" ;
							$userName_query = $this->db->query($userName_sql);
							foreach ($userName_query->result_array() as $userName_row) 
							{
								$userName = $userName_row['first_name'];
							}?>
									<span class="d-sm-inline d-none"><?= $userName; ?></span>
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
<?php 
		}else
		{
		redirect('admin', 'refresh');
		}
  ?>
 
    <!-- End Navbar -->


	