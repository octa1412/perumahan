        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="card shadow mb-12">
                <div class="card-header py-3">
                    <!-- Page Heading -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h1 class="h1 mb-0 text-gray-800 ">Change Password</h1>
                    </div>

                
                    <!--form-->
                    <div class="card-body" style="background-color: #FFFFFF;">

                    <div class="alert alert-danger print-error-msg" style="display:none"></div>    

                        <form id="form" onsubmit="doSave(event)">
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input type="password" class="form-control" id="password" value="">
                                </div>
                                <div class="form-group">
                                    <label for="re_password" class="col-form-label">Retype Password</label>
                                    <input type="password" class="form-control" id="re_password" value="">
                                </div>                               
                                <button type="submit" class="btn btn-primary" >Save</button>                  
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

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
        $(".print-error-msg").html("")
        console.log("submit");
        e.preventDefault();
        $("#submit").prop("disabled", true);

        var pass = $("#password").val();
        var repass = $("#re_password").val()
        var error = false;
        if(pass == ""){
          $(".print-error-msg").append("<p>The Password field is required.</p>");
          $(".print-error-msg").css('display','block');
          $("#submit").prop("disabled", false);
          error = true;
        }
        if(repass == ""){
          $(".print-error-msg").append("<p>The  Retype Password field is required.</p>");
          $(".print-error-msg").css('display','block');
          $("#submit").prop("disabled", false);
          error = true;
        }

        if(pass != repass && !error){
          $(".print-error-msg").html("<p>The Password field does not match the Retype Password field.</p>");
          $(".print-error-msg").css('display','block');
          $("#submit").prop("disabled", false);
          error = true;
        }
        if(!error){
          $(".print-error-msg").css('display','none');
          $.ajax({
          url: "<?php echo base_url() ?>index.php/Main/update_password_user",
          type: 'POST',
          data: {passw:pass},
          success: function (json) {
              alert('berhasil diubah');
              window.location = "<?php echo base_url() ?>index.php/Main/dashboardstaff";
              console.log(json);
          },
          error: function (xhr, status, error) {
            alert('Terdapat Kesalahan Pada Server...');
            $("#submit").prop("disabled", false);
          }
        });
        }
      }

    </script>

</body>

</html>
