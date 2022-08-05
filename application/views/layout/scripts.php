
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>assets/js/core/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/js/core/bootstrap.min.js"></script>

<!-- <script src="<?= base_url(); ?>assets/bootstrap/js/jquery.min.js"></script> -->
<script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/bootstrap/js/typehead.js"></script>

<!-- jQuery -->
<!-- <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- DataTables  & Plugins -->
<!--<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>



<!-- ChartJS -->
<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>

<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!--toastr -->
<script src="<?= base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false, "ordering": false, 
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": true,
      "responsive": true,
    });
  });
	$(document).ready(function() {
		//customer_table
    $('#customer_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'csv', 'excel', 'pdf'
        ]
    });
		//Employee_table
    $('.Employee_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'csv', 'excel', 'pdf'
        ]
    });
		//lead_table
    $('#lead_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'csv', 'excel', 'pdf'
        ]
    });
		//order_table
		$('#order_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            
            ]
    });
		//currentOrder_table
		$('#currentOrder_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [ 
        ]
    });
		//complatedOrder_table
		$('#complatedOrder_table').DataTable( {
        dom: 'Bfrtip',
        buttons: []
    });
		//CanceledOrder_table
		$('#CanceledOrder_table').DataTable( {
        dom: 'Bfrtip',
        buttons: []
    });
		//supplier_table
		$('.supplier_table').DataTable( {
						dom: 'Bfrtip',
						buttons: [
						]
    });
		//product_table
		$('.product_table').DataTable( {
						dom: 'Bfrtip',
						buttons: ['csv', 'excel', 'pdf']
    });
		//service_table
		$('.service_table').DataTable( {
						dom: 'Bfrtip',
						buttons: []
    });
		//dailySales_table
		/*$('.dailySales_table').DataTable({
						dom: 'Bfrtip',
						searching: false,
						buttons: ['csv', 'excel', 'pdf']
    });*/
		//salary_table
		$('.salary_table').DataTable( {
						dom: 'Bfrtip',
						buttons: []
    });
		//fultimeSalaryTable
		$('.fultimeSalaryTable').DataTable( {
						dom: 'Bfrtip',
						buttons: []
    });
});
</script>
