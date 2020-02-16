        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card shadow mb-12">
          <div class="card-header py-3">

            <!-- Page Heading -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h1 class="h1 mb-0 text-gray-800 ">Data Perumahan</h1>
            </div>

            <div class="card-body" style="background-color: #FFFFFF;">
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addmodal">Add Perumahan</button>
                
              </div>        

              <!-- DataTales Example -->
              <table id="table1" class="table table-striped table-bordered nowrap" style="width:100%">
                  <thead>
                      <tr>
                          <th>Nama Perumahan</th>
                          <th>Kota</th>                        
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody id="target">          
                  </tbody>
              </table>
            </div>
          </div>
        </div>
        </div>
        <!-- /.container-fluid -->

        <!-- modal edit -->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="editTitle">Edit Perumahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="editform">
                  <div class="form-group">
                    <label class="col-form-label">Id Perumahan:</label>
                    <input type="text" class="form-control" id="id-perumahan1" value="" readonly>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Nama Perumahan:</label>
                    <input type="text" class="form-control" id="nama-perumahan1">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Kota:</label>
                    <input type="text" class="form-control" id="nama-kota1">
                  </div>
                 
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="updatedata">Update</button>
              </div>
            </div>
          </div>
        </div> 

        <!-- modal add -->
        <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="addTitle">Add Perumahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label class="col-form-label">Id Perumahan:</label>
                    <input type="text" class="form-control" id="id-perumahan" placeholder="ID Perumahan...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Nama Perumahan:</label>
                    <input type="text" class="form-control" id="nama-perumahan" placeholder="Nama Perumahan..." >
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Kota:</label>
                    <input type="text" class="form-control" id="nama-kota" placeholder="Kota...">
                  </div>
                 
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="insertdata()">Add</button>
              </div>
            </div>
          </div>
        </div>  
      

      </div>
      <!-- End of Main Content -->

     
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

  
  <script>
        $(document).ready(function () { 
          dTable = $('#table1').DataTable({
            responsive: true
          });
          $.ajax({
            url: "<?php echo base_url() ?>index.php/Main/get_all_perumahan",
            type: 'POST',
            success: function (json) {
              var response = JSON.parse(json);
              response.forEach((data)=>{
                no = data.IDPerumahan
                dTable.row.add([
                  data.nama_perumahan,
                  data.kota,
                    '<button class="btn btn-outline-success mt-10 mb-10"><a onclick=tampildata("'+ no +'") >Edit</a></button>'
									+ '<button class="btn btn-danger mt-10 mb-10" ><a onclick=hapusdata("'+ no +'") >Delete</a></button>'
                
                ]).draw(false);
                
              })
              // $("tbody").append()
              // console.log(response[0]);
            },
            error: function (xhr, status, error) {
              alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
              $("#submit").prop("disabled", false);
            }
          });
        });

        function hapusdata(id) {
           var tanya = confirm("hapus data?");

           if(tanya){
              $.ajax({
                url: "<?php echo base_url() ?>index.php/Main/delete_perumahan/",
                type: 'POST',
                data: {id: id},
                success: function (response) {
                    window.location = "<?php echo base_url() ?>index.php/Main/dashboardadmin";
                },
                error: function () {
                    console.log("gagal menghapus");

                }
             });
           }
        }

        function tampildata(id) {
          var dataString = $("#editform").serialize();

          $.ajax({
            url: "<?php echo base_url()?>index.php/Main/get_perumahan_by_id",
            type: 'POST',
            data: {id: id},
            success: function (response) {
              console.log(response);

              var response = JSON.parse(response);
              response.forEach((data)=>{
                console.log(dataString);
                $('#editmodal').modal();
                $("#id-perumahan1").val(data.IDPerumahan);
                $('#nama-perumahan1').val(data.nama_perumahan);
                $('#nama-kota1').val(data.kota);
                $('#updatedata').click(function editdata() {
                
                var inputid = document.getElementById("id-perumahan1").value
                var inputnama = document.getElementById("nama-perumahan1").value
                var inputkota = document.getElementById("nama-kota1").value

                  $.ajax({
                    url: "<?php echo base_url()?>index.php/Main/update_perumahan/",
                    type: 'POST',
                    data: {id:inputid, nama:inputnama, kota:inputkota},
                    success: function (response) {
                      console.log(response);
                      window.location = "<?php echo base_url() ?>index.php/Main/dashboardadmin";
                    },
                    error: function () {
                      console.log("gagal update");
                    }
                  });
                });
              })                
            },
            error: function () {
                console.log("gagal menghapus");
            }
          });          
        }

        function insertdata() {
          var inputid = document.getElementById("id-perumahan").value
          var inputnama = document.getElementById("nama-perumahan").value
          var inputkota = document.getElementById("nama-kota").value

          $.ajax({
            url: "<?php echo base_url()?>index.php/Main/insert_perumahan/",
            type: 'POST',
            data: {id:inputid, nama:inputnama, kota:inputkota},
            success: function (response) {
              console.log(response);
              window.location = "<?php echo base_url() ?>index.php/Main/dashboardadmin";
            },
            error: function () {
              console.log("gagal update");
            }
          });

        }
      </script>

</body>

</html>
