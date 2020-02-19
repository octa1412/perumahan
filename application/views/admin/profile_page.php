        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="card shadow mb-12">
                <div class="card-header py-3">
                    <!-- Page Heading -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h1 class="h1 mb-0 text-gray-800 ">Profile</h1>
                    </div>

                
                    <!--form-->
                    <div class="card-body" style="background-color: #FFFFFF;">
                        <form>
                                <div class="form-group">
                                    <label for="nama" class="col-form-label">Nama:</label>
                                    <input type="text" class="form-control" id="nama" value="">
                                </div>
                                <div class="form-group">
                                    <label for="nomor" class="col-form-label">Nomor:</label>
                                    <input type="text" class="form-control" id="nomor" value="">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <input type="text" class="form-control" id="email" value="">
                                </div>                    
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Password:</label>
                                    <input type="password" class="form-control" id="password" readonly>
                                </div>
                                <button class="btn btn-primary" onclick="doSave(event)">Edit</button>                  
                        </form>
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

    <script>
      function doSave(e){
        e.preventDefault()
        var data = {}
        data.nama = $("#nama").val();
        data.nomor = $("#nomor").val();
        data.email = $("#email").val();
        
        if($("#password").val() != ""){
          data.password = $("#password").val();
        }

        $.ajax({
            url: "<?php echo base_url() ?>index.php/Main/update_profile",
            type: 'POST',
            data: data,
            success: function (json) {
                alert(json)
            },
            error: function (xhr, status, error) {
              alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
              $("#submit").prop("disabled", false);
            }
          });
      }

        $(document).ready(function () { 
          dTable = $('#table').DataTable();
          $.ajax({
            url: "<?php echo base_url() ?>index.php/Main/get_my_profile",
            type: 'POST',
            success: function (json) {
              var response = JSON.parse(json);
              console.log(response)
              response.forEach((data)=>{
                $("#nama").val(data.nama_user);
                $("#nomor").val(data.nomor);
                $("#email").val(data.email);
                $("#password").val(data.password);
                
              })
            
            },
            error: function (xhr, status, error) {
              alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
              $("#submit").prop("disabled", false);
            }
          });
        });
    </script>

</body>

</html>
