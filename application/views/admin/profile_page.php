        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-center mb-4">
                <h1 class="h1 mb-0 text-gray-800 ">Profile</h1>
            </div>

            <!--form-->
            <div class="card shadow mb-12">
              <div class="card-header py-3">
              <form>
                  <div class="form-group">
                      <label for="nama" class="col-form-label">Nama:</label>
                      <input type="text" class="form-control" id="nama" value="" readonly>
                  </div>
                  <div class="form-group">
                      <label for="id-blok" class="col-form-label">Id Blok:</label>
                      <input type="text" class="form-control" id="id-blok" value="" readonly>
                  </div>
                  <div class="form-group">
                      <label for="nama-perumahan" class="col-form-label">Nama Perumahan:</label>
                      <select class="custom-select">
                          <option selected>Zero</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="nama-cluster" class="col-form-label">Nama Cluster:</label>
                      <select class="custom-select">
                          <option selected>Zero</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="nama-blok" class="col-form-label">Nama Blok:</label>
                      <input type="text" class="form-control" id="nama-blok">
                  </div>

                  <button class="btn btn-primary">Edit</button>
                  
              </form>
              </div>
            </div>
        </div>
        <!-- /.container-fluid -->


      </div>
      <!-- End of Main Content -->

        <script>

        function deleteblok(id) {
            $.ajax({
                    url: "<?php echo base_url() ?>index.php/delete_blok/" + id,
                    success: function (response) {
                        if (response==="success") {
                            location.reload();
                        }
                    }
                });
        }
        </script>

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
</body>

</html>
