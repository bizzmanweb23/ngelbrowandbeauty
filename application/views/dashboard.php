<link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/fullcalendar.min.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.4/dist/scheduler.min.css' rel='stylesheet' />
<!-- <script src='https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js'></script> -->
<script src='https://cdn.jsdelivr.net/npm/moment@2/min/moment.min.js'></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/fullcalendar.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.4/dist/scheduler.min.js'></script>


<style>

    thead{
        background-color:transparent !important;
    }
    .d_day{
        margin: 13px;
        float: right;
        font-size: 22px !important;
    }
    .time-panel {
    background: none repeat scroll 0 0 #FAFAFA;
    border: 1px solid #D4D4D4;
    height: 140px;
    overflow: auto;
    position: absolute;
    width: 100px;
    z-index: 99999;
    display: none;
}

.time-panel-ul {
    width: 100%;
}
.time-panel-ul li {
    border: 1px solid #F0F0F0;
    float: none;
    list-style: none outside none;
    margin-left: -40px;
    padding: 0;
    text-align: left;
    width: 81px;
    border-right: 0;
    cursor: pointer;
    padding-left: 12px;
}
.time-panel-ul li:hover{
    background-color: #3A87AD;
    color: #ffffff;
}
.fc-unthemed td.fc-today {
    background: #fff !important;
}
/* Context menu */
.context-menu{
    display: none;
    position: absolute;
    border: 1px solid black;
    border-radius: 3px;
    width: 200px;
    background: white;
    box-shadow: 10px 10px 5px #888888;
	z-index: 99999999;
}

.context-menu ul{
    list-style: none;
    padding: 2px;
}

.context-menu ul li{
    padding: 5px 2px;
    margin-bottom: 3px;
    color: black;
    font-weight: bold;
    background-color: #f7ce6a;

}

.context-menu ul li:hover{
    cursor: pointer;
    *background-color: #7fffd4;
}
.chosen-container{
	width: 100% !important;
	height: 45px !important;
}
</style>    

<div class="container">
     <!-- Context-menu -->
	 <div class='context-menu'>
		 
			<ul>
			<form action="<?= base_url('admin/welcome/checkTherapist')?>" method="post">
				<input type='hidden' value='' name="therapist_id" id='therapist_id'>
				<li><div class = "col-md-12">Start Date<input type="date" name="start_date" value=""></div></li>
				<li><div class = "col-md-12">End Date<input type="date" name="end_date" value=""></div></li>
				<li><div class = "col-md-12 showAttandance"></div></li>
				<li><div class = "col-md-12"><input type="radio" name="move_to_last" value="2">Move To First </div> 
                <div class = "col-md-12"><input type="radio" name="move_to_last" value="1">Move To last</div></li>
				<li><input type="submit" class="btn btn-primary btn-custom" value="submit"> <input type="button" class="btn btn-primary btn-custom btn_close" value="Close"></li>
			</form>
			</ul>
			
        
    </div>
</div>
<div class="content-wrapper" style="margin-left: 280px;">


		<?php //end appointment ?>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card chart-card">
					<div class="card-header">
						<h4>Today Booking Summary </h4>
					</div>
					<div class="card-body pb-4">
						<div class="chart-holder">
							<?php 
							$todayAppointmentcount = count($todayAppointment);
									if($todayAppointmentcount > 0){
							?>
						
							<div class="table-responsive">
								<table class="table table-bordered table-styled mb-0">
									<thead>
										<tr>
											<th>Customer Name</th>
											<th>Contact Number</th>
											<th>Therapist Name</th>
											<th>Services</th>
											<th>Total</th>
											<th>Start Time</th>
											<th>End Time</th>
											<th>Status</th>
											<th>Payment Method</th>
											<th>View Details</th>
											<!--<th>Action</th>-->
										</tr>
									</thead>
									<tbody>
										
									<?php 
									foreach($todayAppointment as $appointments): ?>
										<tr>
											<td><?= $appointments['customer_name']?></td>
											<td>
												<span class="img-thumb">
													<span class="ml-2 "><?= $appointments['customer_number']?></span>
												</span>
											</td>
											<td><?= $appointments['first_name'].''.$appointments['last_name']?></td>
											<td><?php
												$splittedstring = explode(",", $appointments['services']);
												foreach ($splittedstring as $key => $value) {
													$service_sql = "SELECT nbb_service.service_name FROM nbb_service WHERE nbb_service.id = '".$value."'";
													$service_query = $this->db->query($service_sql);	
													foreach($service_query->result_array() as $serviceRow){
														
														echo  $service_name = $serviceRow['service_name'];

													}
													if(count($splittedstring) > 1){
														echo ',';
													}
												}
												?>
											</td>
											<td><?= $appointments['amount']?></td>
											<td><?= $appointments['start_time']?></td>
											<td><?= $appointments['end_time']?></td>
											<td>
											<?php if($appointments['status'] == 1){ ?>
												<label class="mb-0 badge badge-primary" style = "background-color: #A020F0;" title="" data-original-title="Pending">Approved</label>
											<?php }elseif($appointments['status'] == 2){ ?>
												<label class="mb-0 badge badge-success" style = "background-color: #008000;" data-original-title="Pending">Completed</label>
											<?php }elseif($appointments['status'] == 3){ ?>
												<label class="mb-0 badge badge-success" style = "background-color: #FF0000;" data-original-title="Pending">Cancel</label>
											<?php }else{ ?>
												<label class="mb-0 badge badge-danger" style = "background-color: #FFA500;" title="" data-original-title="Pending">Pending</label>
											<?php }?>
											
											</td>
											<td>
												<span class="img-thumb">
													<i class="fab fa-cc-paypal"></i>
													<span class="ml-2">Paypal</span>
												</span>
											</td>
											<td>
											<a href="<?= base_url('admin/ServiceCategoryCtl/appointment')?>" target="_blank" title="View"><label class="mb-0 badge badge-primary" data-original-title="Pending">View Detail</label><a>
											</td>
											<?php /*<td class="relative">
												<div class="action-option ">
													<ul>
														<li>
															<a href="javascript:void(0); "><i class="far fa-edit mr-2 "></i>Edit</a>
														</li>
														<li>
															<a href="javascript:void(0); "><i class="far fa-trash-alt mr-2 "></i>Delete</a>
														</li>
													</ul>
												</div>
											</td>*/ ?>
										</tr>
										<?php endforeach;  ?>
									</tbody>
								</table>
							</div>
							<?php 
								}else{

									echo "<tr><td><h5 class='font-weight-bold pl-2 product-bar'>No data found</h5></td></tr>";

								}

							?>
						</div>
					</div>
				</div>
			</div>
		<?php //end appointment ?>
   
    	<!-- Revanue Status Start -->
		<div class="col-xl-12 col-lg-12 col-md-12">
			<div class="card chart-card">
				<div class="card-body">
					<div class="row">
						
						<div class="container-fluid py-4 ">

							<h2 class="d_day">
							<span>
								<form action="" id="findDate">
									<div class="row" >
										<div class="col-xl-8 col-lg-8 col-md-8">
											<input type="date" class="form-control" id="find" name="date" value="<?= isset($_GET['date']) ? date('Y-m-d', strtotime($_GET['date'])) : date('Y-m-d') ?>" />
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4">
											<input type="submit" value="Find" class="btn btn-custom" />
										</div>
										
									</div>
									
								</form>
							</span>
							</h2>

								<div id='calendar' style="width: 1200px;"></div>
								
						</div>
							
							

						<div class="modal fade formModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="text-align:left;">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
								<h5>CREATE APPOINTMENT</h5>
									<button type="button" class="close close_btn" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								
								<div style="margin: 2px 20px 0px 4px; float: right; display: none" id="remove-block">
									<button type="button" class="btn btn-danger btn-xs ladda-button" data-style="expand-left" data-event-id="" id="remove-link"><span class="ladda-label">Remove This Event</span></button>
								</div>
								<div style="clear: both"></div>
								<form role="form" id="eventForm" class="form-horizontal">
									<div class="modal-body" style="padding-top: 10px">
										<fieldset>
											<div class="panel panel-default">
												<div class="panel-body">
													<!-- ?php $id=(int)$_GET['id']; ?-->
													<!--?php echo '<h1>'.$id.'</h1>';?-->
													<input type="hidden" class="form-control" id="thera_id" name="thera_id"  />
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label for="customer_num" class="col-sm-6 control-label">Customer Number</label>
																<input type="text" class="form-control" id="customer_num" name="customer_num" placeholder="Customer Number" pattern="[0-9]+"/>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="name" class="col-sm-6 control-label">Customer Name</label>
																<input type="text" class="form-control" id="name" name="name" placeholder="Customer Name" pattern="[a-zA-Z]+" />
															</div>
														</div>
													</div>

													<div class="form-group ">
														<label for="services" class="col-sm-6 control-label">Services 
														</label>
														<div class="col-sm-12">
														<select data-placeholder="" multiple class="chosen-select form-control" name="service[]" id="services" style="height: 45px !important;">
															<?php foreach($service as $services): ?>
															<option value="<?= $services['id']?>"><?= $services['service_name']?></option>
														<?php endforeach; ?> 
															
														</select>
														</div>
													</div>  

													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label for="amount" class="col-sm-6 control-label">Total Amount</label>
																<input type="text" class="form-control" name="amount" id="amount" placeholder="Total Amount" value="" readonly>
															</div>
														</div> 
												
														<div class="col-md-6">
															<div class="form-group">
																<label for="sduration" class="col-sm-6 control-label">Duration</label>
																<input type="text" class="form-control" name="sduration" id="sduration" placeholder="Total Duration" value="" readonly>
															</div>
														</div> 
													</div> 

													<div class="form-group">
														<label for="start-date" class="col-sm-3 control-label">Start</label>
														<div class="row">
															<div class="input-group col-sm-6 date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="start" data-link-format="yyyy-mm-dd" >
																<input type="date" class="form-control" id="start-date" name="start_date" placeholder="Start Date"  style="background-color: white; cursor: default;" />
																<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
															</div>
															<div class="col-sm-3">
																<input type="time" name="start_time" id="start-time" class="form-control"  style="background-color: white; cursor: default;"/>
															</div>
														</div>
													</div>

													<div class="form-group" id="end-group">
														<label for="end" class="col-sm-3 control-label">End</label>
														<div class="row">
															<div class="input-group col-sm-6 form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="end" data-link-format="yyyy-mm-dd">
																<input type="date" class="form-control" placeholder="End Date" name="end_date" id="end-date"  style="background-color: white; cursor: default;"/>
																<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
															</div>
															<div class="col-sm-3">
																<input type="time" name="end_time" id="end-time" class="form-control"   style="background-color: white; cursor: default;" />
															</div>
														</div> 
													</div>
													

												</div>

											</div>
											<!--- Action Links -->

										</fieldset>
									</div>
									<div class="modal-footer">
										<input type="hidden" value="-1" name="update-event" id="update-event" />
										<input type="hidden" value="" name="currentView" id="currentView" />
										<button type="button" class="btn btn-default close_btn" data-bs-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary" id="">submit</button>
									</div>
								</form>

							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
						
						
					</div>
				</div>
			</div>
		</div>
        <!-- calender  end -->



</div>
<script>
    // format time displayed
    function formatTimeStr(dateStr) {
        return dateStr;
    }

  $('#findDate').submit(function(e){
    e.preventDefault();
	$("#calendar").fullCalendar("gotoDate", $('#find').val());
  
  })  
  $("#services").change(function() {
    //   console.log($(this).val());
    //   alert('wqryrtsty');
      $.ajax({
      url: "<?= base_url("getServiceByID") ?>",
      type: "get",
      data: {
        id: $(this).val()
      },
      dataType: "json",
      success: function(data) {
        //console.log(data);
        $("#amount").val(data.totalPrice);
        $("#sduration").val(data.totalDuration);
        var start_date = $('#start-date').val();
        var start_time = $('#start-time').val();
        d = new Date(start_date + ' ' + start_time );
        d.setMinutes(d.getMinutes() + data.totalDuration);

        year = d.getFullYear();
        month = lengthCheck(parseInt(d.getMonth()) + 1);
        day = lengthCheck(d.getDate());
        hour = lengthCheck(d.getHours());
        minutes = lengthCheck(d.getMinutes());

        $('#end-date').val(year+'-'+month+'-'+day);
        $('#end-time').val(hour+':'+minutes);
      }
    })
  });


  $('#start-date').change(function(){
    var start_date = $(this).val();
    var start_time =$('#start-time').val(); 
    var sduration =$('#sduration').val();
    dateChange(start_date,start_time,sduration);
        
  })
  $('#start-time').change(function(){
    var start_date = $('#start-date').val();
    var start_time =$(this).val(); 
    var sduration =$('#sduration').val();
    dateChange(start_date,start_time,sduration);
  })


  function dateChange(start_date,start_time,sduration){
    if(start_date != '' && start_time != '' && sduration != ''){
        d = new Date(start_date + ' ' + start_time );
        d.setMinutes(d.getMinutes() + sduration);

        year = d.getFullYear();
        month = lengthCheck(parseInt(d.getMonth()) + 1);
        day = lengthCheck(d.getDate());
        hour = lengthCheck(d.getHours());
        minutes = lengthCheck(d.getMinutes());

        $('#end-date').val(year+'-'+month+'-'+day);
        $('#end-time').val(hour+':'+minutes);
    }
  }

  function lengthCheck(time){
    if(time.toString().length == 1){
        return '0'+time;
    }else{
        return time;
    }
  }
  
  $("#eventForm").submit(function(e) {
      e.preventDefault();
      //alert('shup');
       $.ajax({
           url: "<?= base_url("admin/welcome/postAppointment")?>",
           type:"POST",
           data: $("#eventForm").serialize(),
           dataType: 'json',
           success: function (response) {
             if(response==0){
                toastr.error("no therapist available"); 
                $("#eventForm")[0].reset(); 
                $(".formModal").modal('hide');
             }  
             else{
             $("#eventForm")[0].reset();
             toastr.success("Appointment created Successfully");
             $(".formModal").modal('hide');
             window.location.reload();
            $('.close').click();
             }
            }
           });
     });

  $(function() {
    $('#start-time').focus(function () {
        $('#time-panel-start').show();
    });
    $('#start-time').click(function () {
        $('#time-panel-start').show();
    });

    $('#time-panel-start ul li').click(function () {
        var selVal = $(this).attr('data-value');
        $('#start-time').val(formatTimeStr(selVal));
        $('#time-panel-start').hide();
    });

    $('#end-time').focus(function () {
        $('#time-panel-end').show();
    });
    $('#end-time').click(function () {
        $('#time-panel-end').show();
    });
    $('body').focus(function () {
        setTimeout(function () {
            $('#time-panel-start').hide();
        }, 200)
        setTimeout(function () {
            $('#time-panel-end').hide();
        }, 200)
    });


    $('#time-panel-end ul li').click(function () {
        var selVal = $(this).attr('data-value');
        $('#end-time').val(formatTimeStr(selVal));
        $('#time-panel-end').hide();
    });

    $('#calendar').fullCalendar({
	
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaDay'
		},
	
		defaultView: 'month',
        //groupByResource: true,
		initialView: 'timeGridWeek',
        selectable: 'false',
        selectHelper: 'false',
        unselectAuto: 'true',
        minTime: "10:00:00",
	    maxTime: "24:00:00",
		slotDuration: '00:30:00',
    	slotLabelInterval: 30,
   		slotMinutes: 30,
		slotLabelFormat:"HH:mm:a",
        unselectCancel: '',
		
        resources: <?php echo $cal; ?>,
		//timeFormat: "H(:mm)",
		
        select:function(start, end, jsEvent, view, resource) {
			
        $('#myModal').modal('show');
        $('#thera_id').val(resource.id);
        var dt = new Date();
        var hours   = start.format('hh');
        var minutes = start.format('mm');
        if(minutes > 30) minutes = 30;
        else minutes = 0;
        var ehours;
        if(hours > 0) ehours = hours+1;
        if(hours == 0) ehours = hours;
        if(hours == 23) ehours = hours;

        var eminutes;
        if(ehours >= 24) ehours = '0';
        if(hours > 0) eminutes = minutes;
        if(hours == 0) eminutes = '59';
        if(hours == 23) eminutes = '59';

        var mm = start.format('M');
        var dd = start.format('D');
        var yyyy = start.format('YYYY');

        if(parseInt(mm) <= 9) mm = '0'+(parseInt(mm)+0);
        if(parseInt(dd) <= 9) dd = '0'+dd;
        if(parseInt(hours) <= 9) hours = '0'+hours;
        if(parseInt(minutes) <= 9) minutes = '0'+minutes;
        if(parseInt(ehours) <= 9) ehours = '0'+ehours;
        if(parseInt(eminutes) <= 9) eminutes = '0'+eminutes;

        var curDate = yyyy+'-'+mm+'-'+dd+' '+hours+':'+minutes;
        var curDateInput = yyyy+'-'+mm+'-'+dd;

        $('#start-date').val(curDateInput);
        $('#end-date').val(curDateInput);

        var startTime12Format = formatTimeStr(hours+':'+minutes);
        var endTime12Format = formatTimeStr(ehours+':'+eminutes);

        $('#start-time').val(start.format('HH:mm'));
        $('#end-time').val(end.format('HH:mm'));

		//console.log(ev_status); 

      },
      dayClick: function(date, jsEvent, view, resourceObj) {
		
		$('#myModal').modal('show');
        $('#start-date').val(date)
        $('#thera_id').val(resourceObj.id);
        var dt = new Date();

        var hours   = dt.getHours();
        var minutes = dt.getMinutes();
        if(minutes > 30) minutes = 30;
        else minutes = 0;
        var ehours;
        if(hours > 0) ehours = hours+1;
        if(hours == 0) ehours = hours;
        if(hours == 23) ehours = hours;

        var eminutes;
        if(ehours >= 24) ehours = '0';
        if(hours > 0) eminutes = minutes;
        if(hours == 0) eminutes = '59';
        if(hours == 23) eminutes = '59';

        var mm = date.format('M');
        var dd = date.format('D');
        var yyyy = date.format('YYYY');

        if(parseInt(mm) <= 9) mm = '0'+(parseInt(mm)+0);
        if(parseInt(dd) <= 9) dd = '0'+dd;
        if(parseInt(hours) <= 9) hours = '0'+hours;
        if(parseInt(minutes) <= 9) minutes = '0'+minutes;
        if(parseInt(ehours) <= 9) ehours = '0'+ehours;
        if(parseInt(eminutes) <= 9) eminutes = '0'+eminutes;

        var curDate = yyyy+'-'+mm+'-'+dd+' '+hours+':'+minutes;
        var curDateInput = yyyy+'-'+mm+'-'+dd;

        $('#start-date').val(curDateInput);
        $('#end-date').val(curDateInput);

        var startTime12Format = formatTimeStr(hours+':'+minutes);
        var endTime12Format = formatTimeStr(ehours+':'+eminutes);

        $('#start-time').val(startTime12Format);
        $('#end-time').val(endTime12Format);

    },
	//events:[{"resourceId":"7","title":"susmita","start":"2022-07-13T10:30:00","end":"2022-07-13T10:30:00","color":"#FFA500"}],
    events: <?php echo $event; ?>,

	//eventColor: '#FFA500',

    });

    //$('#calendar table>thead tr th').addClass('context-menu-one box menu-1');
    //$('#calendar table table>tbody tr td:nth-child(2)').addClass('context-menu-one box menu-1');
   
   


   /* $('#calendar table>thead tr th').contextmenu(function() {
        var resource_id = $(this).data('resource-id');
        //$('#menu_therapist_id').val(resource_id);
        $.contextMenu({
            selector: '.context-menu-one', 
            callback: function(key, options) {
                var m = "clicked: " + key;
                window.console && console.log(m) || alert(m); 
            },
            items: {
                name: { 
                    id:"menu_therapist_id",
                    type: 'text', 
                    value:resource_id,
                    events: {
                        keyup: function(e) {
                            // add some fancy key handling here?
                            window.console && console.log('key: '+ e.keyCode); 
                        }
                    }
                },
                "daySelect": {
                    name: "Day Select", 
                    type: 'select', 
                    options: {1: 'one', 2: 'two', 3: 'three'}, 
                    selected: 2
                },

                "quit"     : { name: "Quit",              icon: "quit" }
            }
        });

    });

    $.contextMenu('update'); // update all open menus
*/
  });


  $(document).ready(function(){
	$('#calendar table>thead tr th').addClass('context-menu-one box menu-1');
	// Hide context menu
	$('.btn_close').bind('contextmenu click',function(){
		$(".context-menu").hide();
		$("#therapist_id").val("");
	});

	// disable right click and show custom context menu
	$(".context-menu-one").bind('contextmenu', function (e) {
		var id = $(this).data('resource-id');

		$("#therapist_id").val(id);

		$.ajax({
			url: "<?= base_url("admin/welcome/showTherapistAttandance")?>",
			type: 'GET',
			data: {therapist_id: id},
			//dataType: "json",
			success: function(data) {
				if(data == 0)
				{
					$('.showAttandance').html('Absent');
				}else{
					$('.showAttandance').html('Available');
					
				}

			}
		});
						
		var top = e.pageY+5;
		var left = e.pageX;

		// Show contextmenu
		if(id != 0){
		$(".context-menu").toggle(100).css({
			top: top + "px",
			left: left + "px"
		});
		}
		

		// Disable default menu
		return false;
	
		
	});

	// disable context-menu from custom menu
	$('.context-menu').bind('contextmenu',function(){
		return false;
	});
	
	// Clicked context-menu item
	// $('.context-menu li').click(function(){
	// 	var className = $(this).find("span:nth-child(1)").attr("class");
	// 	var titleid = $('#txt_id').val();
	// 	$( "#"+ titleid ).css( "background-color", className );
	// 	$(".context-menu").hide();
	// });

	$(".close_btn").click(function(){
		$("#myModal").modal("hide"); 
						
    });

});

    $(".chosen-select").chosen({
	no_results_text: "Oops, nothing found!"
	})
</script>

