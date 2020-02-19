        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card shadow mb-12">
          <div class="card-header py-3">
            <!-- Page Heading -->
            <div  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h1 class="h1 mb-0 text-gray-800 ">Data Cluster</h1>
            </div>

            <div class="card-body" style="background-color: #FFFFFF;">
              <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
                  <button class="btn btn-primary" data-toggle="modal" data-target="#addmodal">Add Cluster</button>
              </div>

              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <div class="btn-group">
                      <select id="fl-perumahan" class="custom-select">
                          <option selected value="default">Perumahan</option>
                      </select>
                  </div>
              </div>

              <!--table-->
              <table id="table1" class="table table-striped table-bordered nowrap" style="width:100%">
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
        </div>
        <!-- /.container-fluid -->
        </div>
      </div>
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
                        <input type="hidden" class="form-control" id="id-cluster1" value="" readonly>
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
    
    <!-- responsive  -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <script src="<?php echo base_url('dist/vendor/datatables/jquery.dataTables.js');?>"></script>
    <script src="<?php echo base_url('dist/js/table.js');?>"></script>
  
  <script>
    $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_all_perumahan",
        type: 'POST',
        success: function (json) {
          var response = JSON.parse(json);
          response.forEach((data)=>{
            var res = data.nama_perumahan.replace(/_/g, " ");
            $('#fl-perumahan').append(new Option(res, data.IDPerumahan))
          })
        },
        error: function (xhr, status, error) {
          alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
          $("#submit").prop("disabled", false);
        }
      });

    $("#fl-perumahan").change(function (e) { 
      e.preventDefault();
      get_data();
    });

    function get_filter_value(){
      var perumahan = $("#fl-perumahan").val();
      if(perumahan == "default"){
        perumahan = null;
      }
      return {
        perumahan: perumahan
      }
    }

    function get_data(){
      var data = get_filter_value();
      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_all_cluster",
        type: 'POST',
        data: data,
        success: function (json) {
          var response = JSON.parse(json);
          dTable.clear().draw();
          response.forEach((data)=>{
            var tes = data.nama_cluster.replace(/_/g, " ");
            
            no = data.IDCluster                       
            if(data.IDCluster != null) {
              dTable.row.add([
                tes,
                  '<button class="btn btn-outline-success mt-10 mb-10"><a onclick=tampildata("'+ no +'") >Edit</a></button>'
                + '<button class="btn btn-danger mt-10 mb-10" ><a onclick=hapusdata("'+ no +'") >Delete</a></button>'
              
              ]).draw(false);
            }
            
          })
        },
        error: function (xhr, status, error) {
          alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
          $("#submit").prop("disabled", false);
        }
      });
    }

    $(document).ready(function () { 
      dTable = $('#table1').DataTable({
        responsive: true
      });
      listperumahan();
      get_data()
    });

    function listperumahan(){
      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_list_perumahan",
        type: 'POST',
        success: function (response) {
              var hasil = JSON.parse(response);
              hasil.forEach((data)=>{
                var res = data.nama_perumahan.replace(/_/g, " ");
                $('#perumahan1').append('<option value="'+ res +'">'+ res +'</option>'); 
                $('#perumahan').append('<option value="'+ res +'">'+ res +'</option>');                  
              })
          },
          error: function () {
              console.log("gagal menghapus");

          }
      });
    }


    function hapusdata(id) {
      var tanya = confirm("hapus?");

      if(tanya){
        $.ajax({
          url: "<?php echo base_url() ?>index.php/Main/delete_cluster",
          type: 'POST',
          data: {id: id},
          success: function (response) {
              window.location = "<?php echo base_url() ?>index.php/Main/cluster";
          },
          error: function () {
              console.log("gagal menghapus");

          }
        });
      }
    }

    function tampildata(id) {
      $.ajax({
        url: "<?php echo base_url()?>index.php/Main/get_cluster_by_id",
        type: 'POST',
        data: {id: id},
        success: function (response) {
          var response = JSON.parse(response);
          response.forEach((data)=>{
            var res = data.nama_perumahan.replace(/_/g, " ");
            var tes = data.nama_cluster.replace(/_/g, " ");
            
            $('#editmodal').modal();
            $("#id-cluster1").val(data.IDCluster);
            $('#nama-cluster1').val(tes);
            $('#perumahan1').val(res);
            $('#updatedata').click(function editdata() {
            
            var inputid = document.getElementById("id-cluster1").value
            var inputperumahan = document.getElementById("perumahan1").value
            var inputnama = document.getElementById("nama-cluster1").value
                        
              $.ajax({
                url: "<?php echo base_url()?>index.php/Main/update_cluster/",
                type: 'POST',
                data: {id:inputid, nama:inputnama, perumahan:inputperumahan},
                success: function (response) {
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
      var inputperum = document.getElementById("perumahan").value
      var inputnama = document.getElementById("nama-cluster").value

      $.ajax({
        url: "<?php echo base_url()?>index.php/Main/insert_cluster/",
        type: 'POST',
        data: {perum:inputperum, nama:inputnama},
        success: function (response) {
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
