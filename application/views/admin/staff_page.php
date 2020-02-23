  <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card shadow mb-12">
          <div class="card-header py-3">
            <!-- Page Heading -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h1 class="h1 mb-0 text-gray-800 ">Data Staff</h1>
            </div>

            <div class="card-body" style="background-color: #FFFFFF;">
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#addmodal">Add Staff</button>                  
                  </form>
              </div>

              <!--table-->
              <table id="table1" class="table table-striped table-bordered nowrap" style="width:100%">
                  <thead>
                      <tr>
                          <th>ID Staff</th>
                          <th>Nama Staff</th>
                          <th>Perumahan</th>
                          <th>Email</th>
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
                <h5 class="modal-title w-100 text-center" id="editTitle">Edit Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form onsubmit="updatedata(event)">
                <div class="modal-body">
                  <div class="form-group">
                      <label for="id-staff1" class="col-form-label">Id Staff:</label>
                      <input type="text" class="form-control" id="id-staff1" readonly>
                  </div>
                  <div class="form-group">
                      <label for="nama1" class="col-form-label">Nama:</label>
                      <input required type="text" class="form-control" id="nama1" value="">
                  </div>
                  <div class="form-group">
                      <label for="nomor1" class="col-form-label">Nomor Telepon:</label>
                      <input required type="text" class="form-control" id="nomor1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                  </div>
                  <div class="form-group">
                      <label for="email1" class="col-form-label">Email:</label>
                      <input required type="email" class="form-control" id="email1" >
                  </div>
                  <div class="form-group">
                      <label for="password" class="col-form-label">Password:</label>
                      <input required type="password" class="form-control" id="password1" readonly>
                  </div>
                  <div class="form-group">
                      <button type="button" class="btn btn-info" id="reset" onclick="resetpassword()" >Reset Password</button>                     
                      </select>
                  </div> 
                  <div class="form-group">
                      <label for="perumahan1" class="col-form-label">Nama Perumahan:</label>
                      <select required class="custom-select" id="perumahan1">                      
                      </select>
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
                <h5 class="modal-title w-100 text-center" id="addTitle">Add Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form onsubmit="insertdata()">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="nama" class="col-form-label">Nama:</label>
                      <input type="text" class="form-control" id="nama" placeholder="Nama..." required>
                    </div>
                    <div class="form-group">
                      <label for="nomor" class="col-form-label">Nomor Telepon:</label>
                      <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="nomor" placeholder="Nomor Telepon..." required>
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-form-label">Email:</label>
                      <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                      <label for="perumahan" class="col-form-label">Nama Perumahan:</label>
                      <select class="custom-select" id="perumahan" required>                                            
                      </select>
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
              if(data.status == 0) {
                if(res != null) {
                  $('#perumahan1').append(new Option(res, data.IDPerumahan))
                  $('#perumahan').append(new Option(res, data.IDPerumahan)) 
                }  
              }
         
            })
          },
          error: function (xhr, status, error) {
            alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
            $("#submit").prop("disabled", false);
          }
        });

    

        $(document).ready(function () { 
          dTable = $('#table1').DataTable({
            responsive: true,
          });
          get_data();
          
        });
        
        function get_data() {
          $(".dataTables_empty").text("Loading...")
          // var data = get_filter_value()
          $.ajax({
            url: "<?php echo base_url() ?>index.php/Main/get_all_staff",
            type: 'POST',
            success: function (json) {
              var response = JSON.parse(json);
              if (response.length > 0){
                response.forEach((data)=>{              
                  no = data.username
                  if(data.nama_perumahan == null){
                    dTable.row.add([
                      data.username,
                      data.nama_user,
                      '-',
                      data.email,
                        '<button class="btn btn-outline-success mt-10 mb-10" onclick=tampildata("'+ no +'") >Edit</button>'
                      + '<button class="btn btn-danger mt-10 mb-10" onclick=hapusdata("'+ no +'") >Delete</button>'                
                    ]).draw(false);
                  } else {
                    var res = data.nama_perumahan.replace(/_/g, " ");

                    dTable.row.add([
                      data.username,
                      data.nama_user,
                      res,
                      data.email,
                        '<button class="btn btn-outline-success mt-10 mb-10" onclick=tampildata("'+ no +'") >Edit</button>'
                      + '<button class="btn btn-danger mt-10 mb-10" onclick=hapusdata("'+ no +'") >Delete</button>'
                    
                    ]).draw(false);
                  }
                })
              } else{
                $(".dataTables_empty").text("No data available in table")
              }
            },
            error: function (xhr, status, error) {
              alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
              $("#submit").prop("disabled", false);
            }
          });
        };

        function hapusdata(id) {
           var tanya = confirm("hapus?");

           if(tanya){
              $.ajax({
                url: "<?php echo base_url() ?>index.php/Main/delete_staff/",
                type: 'POST',
                data: {id: id},
                success: function (response) {
                    // console.log(response);
                    alert('Data Berhasil Dihapus!');
                    window.location = "<?php echo base_url() ?>index.php/Main/staff";
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
            url: "<?php echo base_url()?>index.php/Main/get_staff_by_id",
            type: 'POST',
            data: {id: id},
            success: function (response) {
              console.log(response);           

              var response = JSON.parse(response);
              response.forEach((data)=>{
                $('#editmodal').modal();
                $("#id-staff1").val(data.username);
                $('#nama1').val(data.nama_user);
                $('#nomor1').val(data.nomor);
                if(data.IDPerumahan != null) {
                  $('#perumahan1').append('<option value="'+ data.IDPerumahan +'">'+ data.nama_perumahan +'</option>'); 
                }                
                $('#perumahan1').val(data.IDPerumahan);
                $('#password1').val(data.password);
                $('#email1').val(data.email);                            
              })
            },
            error: function () {
                console.log("gagal edit");
            }
          });          
        }

        function updatedata(e) {
          e.preventDefault();
          var inputid = document.getElementById("id-staff1").value
          var inputnama = document.getElementById("nama1").value
          var inputnomor = document.getElementById("nomor1").value
          var inputemail = document.getElementById("email1").value
          var inputperumahan = document.getElementById("perumahan1").value
          var dataidperum = document.getElementById("perumahan").value
          $.ajax({
            url: "<?php echo base_url()?>index.php/Main/update_staff/",
            type: 'POST',
            data: {id:inputid, nama:inputnama, nomor:inputnomor, email:inputemail, perum:inputperumahan, idlama:dataidperum},
            success: function (response) {
              // console.log(response);
              alert('Data Berhasil Diedit!');
              window.location = "<?php echo base_url() ?>index.php/Main/staff";
            },
            error: function () {
              console.log("gagal update");
            }
          });
        }

        function insertdata() {
          var inputnama = document.getElementById("nama").value
          var inputnomor = document.getElementById("nomor").value
          var inputperumahan = document.getElementById("perumahan").value
          var inputemail = document.getElementById("email").value
          
          $.ajax({
            url: "<?php echo base_url()?>index.php/Main/insert_staff/",
            type: 'POST',
            data: {nama:inputnama, nomor:inputnomor, perum:inputperumahan, email:inputemail},
            success: function (response) {
              // console.log(response);
              alert('Data Berhasil Ditambahkan!');              
              window.location = "<?php echo base_url() ?>index.php/Main/staff";
            },
            error: function () {
              console.log("gagal insert");
            }
          });

        }

        function resetpassword() {
          var inputid = document.getElementById("id-staff1").value

          $.ajax({
            url: "<?php echo base_url()?>index.php/Main/reset_pass_staff/",
            type: 'POST',
            data: {id:inputid},
            success: function (response) {
              alert("Password Berhasil di Reset! Silahkan Beritahu Staff Anda...");
              window.location = "<?php echo base_url() ?>index.php/Main/staff";
            },
            error: function () {
              console.log("gagal insert");
            }
          });
        }


      </script>

</body>

</html>