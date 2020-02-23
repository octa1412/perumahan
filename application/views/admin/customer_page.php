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
            </div>

            <!--table-->
            <table id="table1" class="table table-striped table-bordered nowrap" style="width:100%">
              <thead>
                <tr>
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
              <form onsubmit="updatedata(event)">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="id_customer1" class="col-form-label">Id Customer:</label>
                    <input type="text" class="form-control" id="id_customer1" readonly>
                  </div>                 
                  <div class="form-group">
                    <label for="nama1" class="col-form-label">Nama:</label>
                    <input type="text" class="form-control" id="nama1" required>
                  </div>
                  <div class="form-group">
                    <label for="email1" class="col-form-label">Email:</label>
                    <input type="email" class="form-control" id="email1" required>
                  </div>
                  <div class="form-group">
                    <label for="nomor1" class="col-form-label">Nomor:</label>
                    <input type="text" class="form-control" id="nomor1" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                  </div>
                 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
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
              <form id="form" onsubmit="insertdata()">
                <div class="modal-body">
                  <div class="form-group" > <label class="alert alert-danger print-error-msg" style="display:none">uoiuou</label>
                  <div class="alert alert-danger print-error-msg" style="display:none"></div>    
                  </div>                 
                    <div class="form-group">
                      <label for="nama" class="col-form-label">Nama</label>
                      <input type="text" class="form-control" id="nama" placeholder="Nama Anda..." required>
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-form-label">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="Email Anda..." value="<?php echo set_value('email'); ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="nomor" class="col-form-label">Nomor</label>
                      <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="nomor" placeholder="Nomor Anda..." required>
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" >Add</button>
                </div>
              </form>
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

  <!-- responsive -->
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
            url: "<?php echo base_url() ?>index.php/Main/get_all_customer",
            type: 'POST',
            success: function (json) {
              var response = JSON.parse(json);
              var no = 0;
              if(response.length > 0){
                response.forEach((data)=>{
                  no++;
                  dTable.row.add([
                    data.nama,
                    data.email,
                    data.nomor,
                    '<button class="btn btn-outline-primary mt-10 mb-10" onclick=detaildata("'+ data.IDCustomer +'")>Blok</button>'
                    + '<button class="btn btn-outline-success mt-10 mb-10" onclick=tampildata("'+ data.IDCustomer +'")>Edit</button>'
                    + '<button class="btn btn-danger mt-10 mb-10" onclick=hapusdata("'+ data.IDCustomer +'") >Delete</button>'
                  
                  ]).draw(false);                
                })
              } else {
              $(".dataTables_empty").text("No data available in table")}
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
                  alert('Data Berhasil Dihapus!');
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
                $("#id_customer1").val(data.IDCustomer);
                $('#nama1').val(data.nama);
                $('#email1').val(data.email);
                $('#nomor1').val(data.nomor);
              })                
            },
            error: function () {
                console.log("gagal menghapus");
            }
          });          
        }

        function updatedata(e) {
                
          var inputid = document.getElementById("id_customer1").value
          var inputnama = document.getElementById("nama1").value
          var inputemail = document.getElementById("email1").value
          var inputnomor = document.getElementById("nomor1").value
          
          $.ajax({
            url: "<?php echo base_url()?>index.php/Main/update_customer/",
            type: 'POST',
            data: {id:inputid, nama:inputnama, email:inputemail,nomor:inputnomor},
            success: function (response) {
              alert('Data Berhasil Diedit!');
              window.location = "<?php echo base_url() ?>index.php/Main/customer";
            },
            error: function () {
              console.log("gagal update");
            }
          });
        };
        function insertdata() {
          var inputnama = document.getElementById("nama").value
          var inputnomor = document.getElementById("nomor").value
          var inputemail = document.getElementById("email").value

          $(document).on('submit', '#form', function (event) {
          event.preventDefault();
          $("#submit").prop("disabled", true);

          $.ajax({
            url: "<?php echo base_url()?>index.php/Main/insert_customer/",
            type: 'POST',
            data: {nama:inputnama, nomor:inputnomor, email:inputemail},
            success: function (response) {
              alert('Data Berhasil Ditambahkan!');
              window.location = "<?php echo base_url() ?>index.php/Main/customer";
            },
            error: function () {
              console.log("gagal update");
            }
          });

       
        });
        }
        function detaildata(id) { 
          $.ajax({
            url: "<?php echo base_url()?>index.php/Main/create_cookie_encrypt",
            type: 'POST',
            data:{name: "editblok", value:id},
            success: function (response) {
              console.log(response); 
              window.location = "<?php echo base_url() ?>index.php/Main/blokdetail";
            },
            error: function () {
              console.log("gagal update");
            }

          });
        }


      </script>

</body>

</html>