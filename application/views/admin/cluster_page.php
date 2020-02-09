        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-center mb-4">
                <h1 class="h1 mb-0 text-gray-800 ">Data Cluster</h1>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
                <button class="btn btn-primary" data-toggle="modal" data-target="#addmodal">Add</button>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="btn-group">
                    <select class="custom-select">
                        <option selected>Perumahan</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                
                <form class="d-none d-sm-inline-block form-inline ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
                        <th>Nama Cluster</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="data">
                    
                </tbody>
            </table>
        </div>
        <!-- /.container-fluid -->

        <!-- modal edit -->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="editTitle">Edit Cluster</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="id-cluster" class="col-form-label">Id Cluster:</label>
                        <input type="text" class="form-control" id="id-cluster1" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama-perumahan" class="col-form-label">Nama Perumahan:</label>
                        <select class="custom-select" id="perumahan1">
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama-cluster" class="col-form-label">Nama Cluster:</label>
                        <input type="text" class="form-control" id="nama-cluster1">
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
                <h5 class="modal-title w-100 text-center" id="addTitle">Add Cluster</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="id-cluster" class="col-form-label">Id Cluster:</label>
                    <input type="text" class="form-control" id="id-cluster" placeholder="ID Cluster...">
                  </div>
                  <div class="form-group">
                    <label for="nama-perumahan" class="col-form-label">Nama Perumahan:</label>
                    <select class="custom-select" id="perumahan">
                        
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nama-cluster" class="col-form-label">Nama Cluster:</label>
                    <input type="text" class="form-control" id="nama-cluster" placeholder="Nama Cluster...">
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
    $(document).ready(function () { 
      dTable = $('#table').DataTable();
      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_all_cluster",
        type: 'POST',
        success: function (json) {
          var response = JSON.parse(json);
          response.forEach((data)=>{
            no = data.IDCluster
            $('#perumahan1').append('<option value="'+ data.nama_perumahan +'">'+ data.nama_perumahan +'</option>'); 
            $('#perumahan').append('<option value="'+ data.nama_perumahan +'">'+ data.nama_perumahan +'</option>');             
            if(data.IDCluster != null) {
              dTable.row.add([
                data.nama_cluster,
                  '<button class="btn btn-outline-success mt-10 mb-10"><a onclick=tampildata("'+ no +'") >Edit</a></button>'
                + '<button class="btn btn-danger mt-10 mb-10" ><a onclick=hapusdata("'+ no +'") >Delete</a></button>'
              
              ]).draw(false);
            }
            
          })
          // $("tbody").append()
          console.log(response[0]);
        },
        error: function (xhr, status, error) {
          alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
          $("#submit").prop("disabled", false);
        }
      });
    });

    function hapusdata(id) {
      var tanya = confirm("hapus?");

      if(tanya){
        $.ajax({
          url: "<?php echo base_url() ?>index.php/Main//",
          type: 'POST',
          data: {id: id},
          success: function (response) {
              console.log(response);
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
        url: "<?php echo base_url()?>index.php/Main/get_cluster_by_id",
        type: 'POST',
        data: {id: id},
        success: function (response) {
          var response = JSON.parse(response);
          response.forEach((data)=>{
            console.log(dataString);
            $('#editmodal').modal();
            $("#id-cluster1").val(data.IDCluster);
            $('#nama-cluster1').val(data.nama_cluster);
            $('#perumahan1').val(data.nama_perumahan);
            $('#updatedata').click(function editdata() {
            
            var inputid = document.getElementById("id-cluster1").value
            var inputperumahan = document.getElementById("perumahan1").value
            var inputnama = document.getElementById("nama-cluster1").value
                        
              $.ajax({
                url: "<?php echo base_url()?>index.php/Main/update_cluster/",
                type: 'POST',
                data: {id:inputid, nama:inputnama, perumahan:inputperumahan},
                success: function (response) {
                  console.log(response);
                  window.location = "<?php echo base_url() ?>index.php/Main/cluster";
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
      var inputid = document.getElementById("id-cluster").value
      var inputperum = document.getElementById("perumahan").value
      var inputnama = document.getElementById("nama-cluster").value

      $.ajax({
        url: "<?php echo base_url()?>index.php/Main/insert_cluster/",
        type: 'POST',
        data: {id:inputid, perum:inputperum, nama:inputnama},
        success: function (response) {
          console.log(response);
          window.location = "<?php echo base_url() ?>index.php/Main/cluster";
        },
        error: function () {
          console.log("gagal update");
        }
      });

    }
  
  </script>



</body>

</html>
