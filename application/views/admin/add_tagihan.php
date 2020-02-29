        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card shadow mb-12">
          <div class="card-header py-3">

            <!-- Page Heading -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h1 class="h1 mb-0 text-gray-800">Data Arsip Pembayaran</h1>
            </div>

            <div class="card-body" style="background-color: #FFFFFF;">

              <div>
                <form onsubmit="insertdata(event)">
                    <div class="form-group">
                        <label for="perumahan" class="col-form-label">Nama Perumahan</label>
                        <select class="custom-select" id="perumahan" required>
                        <option value="default">Perumahan</option>   
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="cluster" class="col-form-label">Nama Cluster</label>
                    <select class="custom-select" id="cluster">
                      <option selected value="default">Cluster</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="blok" class="col-form-label">Nama Blok</label>
                    <select class="custom-select" id="blok">
                      <option selected value="default">Blok</option>
                    </select>
                  </div>    
                  <div class="form-group">
                    <label for="blntagihan" class="col-form-label">Bulan Tagihan</label>
                    <select class="custom-select" id="blntagihan">
                      <option selected value="default">Bulan</option>
                      <option selected value="January">January</option>
                      <option selected value="Febuary">Febuary</option>
                      <option selected value="March">March</option>
                      <option selected value="April">April</option>
                      <option selected value="May">May</option>
                      <option selected value="June">June</option>
                      <option selected value="July">July</option>
                      <option selected value="August">August</option>
                      <option selected value="September">September</option>
                      <option selected value="October">October</option>
                      <option selected value="November">November</option>
                      <option selected value="December">December</option>
                      
                    </select>
                    <div class="form-group">
                        <label for="thntagihan" class="col-form-label">Tahun Tagihan</label>
                        <input type="text" class="form-control" id="thntagihan" placeholder="Tahun Tagihan..." onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                    </div> 
                    <div class="form-group">
                        <label for="hargatagihan" class="col-form-label">Harga</label>
                        <input type="text" class="form-control" id="hargatagihan" placeholder="Harga..." onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                    </div>   
                    <div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>

                </form>
              </div>
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
  
  <!-- responsive  -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

	<script src="<?php echo base_url('dist/vendor/datatables/jquery.dataTables.js');?>"></script>
	<script src="<?php echo base_url('dist/js/table.js');?>"></script>
	<script src="<?php echo base_url('dist/vendor/datetimepicker/js/bootstrap-datepicker.min.js');?>"></script>
	<script>


$.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_all_perumahan",
        type: 'POST',
        success: function (json) {
          var response = JSON.parse(json);
          response.forEach((data)=>{ 
            $('#perumahan').append(new Option(data.nama_perumahan, data.IDPerumahan))            
          })
        },
        error: function (xhr, status, error) {
          alert('Terdapat Kesalahan Pada Server...');
          $("#submit").prop("disabled", false);
        }
      });

// perumahan
    $("#perumahan").change(function (e) { 
      e.preventDefault();
      if($("#perumahan").val() != "default"){
        getClusterofPerumahan($("#perumahan").val(), function(){});
      }
      else{
        $("#cluster option[value!=default]").remove();
      }
    });

    $("#cluster").change(function (e) { 
        e.preventDefault();
        if($("#cluster").val() != "default"){
          getBlokofCluster($("#cluster").val());
        }
        else{
          $("#blok option[value!=default]").remove();
        }
      });



    function getClusterofPerumahan(id,callback){
      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_cluster_by_perumahan",
        type: 'POST',
        data: {id: id},
        success: function (json) {
          $("#cluster option[value!=default]").remove();
          var response = JSON.parse(json);
          response.forEach((data)=>{
            var datacluster = data.nama_cluster;
            var temukan = datacluster.indexOf("_");
            var namacluster = data.nama_cluster.substring(temukan+1);

            $('#cluster').append(new Option(namacluster, data.IDCluster))
          })
          callback()
        },
        error: function (xhr, status, error) {
          alert('Terdapat Kesalahan Pada Server...');
          $("#submit").prop("disabled", false);
        }
      });
    }

    function getBlokofCluster(id){
        $.ajax({
          url: "<?php echo base_url() ?>index.php/Main/get_blok_by_cluster",
          type: 'POST',
          data: {id: id},
          success: function (json) {
            $("#blok option[value!=default]").remove();
            var response = JSON.parse(json);
            response.forEach((data)=>{
              $('#blok').append(new Option(data.nama_blok, data.IDBlok))
              
            })
          },
          error: function (xhr, status, error) {
            alert('Terdapat Kesalahan Pada Server...');
            $("#submit").prop("disabled", false);
          }
        });
      }      
    
    function insertdata(e) {
      var inputbulan = document.getElementById("blntagihan").value
      var inputtahun = document.getElementById("thntagihan").value
      var inputharga = document.getElementById("hargatagihan").value
      
      var inputperumahan = document.getElementById("perumahan").value
      var inputcluster = document.getElementById("cluster").value
      var inputblok = document.getElementById("blok").value

      var inputid = inputblok +  inputbulan + inputtahun;
      console.log('coba1');

      $.ajax({
        url: "<?php echo base_url()?>index.php/Main/add_tagihan_manual",
        type: 'POST',
        data: {id:inputid, blok:inputblok, bulan:inputbulan, tahun:inputtahun, harga:inputharga},
        success: function (response) {
          alert(response);       
        },
        error: function () {
          console.log("gagal add");
        }
      });
    }

    </script>
</body>
</html>
