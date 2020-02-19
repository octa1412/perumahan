        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card shadow mb-12">
          <div class="card-header py-3">

          <!-- Page Heading -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h1 class="h1 mb-0 text-gray-800 ">Arsip Blok A2</h1>
          </div>

          <div class="card-body" style="background-color: #FFFFFF;">
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
            <table id="table1" class="table table-striped table-bordered nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>ID Nota</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              
              </tbody>
            </table>

          </div>
        </div>
        </div>  
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- pdf Modal-->
      <div class="modal fade" id="pdfmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Print Laporan?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              </div>
              <div class="modal-footer">
              <a class="btn btn-secondary" href="<?=base_url("index.php/Main/cetak_pdf_diskon/" );?>" id="pdfdiskon" target="_blank">Laporan + Diskon</a>
              <a class="btn btn-primary" href="<?=base_url("index.php/Main/cetak_pdf/" );?>" id="pdfdata" target="_blank">Laporan</a>
              </div>
          </div>
          </div>
      </div>

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

  <!-- responsive  -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

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
          startDate: date[0].getFullYear() +'-'+ parseInt(date[0].getMonth()+1) +'-'+ date[0].getDate(),
          endDate: date[1].getFullYear() +'-'+ parseInt(date[1].getMonth()+1) +'-'+ date[1].getDate()
        }
      } else{
        return {
          startDate: null,
          endDate: null
        }
      }
    }
    function get_arsip(){
      var data = get_filter_value();
      data.id = "<?php echo $idBlok?>"
      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_all_arsip/",
        type: 'POST',
        data: data,
        success: function (json) {
          dTable.clear().draw();
          var response = JSON.parse(json);
          response.forEach((data)=>{
            dTable.row.add([
              data.bulan+' '+ data.tahun, 
              data.tanggal,
              '<button class="btn btn-outline-primary mt-10 mb-10" onclick=goToPdf("'+data.IDNota+'")>Detail</button>'
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
      dTable = $('#table1').DataTable({
        responsive:true
      });
      get_arsip();
    });

    function goToPdf(id){
      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/view_pdf/",
        type: 'POST',
        data: {data:id},
        success: function (json) {
          var o = json;
         
          $('#pdfmodal').modal();
          $('#pdfdata').click(function pdftampil() {
              $.ajax({
                  url:"<?php echo base_url() ?>index.php/Main/cetak_pdf",
                  type: 'POST',
                  data: {id:o},
                  success: function (hasil) {
                      console.log(hasil);

                  },
                  error: function (xhr, status, error) {
                  alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
                  $("#submit").prop("disabled", false);
                  }
              });
          });    

          $('#pdfdiskon').click(function pdftampil() {
              $.ajax({
                  url:"<?php echo base_url() ?>index.php/Main/cetak_pdf_diskon",
                  type: 'POST',
                  data: {id:o},
                  success: function (hasil) {
                      console.log(hasil);

                  },
                  error: function (xhr, status, error) {
                  alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
                  $("#submit").prop("disabled", false);
                  }
              });
          });                                                                  
        },
        error: function (xhr, status, error) {
        alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
        $("#submit").prop("disabled", false);
        }
      });
    }

  </script>

</body>

</html>
