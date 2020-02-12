        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card shadow mb-12">
          <div class="card-header py-3">

            <!-- Page Heading -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h1 class="h1 mb-0 text-gray-800 ">Data Arsip Pembayaran</h1>
            </div>

            <div class="card-body" style="background-color: #FFFFFF;">
              <div class="d-sm-flex align-items-center mb-4">						
                <div class="btn-group">
                  <select id='fl-perumahan' class="custom-select">
                    <option selected value="default">Perumahan</option>
                  </select>
                </div>
                <div class="btn-group">
                  <select id='fl-cluster' class="custom-select">
                    <option selected value="default">Cluster</option>
                  </select>
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
                    <th>ID Customer</th>
                    <th>Nama Blok</th>
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

	<script src="<?php echo base_url('dist/vendor/datatables/jquery.dataTables.js');?>"></script>
	<script src="<?php echo base_url('dist/js/table.js');?>"></script>
	<script src="<?php echo base_url('dist/vendor/datetimepicker/js/bootstrap-datepicker.min.js');?>"></script>
	<script>
    $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_all_perumahan",
        type: 'POST',
        success: function (json) {
          var response = JSON.parse(json);
          response.forEach((data)=>{
            $('#fl-perumahan').append(new Option(data.nama_perumahan, data.IDPerumahan))
          })
        },
        error: function (xhr, status, error) {
          alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
          $("#submit").prop("disabled", false);
        }
      });


      $('.input-daterange').datepicker();

      $("#fl-perumahan").change(function (e) { 
        e.preventDefault();
        if($("#fl-perumahan").val() != "default"){
          getClusterofPerumahan($("#fl-perumahan").val());
        }
        else{
          $("#fl-cluster option[value!=default]").remove();
        }
        get_transaksi();
      });

      $("#fl-cluster").change(function (e) { 
        e.preventDefault();
        get_transaksi();
      });
      
      function getClusterofPerumahan(id){
        $.ajax({
          url: "<?php echo base_url() ?>index.php/Main/get_cluster_by_perumahan",
          type: 'POST',
          data: {id: id},
          success: function (json) {
            $("#fl-cluster option[value!=default]").remove();
            var response = JSON.parse(json);
            response.forEach((data)=>{
              $('#fl-cluster').append(new Option(data.nama_cluster, data.IDCluster))
            })
          },
          error: function (xhr, status, error) {
            alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
            $("#submit").prop("disabled", false);
          }
        });
      }
      

    function get_filter_value(){
      var perumahan = $("#fl-perumahan").val();
      if(perumahan == "default"){
        perumahan = null;
      }
      var cluster = $("#fl-cluster").val();
      if(cluster == "default"){
        cluster = null;
      }

      return {
        perumahan: perumahan,
        cluster: cluster
      }
    }

    function get_transaksi(){
      var data = get_filter_value()
      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_transaksi",
        type: 'POST',
        data: data,
        success: function (json) {
          var response = JSON.parse(json);
          console.log(response)
          dTable.clear().draw();
          response.forEach((data)=>{
            dTable.row.add([
              data.nama, 
              data.IDBlok,
              
              '<button class="btn btn-outline-primary mt-10 mb-10" onclick=goToArsip("'+data.IDBlok+'")>Arsip</button></a>'
              + '<button class="btn btn-outline-success mt-10 mb-10" onclick=goToTagihan("'+data.IDBlok+'")>Tagihan</button></a>'
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

    function goToArsip(id){
      var form = document.createElement('form');
      document.body.appendChild(form);
      form.method = 'post';
      form.action = "<?php echo base_url('index.php/Main/arsip/');?>";

      var input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'id';
      input.value = id;
      form.appendChild(input);

      form.submit();
    }

    function goToTagihan(id){
      var form = document.createElement('form');
      document.body.appendChild(form);
      form.method = 'post';
      form.action = "<?php echo base_url('index.php/Main/iurandetail');?>"

      var input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'id';
      input.value = id;
      form.appendChild(input);

      form.submit();
    }

    $(document).ready(function () {
      dTable = $('#table').DataTable();
      get_transaksi();
    });

  </script>

</body>

</html>
