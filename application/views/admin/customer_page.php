        <script src="<?php echo base_url('dist/vendor/jquery/jquery.min.js');?>"></script>
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card shadow mb-12">
          <div class="card-header py-3">
          <!-- Page Heading -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h1 class="h1 mb-0 text-gray-800 ">Customer</h1>
          </div>

          <div class="card-body" style="background-color: #FFFFFF;">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addmodal">Add Customer</button>
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
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Nomor</th>
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

        <!-- modal edit -->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="editTitle">Edit Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="id-customer1" class="col-form-label">Id Customer:</label>
                    <input type="text" class="form-control" id="id-customer1" readonly>
                  </div>                 
                  <div class="form-group">
                    <label for="nama1" class="col-form-label">Nama:</label>
                    <input type="text" class="form-control" id="nama1">
                  </div>
                  <div class="form-group">
                    <label for="email1" class="col-form-label">Email:</label>
                    <input type="text" class="form-control" id="email1">
                  </div>
                  <div class="form-group">
                    <label for="nomor1" class="col-form-label">Nomor:</label>
                    <input type="text" class="form-control" id="nomor1">
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
                <h5 class="modal-title w-100 text-center" id="addTitle">Add Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="id-customer" class="col-form-label">Id Customer:</label>
                    <input type="text" class="form-control" id="id-customer" placeholder="ID Anda...">
                  </div>                 
                  <div class="form-group">
                    <label for="nama" class="col-form-label">Nama:</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama Anda...">
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="text" class="form-control" id="email" placeholder="Email Anda...">
                  </div>
                  <div class="form-group">
                    <label for="nomor" class="col-form-label">Nomor:</label>
                    <input type="text" class="form-control" id="nomor" placeholder="Nomor Anda...">
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
            url: "<?php echo base_url() ?>index.php/Main/get_all_customer",
            type: 'POST',
            success: function (json) {
              var response = JSON.parse(json);
              var no = 0;
              response.forEach((data)=>{
                no++;
                dTable.row.add([
                  no,
                  data.nama,
                  data.email,
                  data.nomor,
                  '<a href="<?php echo base_url('index.php/Main/blokdetail');?>"><button class="btn btn-outline-primary mt-10 mb-10">Detail</button></a>'
									+ '<button class="btn btn-outline-success mt-10 mb-10"><a onclick=tampildata("'+ data.IDCustomer +'")>Edit</a></button>'
									+ '<button class="btn btn-danger mt-10 mb-10"><a onclick=hapusdata("'+ data.IDCustomer +'") >Delete</a></button>'
                
                ]).draw(false);                
              })
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
                url: "<?php echo base_url() ?>index.php/Main/delete_customer/",
                type: 'POST',
                data: {id: id},
                success: function (response) {
                  window.location = "<?php echo base_url() ?>index.php/Main/customer";
                },
                error: function () {
                    console.log("gagal menghapus");

                }
             });
           }
        }

        function tampildata(id) {
          $.ajax({
            url: "<?php echo base_url()?>index.php/Main/get_customer_by_id",
            type: 'POST',
            data: {id: id},
            success: function (response) {
              var response = JSON.parse(response);
              response.forEach((data)=>{
                $('#editmodal').modal();
                $("#id-customer1").val(data.IDCustomer);
                $('#nama1').val(data.nama);
                $('#email1').val(data.email);
                $('#nomor1').val(data.nomor);
                $('#updatedata').click(function editdata() {
                
                var inputid = document.getElementById("id-customer1").value
                var inputnama = document.getElementById("nama1").value
                var inputemail = document.getElementById("email1").value
                var inputnomor = document.getElementById("nomor1").value
                
                  $.ajax({
                    url: "<?php echo base_url()?>index.php/Main/update_customer/",
                    type: 'POST',
                    data: {id:inputid, nama:inputnama, email:inputemail,nomor:inputnomor},
                    success: function (response) {
                      window.location = "<?php echo base_url() ?>index.php/Main/customer";
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
          var inputid = document.getElementById("id-customer").value
          var inputnama = document.getElementById("nama").value
          var inputnomor = document.getElementById("nomor").value
          var inputemail = document.getElementById("email").value
          
          $.ajax({
            url: "<?php echo base_url()?>index.php/Main/insert_customer/",
            type: 'POST',
            data: {id:inputid, nama:inputnama, nomor:inputnomor, email:inputemail},
            success: function (response) {
              window.location = "<?php echo base_url() ?>index.php/Main/customer";
            },
            error: function () {
              console.log("gagal update");
            }
          });

        }

        function detaildata(id) {
          $.ajax({
            url: "<?php echo base_url()?>index.php/Main/insert_customer/",
            type: 'POST',
            data:{id:id},
            success: function (response) {
              console.log(response);
              window.location = "<?php echo base_url() ?>index.php/Main/blok";
            },
            error: function () {
              console.log("gagal update");
            }

          });
        }


      </script>

</body>

</html>
