
  <style>
	 .navbar-vertical.navbar-expand-xs {
	display: block;
	position: fixed;
	top: 0;
	bottom: 0;
	width: 100%;
	max-width: 15.625rem !important;
	
	padding: 0;
	box-shadow: none;
	}
	.navbar-vertical.navbar-expand-xs .navbar-collapse {
		display: block;
		overflow: auto;
		height: calc(90vh - 100px) !important;
	}

</style>
<?php 
if ($this->session->userdata('id')) {

// code statements My Account

?>
	<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main" style="background-color: #fff;">
    <div class="sidenav-header text-center mb-5">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
        <img src="<?= base_url(); ?>assets/img/LOGO.png" class="navbar-brand-img" alt="main_logo" style="width:100px;">
        
      </a>
    </div>
   
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  active" href="<?= base_url(); ?>admin/welcome/dashboard">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>Home </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Dashboard</span>
          </a>
        </li>

		<?php 
		$role_sql="SELECT nbb_users.role_id FROM nbb_users  where id ='".$this->session->userdata('id')."'" ;
		$role_query = $this->db->query($role_sql);
		foreach ($role_query->result_array() as $role_row) 
		{
			$role_id = $role_row['role_id'];
		}
	$permission_sql = "select nbb_permission.* from nbb_permission
	left join nbb_rolepermission on nbb_permission.id = nbb_rolepermission.permission_id
	WHERE nbb_rolepermission.role_id ='".$role_id."' ORDER BY nbb_permission.menuname ASC"; 
	 
	 $permission_query = $this->db->query($permission_sql);
	 
	 
		 if ($permission_query->num_rows() > 0) {
	
			foreach ($permission_query->result_array() as $permission_row) { 

				$menuname =  $permission_row['menuname'];

		?>
		<?php if( $menuname == 'Service & Appointment'){ ?>
				<li class="nav-item" >
					<a data-bs-toggle="collapse" href="#pagesExamples4" class="nav-link collapsed" aria-controls="pagesExamples4" role="button" aria-expanded="false">
					<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;">
						<i class="far fa-calendar-check"></i>
					</div>
						<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Service & Appointment</span>
					</a>
					<div class="collapse" id="pagesExamples4" style="">
						<ul class="nav ms-4 ps-3">
							<li class="nav-item ">
							<a class="nav-link " href="<?= base_url(); ?>admin/ServiceCategoryCtl/service">
									<span class="sidenav-mini-icon"> S </span>
									<span class="sidenav-normal"> Service </span>
								</a>
							</li>
							<li class="nav-item ">
							<a class="nav-link " href="<?= base_url(); ?>admin/ServiceCategoryCtl/all_ServiceBooking">
									<span class="sidenav-mini-icon"> S </span>
									<span class="sidenav-normal"> Service Booking </span>
								</a>
							</li>
							<li class="nav-item ">
							<a class="nav-link" href="<?= base_url(); ?>admin/ServiceCategoryCtl/appointment">
							<span class="sidenav-mini-icon"> A </span>
									<span class="sidenav-normal"> Appointments </span>
								</a>
							</li>
							
						</ul>
					</div>
				</li>
				<?php }if( $menuname == 'Category Management'){ ?>
				<li class="nav-item" >
					<a data-bs-toggle="collapse" href="#pagesExamples8" class="nav-link collapsed" aria-controls="pagesExamples8" role="button" aria-expanded="false">
					<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;">
						<i class="far fa-calendar-check"></i>
					</div>
						<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Category Management</span>
					</a>
					<div class="collapse" id="pagesExamples8" style="">
						<ul class="nav ms-4 ps-3">
							<li class="nav-item ">
							<a class="nav-link " href="<?= base_url(); ?>admin/ServiceCategoryCtl/all_parentCategory">
									<span class="sidenav-mini-icon"> M </span>
									<span class="sidenav-normal"> Main Category </span>
								</a>
							</li>
							<li class="nav-item ">
							<a class="nav-link " href="<?= base_url(); ?>admin/ServiceCategoryCtl/all_category">
									<span class="sidenav-mini-icon"> S </span>
									<span class="sidenav-normal"> Sub-Category </span>
								</a>
							</li>
							<li class="nav-item ">
							<a class="nav-link " href="<?= base_url(); ?>admin/ServiceCategoryCtl/all_subChildCategory">
									<span class="sidenav-mini-icon"> S </span>
									<span class="sidenav-normal"> Sub Child-Category </span>
								</a>
							</li>
							
						</ul>
					</div>
				</li>
				<?php } if( $menuname == 'Product Management'){ ?>
				<li class="nav-item" >
					<a data-bs-toggle="collapse" href="#pagesTabs2" class="nav-link collapsed" aria-controls="pagesTabs2" role="button" aria-expanded="false">
					<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;">
						<i class="fas fa-box-open"></i>
					</div>
						<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Product Management</span>
					</a>
					<div class="collapse" id="pagesTabs2" style="">
						<ul class="nav ms-4 ps-3">
							<!--<li class="nav-item ">
								<a class="nav-link " href="<?= base_url(); ?>admin/productManagement/all_productcategory">
									<span class="sidenav-mini-icon"> P </span>
									<span class="sidenav-normal"> Product Categories </span>
								</a>
							</li>-->
							<li class="nav-item ">
								<a class="nav-link  " href="<?= base_url(); ?>admin/productManagement/all_product">
										<span class="sidenav-mini-icon"> P </span>
										<span class="sidenav-normal"> Product </span>
									</a>
							</li> 
						</ul>
					</div>
				</li>
				<?php } if( $menuname == 'Order Management'){ ?>
				<li class="nav-item">
					<a data-bs-toggle="collapse" href="#pagesExamples1" class="nav-link collapsed" aria-controls="pagesExamples" role="button" aria-expanded="false">
					<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;">
						<i class="far fa-handshake"></i>
					</div>
						<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Order Management</span>
					</a>
					<div class="collapse" id="pagesExamples1" style="">
						<ul class="nav ms-4 ps-3">
							<li class="nav-item ">
							<a class="nav-link  " href="<?= base_url(); ?>admin/OrderManagement/all_OrderProduct">
									<span class="sidenav-mini-icon"> O </span>
									<span class="sidenav-normal"> Order Details </span>
							</a>
							</li>
							<li class="nav-item ">
							<a class="nav-link  " href="<?= base_url(); ?>admin/OrderManagement/all_CartProduct">
									<span class="sidenav-mini-icon"> C </span>
									<span class="sidenav-normal"> Cart Details </span>
								</a>
							</li>
							<li class="nav-item ">
							<a class="nav-link  " href="<?= base_url(); ?>admin/OrderManagement/all_Wishlist">
									<span class="sidenav-mini-icon"> W </span>
									<span class="sidenav-normal"> Wishlist </span>
							</a>
							</li>
							<?php /* <li class="nav-item ">
								<a class="nav-link  " href="<?= base_url(); ?>admin/OrderManagement/all_DeliveryDetails">
									<span class="sidenav-mini-icon"> D </span>
									<span class="sidenav-normal"> Delivery Management </span>
								</a>
							</li>*/ ?>
						</ul>
					</div>
				</li>  
				<?php }if( $menuname == 'POS Management'){ ?>
						<li class="nav-item">
								<a data-bs-toggle="collapse" href="#pagesExamples13" class="nav-link collapsed" aria-controls="pagesExamples13" role="button" aria-expanded="false">
								<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;"><i class="far fa-handshake"></i>
								</div>
									<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">POS Management</span>
								</a>
								<div class="collapse" id="pagesExamples13" style="">
									<ul class="nav ms-4 ps-3">
										<li class="nav-item ">
											<a class="nav-link  " href="<?= base_url(); ?>admin/POS_management/create_pos">
												<span class="sidenav-mini-icon"> C </span>
												<span class="sidenav-normal"> POS Sheet </span>
											</a>
										</li>
									</ul>
								</div>
							</li> 
		
				<?php } if( $menuname == 'Delivery Management'){ ?>
				<li class="nav-item">
					<a class="nav-link  " href="<?= base_url(); ?>admin/OrderManagement/all_DeliveryDetails">
						<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;">
						<i class="fa fa-user"></i>
						</div>
						<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Delivery Management</span>
					</a>
				</li> 
				<?php } if( $menuname == 'Offer & Packages'){ ?>
				<li class="nav-item">
					<a data-bs-toggle="collapse" href="#pagesExamples7" class="nav-link collapsed" aria-controls="pagesExamples" role="button" aria-expanded="false">
					<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;">
						<i class="far fa-handshake"></i>
					</div>
						<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Offer & Packages</span>
					</a>
					<div class="collapse" id="pagesExamples7" style="">
						<ul class="nav ms-4 ps-3">
						<li class="nav-item ">
						<a class="nav-link  " href="<?= base_url(); ?>admin/offerAndPackages/package_list">
							<span class="sidenav-mini-icon"> P </span>
							<span class="sidenav-normal"> Packages </span>
							</a>
						</li>
						<?php /* <li class="nav-item ">
						<a class="nav-link  " href="<?= base_url(); ?>admin/welcome/promotion">
							<span class="sidenav-mini-icon"> P </span>
							<span class="sidenav-normal"> Promotion </span>
							</a>
						</li> */ ?>    
						<li class="nav-item ">
						<a class="nav-link  " href="<?= base_url(); ?>admin/offerAndPackages/coupons_list">
							<span class="sidenav-mini-icon"> O </span>
							<span class="sidenav-normal"> Offer </span>
							</a>
						</li>
						</ul>
                    </div>
				</li>   
				<?php }if( $menuname == 'Procurement Module'){ ?>
				<li class="nav-item">
					<a data-bs-toggle="collapse" href="#pagesExamples9" class="nav-link collapsed" aria-controls="pagesExamples" role="button" aria-expanded="false">
					<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;">
						<i class="far fa-handshake"></i>
					</div>
						<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Procurement Module</span>
					</a>
					<div class="collapse" id="pagesExamples9" style="">
						<ul class="nav ms-4 ps-3">
						<li class="nav-item ">
						<a class="nav-link  " href="<?= base_url(); ?>admin/ProcurementManagement/all_supplier">
							<span class="sidenav-mini-icon"> S </span>
							<span class="sidenav-normal"> Supplier Details </span>
							</a>
						</li>
						<?php /* <li class="nav-item ">
						<a class="nav-link  " href="<?= base_url(); ?>admin/welcome/promotion">
							<span class="sidenav-mini-icon"> P </span>
							<span class="sidenav-normal"> Promotion </span>
							</a>
						</li> */ ?>    
						<li class="nav-item ">
						<a class="nav-link  " href="<?= base_url(); ?>admin/ProcurementManagement/allOrderSupplier">
							<span class="sidenav-mini-icon"> S </span>
							<span class="sidenav-normal"> Supplier Order </span>
							</a>
						</li>
						</ul>
                    </div>
				</li>  
				<?php } if( $menuname == 'Human Resource'){ ?>
				<li class="nav-item" >
					<a data-bs-toggle="collapse" href="#pagesExamples2" class="nav-link collapsed" aria-controls="pagesExamples" role="button" aria-expanded="false">
					<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;">
					<i class="fas fa-users"></i>
					</div>
						<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Human Resource</span>
					</a>
					<div class="collapse" id="pagesExamples2">
						<ul class="nav ms-4 ps-3" style="list-style-type: none !important;" >
						<li class="nav-item">
							<a data-bs-toggle="collapse" href="#pagesExamples5" class="nav-link collapsed" aria-controls="pagesExamples5" role="button" aria-expanded="false">
								<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Employee Management</span>
							</a>
							<div class="collapse" id="pagesExamples5">
								<ul class="nav ms-2 ps-1">
									<li class="nav-item">
									<a class="nav-link" href="<?= base_url(); ?>admin/employeeManagement/all_employees">
											<span class="sidenav-mini-icon"> R </span>
											<span class="sidenav-normal"> Registered Employee </span>
										</a>
									</li>
									<li class="nav-item">
									<a class="nav-link" href="<?= base_url(); ?>admin/employeeManagement/all_ArchiveEmployees">
											<span class="sidenav-mini-icon"> A </span>
											<span class="sidenav-normal"> Archive Employee </span>
										</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link " href="<?= base_url(); ?>admin/ServiceCategoryCtl/all_therapists">
											<span class="sidenav-mini-icon"> T </span>
											<span class="sidenav-normal"> Therapists </span>
										</a>
									</li>
									<!--<li class="nav-item">
										<a class="nav-link" href="<?= base_url(); ?>admin/employeeManagement/allEmployeeSalary">
											<span class="sidenav-mini-icon"> E </span>
											<span class="sidenav-normal"> Employee Salary </span>
										</a>
									</li>-->
									<li class="nav-item">
									<a data-bs-toggle="collapse" href="#pagesExamples13" class="nav-link collapsed" aria-controls="pagesExamples13" role="button" aria-expanded="false">
										<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Employee Salary</span>
									</a>
									<div class="collapse" id="pagesExamples13">
										<ul class="nav ms-2 ps-1">
											<li class="nav-item">
												<a class="nav-link" href="<?= base_url(); ?>admin/employeeManagement/allEmployeeSalary">
													<span class="sidenav-mini-icon"> F </span>
													<span class="sidenav-normal"> Full Time Pay </span>
												</a>
											</li>
											<li class="nav-item">
											<a class="nav-link" href="<?= base_url(); ?>admin/employeeManagement/all_PartnerShare">
													<span class="sidenav-mini-icon"> P </span>
													<span class="sidenav-normal"> Partner Share </span>
												</a>
											</li>
											<li class="nav-item ">
												<a class="nav-link " href="<?= base_url(); ?>admin/PartTime">
													<span class="sidenav-mini-icon"> P </span>
													<span class="sidenav-normal"> Part Time </span>
												</a>
											</li>
											
											
										</ul>
									</div>
								</li>
									<!--<li class="nav-item">
										<a class="nav-link" href="<?= base_url(); ?>admin/Pay_Structure/allPay_Structure">
											<span class="sidenav-mini-icon"> P </span>
											<span class="sidenav-normal"> Pay Structure </span>
										</a>
									</li>-->
								</ul>
							</div>
						</li>
		
						<li class="nav-item">
							<a data-bs-toggle="collapse" href="#pagesExamples6" class="nav-link collapsed" aria-controls="pagesExamples6" role="button" aria-expanded="false">
								<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Leave Management</span>
							</a>
							<div class="collapse" id="pagesExamples6">
								<ul class="nav ms-2 ps-1">
									<li class="nav-item">
									<a class="nav-link" href="<?= base_url(); ?>admin/employeeManagement/allLeaveList">
											<span class="sidenav-mini-icon"> E </span>
											<span class="sidenav-normal"> Employee's Leave </span>
										</a>
									</li>
									<li class="nav-item">
									<a class="nav-link" href="<?= base_url(); ?>admin/employeeManagement/all_holidaysList">
											<span class="sidenav-mini-icon"> H </span>
											<span class="sidenav-normal"> Holidays </span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
						<li class="nav-item">
							<a class="nav-link " href="<?= base_url(); ?>admin/employeeManagement/allAttendance">
								<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Employee Attendance</span>
							</a>
						</li> 


						</ul>
					</div>
				</li>
				<?php } if( $menuname == 'Admin User'){ ?>
				<li class="nav-item" >
					<a data-bs-toggle="collapse" href="#pagesExamples3" class="nav-link collapsed" aria-controls="pagesExamples" role="button" aria-expanded="false">
					<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;">
					<i class="far fa-user"></i>
					</div>
						<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Admin User </span>
					</a>
					<div class="collapse" id="pagesExamples3" style="">
						<ul class="nav ms-4 ps-3">
							<li class="nav-item ">
								<a class="nav-link  " href="<?= base_url(); ?>admin/UserManagement/user_details">
									<span class="sidenav-mini-icon"> U </span>
									<span class="sidenav-normal"> Users </span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<?php } if( $menuname == 'Customer Management'){ ?>
						
				<?php /*	<li class="nav-item">
					<a class="nav-link  " href="<?= base_url(); ?>admin/welcome/customer">
						<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;">
						<i class="fa fa-user"></i>
						</div>
						<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Customer Management</span>
					</a>
					</li> */ ?>
					<li class="nav-item">
							<a data-bs-toggle="collapse" href="#pagesExamples12" class="nav-link collapsed" aria-controls="pagesExamples12" role="button" aria-expanded="false">
							<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;"><i class="far fa-handshake"></i>
							</div>
								<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Customer Management</span>
							</a>
							<div class="collapse" id="pagesExamples12" style="">
								<ul class="nav ms-4 ps-3">
									<li class="nav-item ">
									<a class="nav-link  " href="<?= base_url(); ?>admin/welcome/customer">
											<span class="sidenav-mini-icon"> C </span>
											<span class="sidenav-normal"> Customers </span>
									</a>
									</li>
									<?php /*<li class="nav-item ">
									<a class="nav-link  " href="<?= base_url(); ?>admin/welcome/all_CreditWallet">
											<span class="sidenav-mini-icon"> C </span>
											<span class="sidenav-normal"> Credit Wallet </span>
										</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link  " href="<?= base_url(); ?>admin/welcome/all_ExpenseWallet">
											<span class="sidenav-mini-icon"> E </span>
											<span class="sidenav-normal"> Expense Wallet </span>
										</a>
									</li> */ ?>
								</ul>
							</div>
						</li> 

					<?php } if( $menuname == 'Course Management'){ ?>
                     
						<li class="nav-item">
							<a data-bs-toggle="collapse" href="#pagesExamples10" class="nav-link collapsed" aria-controls="pagesExamples10" role="button" aria-expanded="false">
							<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;">
								<i class="far fa-handshake"></i>
							</div>
								<span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Course Management</span>
							</a>
							<div class="collapse" id="pagesExamples10" style="">
								<ul class="nav ms-4 ps-3">
									<li class="nav-item ">
									<a class="nav-link  " href="<?= base_url(); ?>admin/CourseManagement/all_courses">
											<span class="sidenav-mini-icon"> C </span>
											<span class="sidenav-normal"> Courses </span>
									</a>
									</li>
									<li class="nav-item ">
									<a class="nav-link  " href="<?= base_url(); ?>admin/CourseManagement/all_studentRegistrationForm">
											<span class="sidenav-mini-icon"> S </span>
											<span class="sidenav-normal"> Students </span>
										</a>
									</li>
									<?php /* <li class="nav-item ">
										<a class="nav-link  " href="<?= base_url(); ?>admin/OrderManagement/all_DeliveryDetails">
											<span class="sidenav-mini-icon"> D </span>
											<span class="sidenav-normal"> Delivery Management </span>
										</a>
									</li>*/ ?>
								</ul>
							</div>
						</li>  
						<?php } if( $menuname == 'Lead Management'){ ?>
                     
						 <li class="nav-item">
							 <a data-bs-toggle="collapse" href="#pagesExamples11" class="nav-link collapsed" aria-controls="pagesExamples11" role="button" aria-expanded="false">
							 <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="background-color:#61d3d4 !important;">
								 <i class="far fa-handshake"></i>
							 </div>
								 <span class="nav-link-text ms-1" style="color:#000000; font-weight:bold; font-zise:14px !important;">Lead Management</span>
							 </a>
							 <div class="collapse" id="pagesExamples11" style="">
								 <ul class="nav ms-4 ps-3">
									 <li class="nav-item ">
									 <a class="nav-link  " href="<?= base_url(); ?>admin/LeadManagement/all_leads">
											 <span class="sidenav-mini-icon"> L </span>
											 <span class="sidenav-normal"> Leads </span>
									 </a>
									 </li>
									<?php /* <li class="nav-item ">
									 <a class="nav-link  " href="<?= base_url(); ?>admin/CourseManagement/all_studentRegistrationForm">
											 <span class="sidenav-mini-icon"> C </span>
											 <span class="sidenav-normal"> Students </span>
										 </a>
									 </li>
									  <li class="nav-item ">
										 <a class="nav-link  " href="<?= base_url(); ?>admin/OrderManagement/all_DeliveryDetails">
											 <span class="sidenav-mini-icon"> D </span>
											 <span class="sidenav-normal"> Delivery Management </span>
										 </a>
									 </li>*/ ?>
								 </ul>
							 </div>
						 </li>  

		<?php		}
				}
		 	}
		?>
       
       
      </ul>
    </div>
    
  </aside>
  <?php 
		}else
		{
		redirect('admin', 'refresh');
		}
  ?>
 
  <!--   Core JS Files   -->

  
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <!--<script src="<?= base_url(); ?>assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>-->

