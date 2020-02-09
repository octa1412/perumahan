
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('dist/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('dist/vendor/datetimepicker/css/bootstrap-datepicker.min.css');?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('dist/css/sb-admin-2.min.css');?>" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h1 mb-0 text-gray-800 ">Arsip Blok A2</h1>
          </div>

          <div class="d-sm-flex align-items-center mb-4">
						
						
						<div class="id-none form-inline ml-md-3 input-daterange">
							<input type="text" class="form-control" >
							<div class="input-group-text justify-content-sm-center">to</div>
							<input type="text" class="form-control" >
						</div>
						
            <form class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0 mw-100 navbar-search">
							<div class="input-group">
								<input type="text" id="searchbox" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
								<div class="input-group-append">
										<button class="btn btn-primary" type="button">
										<i class="fas fa-search fa-sm"></i>
										</button>
								</div>
							</div>
            </form>
          </div>

					<!--table-->
					<table id="table" class="display">
						<thead>
							<tr>
								<th>ID Nota</th>
								<th>Tanggal Pembayaran</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>01222020</td>
								<td>9 November 2019</td>
								<td>
									<button class="btn btn-outline-primary mt-10 mb-10">Detail</button>
								</td>
							</tr>
							<tr>
								<td>02222020</td>
								<td>12 Desember 2019</td>
								<td>
									<button class="btn btn-outline-primary mt-10 mb-10">Detail</button>
								</td>
							</tr>
						</tbody>
					</table>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=base_url("index.php/Main/logoutuser");?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('dist/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('dist/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('dist/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('dist/js/sb-admin-2.min.js');?>"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('dist/vendor/chart.js/Chart.min.js');?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('dist/js/demo/chart-area-demo.js');?>"></script>
  <script src="<?php echo base_url('dist/js/demo/chart-pie-demo.js');?>"></script>

	<script src="<?php echo base_url('dist/vendor/datatables/jquery.dataTables.js');?>"></script>
	<script src="<?php echo base_url('dist/js/table.js');?>"></script>
	<script src="<?php echo base_url('dist/vendor/datetimepicker/js/bootstrap-datepicker.min.js');?>"></script>
	<script>
  
    $('.input-daterange').datepicker({
        format: 'yyyy-mm-dd'    // pass here your desired format
    });
    $('.input-daterange').change(function(e){
      get_arsip();
    })

    function get_filter_value(){
      var date = []
      $('.input-daterange input').each(function() {
        date.push($(this).datepicker('getDate'))
      });
      if(date[0]!=null){
        return {
          startDate: date[0].getFullYear() +'-'+ date[0].getMonth()+1 +'-'+ date[0].getDate(),
          endDate: date[1].getFullYear() +'-'+ date[1].getMonth()+1 +'-'+ date[1].getDate()
        }
      } else{
        return {
          startDate: null,
          endDate: null
        }
      }
    }
    function get_arsip(){
      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_all_arsip/0",
        type: 'POST',
        success: function (json) {
          var response = JSON.parse(json);
          response.forEach((data)=>{
            dTable.row.add([
              data.bulan+' '+ data.tahun, 
              data.tanggal,
              '<button class="btn btn-outline-primary mt-10 mb-10">Detail</button>'
            ]).draw(false);
            
          })
          // $("tbody").append()
        },
        error: function (xhr, status, error) {
          alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
          $("#submit").prop("disabled", false);
        }
      });
    }

    $(document).ready(function () {
      dTable = $('#table').DataTable();
      get_arsip();
    });

  </script>

</body>

</html>
