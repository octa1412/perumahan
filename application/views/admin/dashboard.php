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
                    <input type="hidden" class="form-control" id="id-perumahan1" value="" readonly>
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
                <form onsubmit="insertdata(event)">                  
                  <div class="form-group">
                    <label class="col-form-label">Nama Perumahan:</label>
                    <input type="text" class="form-control" id="nama-perumahan" placeholder="Nama Perumahan..." required>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Kota:</label>
                    <input type="text" class="form-control" id="nama-kota" placeholder="Kota..."  required>
                  </div>                 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
                </form>
            </div>
          </div>
        </div>  
      

      </div>
      <!-- End of Main Content -->


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
          $(".dataTables_empty").text("Loading...")
          $.ajax({
            url: "<?php echo base_url() ?>index.php/Main/get_all_perumahan",
            type: 'POST',
            success: function (json) {
              var response = JSON.parse(json);
              var array={};
              if(response.length > 0){
                response.forEach((data)=>{
                  var res = data.nama_perumahan.replace(/_/g, " ");
                  no = data.IDPerumahan
                  dTable.row.add([
                    res,
                    data.kota,
                      '<button class="btn btn-outline-success mt-10 mb-10" onclick=tampildata("'+ no +'") >Edit</button>'
                    + '<button class="btn btn-danger mt-10 mb-10" onclick=hapusdata("'+ no +'") >Delete</button>'
                  
                  ]).draw(false);
                  
                })
              } else{
                $(".dataTables_empty").text("Tidak ada data yang ditampilkan.")
              }
            },
            error: function (xhr, status, error) {
              alert('Terdapat Kesalahan Pada Server...');
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
                    alert('Data Berhasil Dihapus!');
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
              // console.log(response);

              var response = JSON.parse(response);
              response.forEach((data)=>{
                // console.log(dataString);
                var res = data.nama_perumahan.replace(/_/g, " ");
                $('#editmodal').modal();
                $("#id-perumahan1").val(data.IDPerumahan);
                $('#nama-perumahan1').val(res);
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
                      // console.log(response);
                      alert('Data Berhasil Diedit!');
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
                console.log("gagal update");
            }
          });          
        }

        function insertdata(e) {
          var inputnama = document.getElementById("nama-perumahan").value
          var inputkota = document.getElementById("nama-kota").value
          e.preventDefault();


          $.ajax({
            url: "<?php echo base_url()?>index.php/Main/insert_perumahan/",
            type: 'POST',
            data: {nama:inputnama, kota:inputkota},
            success: function (response) {
              // console.log(response);
              alert('Data Berhasil Ditambahkan!');
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
