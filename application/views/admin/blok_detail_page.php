        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card shadow mb-12">
            <div class="card-header py-3">

            <!-- Page Heading -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h1 class="h1 mb-0 text-gray-800 ">Data Detail Blok Customer</h1>
            </div>

            <div class="card-body" style="background-color: #FFFFFF;">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addmodal">Add</button>                    
                </div>

                <!--table-->
                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Perumahan</th>
                            <th>Nama Cluster</th>
                            <th>Nama Blok</th>
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
        
        <!-- modal add -->
        <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="addTitle">Add Blok Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>                  
                  <div class="form-group">
                    <label for="perumahan" class="col-form-label">Nama Perumahan:</label>
                    <select class="custom-select" id="perumahan">
                      <option selected value="default">Perumahan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="cluster" class="col-form-label">Nama Cluster:</label>
                    <select class="custom-select" id="cluster">
                      <option selected value="default">Cluster</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="blok" class="col-form-label">Nama Blok:</label>
                    <select class="custom-select" id="blok">
                      <option selected value="default">Blok</option>
                    </select>
                  </div>               
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="insertdata(event)">Add</button>
              </div>
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

      $("#perumahan").change(function (e) { 
        e.preventDefault();
        if($("#perumahan").val() != "default"){
          getClusterofPerumahan($("#perumahan").val());
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


      function getClusterofPerumahan(id){
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
              if(data.IDCustomer == null) {
                $('#blok').append(new Option(data.nama_blok, data.IDBlok))
              }
            })
          },
          error: function (xhr, status, error) {
            alert('Terdapat Kesalahan Pada Server...');
            $("#submit").prop("disabled", false);
          }
        });
      }
      
    $(document).ready(function () { 
      dTable = $('#table1').DataTable({
        responsive: true
      });
      get_data();
    });

    function get_data(){
    //   var data = get_filter_value()
    $(".dataTables_empty").text("Loading...")
      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_my_blok/",
        type: 'POST',
        success: function (json) {
          var response = JSON.parse(json);
            var no = 0;
            if(response.length > 0){
              response.forEach((data)=>{
                no++;
                var datacluster = data.nama_cluster;
                var temukan = datacluster.indexOf("_");
                var namacluster = data.nama_cluster.substring(temukan+1);

                dTable.row.add([
                  data.nama_perumahan,
                  namacluster,
                  data.nama_blok,
                  '<button class="btn btn-danger mt-10 mb-10" onclick=hapusdata("'+ data.IDBlok +'") >Delete</button>'
                
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
    }

    function hapusdata(id) {
      var tanya = confirm("hapus Blok?");

      if(tanya){
        $.ajax({
          url: "<?php echo base_url() ?>index.php/Main/update_blok_detail",
          type: 'POST',
          data: {id: id},
          success: function (response) {
              console.log(response);
              alert('Blok Customer Berhasil Dihapus!');
              window.location = "<?php echo base_url() ?>index.php/Main/blokdetail";

          },
          error: function () {
              console.log("gagal menghapus");

          }
        });
      }
    }

    
    function insertdata(e) {
      var inputblok = document.getElementById("blok").value
      var inputperum = document.getElementById("perumahan").value
      var inputcluster = document.getElementById("cluster").value

      if(inputblok == "default"
         || inputperum == "default"
         || inputcluster == "default"){
           e.preventDefault();
           alert("Input all the requirement");
           return;
         }

      $.ajax({
        url: "<?php echo base_url()?>index.php/Main/insert_blok_detail",
        type: 'POST',
        data: {perum:inputperum, cluster:inputcluster, blok:inputblok},
        success: function (response) {
          console.log(response);
          alert('Blok Customer Berhasil Ditambahkan!');
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
