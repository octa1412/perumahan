        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card shadow mb-12">
          <div class="card-header py-3">

            <!-- Page Heading -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h1 class="h1 mb-0 text-gray-800 ">Data Blok Staff</h1>
            </div>

            <div class="card-body" style="background-color: #FFFFFF;">
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                
                  <div class="btn-group">
                      <select id='fl-cluster' class="custom-select">
                          <option selected value="default">Cluster</option>
                      </select>
                  </div>
                 
              </div>

              <!--table-->
              <table id="table1" class="table table-striped table-bordered nowrap" style="width:100%">
                  <thead>
                      <tr>
                          <th>Nama Blok</th>
                          <th>Nama Customer</th>
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
        responsive:true
      });
      get_data()
      
      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_all_cluster",
        type: 'POST',
        success: function (json) {
          var response = JSON.parse(json);
          response.forEach((data)=>{
            var tes = data.nama_cluster.replace(/_/g, " ");
            $('#fl-cluster').append(new Option(tes, data.IDCluster))
          })
        },
        error: function (xhr, status, error) {
          alert('Terdapat Kesalahan Pada Server...');
          $("#submit").prop("disabled", false);
        }
      });
    });

    $("#fl-cluster").change(function (e) { 
        e.preventDefault();
        get_data();
    });


    function get_filter_value(){
      var cluster = $("#fl-cluster").val();
      if(cluster == "default"){
        cluster = null;
      }

      return {
        cluster: cluster
      }
    }

    function get_data(){
      $(".dataTables_empty").text("Loading...")
      var data = get_filter_value()
      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_all_blok/0",
        type: 'POST',
        data:data,
        success: function (json) {
          var response = JSON.parse(json);
          dTable.clear().draw();
          if(response.length > 0){
            response.forEach((data)=>{
              no = data.IDBlok  
              if(data.IDBlok != null) {
                dTable.row.add([
                  data.nama_blok,
                  data.nama,
                  '<button class="btn btn-outline-primary mt-10 mb-10" onclick=goToArsip("'+data.IDBlok+'")>Arsip</button></a>'
                + '<button class="btn btn-outline-primary mt-10 mb-10" onclick=goToTagihan("'+data.IDBlok+'")>Detail</button></a>'
              ]).draw(false);
              }            
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
    function goToArsip(id){
      var form = document.createElement('form');
      document.body.appendChild(form);
      form.method = 'post';
      form.action = "<?php echo base_url('index.php/Main/arsip/');?>";

      var input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'id';
      input.value = id;
      form.appendChild(input);

      form.submit();
    }

    function goToTagihan(id){
      var form = document.createElement('form');
      document.body.appendChild(form);
      form.method = 'post';
      form.action = "<?php echo base_url('index.php/Main/iurandetail');?>"

      var input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'id';
      input.value = id;
      form.appendChild(input);

      form.submit();
    }
    </script>
</body>

</html>
