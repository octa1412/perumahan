        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card shadow mb-12">
          <div class="card-header py-3">

            <!-- Page Heading -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h1 class="h1 mb-0 text-gray-800">Data Arsip Pembayaran</h1>
            </div>

            <div class="card-body" style="background-color: #FFFFFF;">

              <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
                  <a class="btn btn-primary" href="<?php echo base_url('index.php/Main/addtagihan');?>">Form Tagihan Bulanan</a>
              </div>

              <div class="d-sm-flex align-items-center mb-4">						
                <div class="btn-group">
                  <select id='fl-perumahan' class="custom-select">
                    <option selected value="default">Perumahan</option>
                  </select>
                </div>
                <div class="btn-group">
                  <select id='fl-cluster' class="custom-select">
                    <option selected value="default">Cluster</option>
                  </select>
                </div>
								
              </div>

              <!--table-->
              <table id="table1" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>ID Customer</th>
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
  <link href="<?php echo base_url('dist/vendor/datetimepicker/css/bootstrap-datepicker3.css');?>" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url('dist/vendor/datetimepicker/js/bootstrap-datepicker.min.js');?>"></script>
	<script>
    $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_all_perumahan",
        type: 'POST',
        success: function (json) {
          var response = JSON.parse(json);
          response.forEach((data)=>{
            $('#fl-perumahan').append(new Option(data.nama_perumahan, data.IDPerumahan))
          })
        },
        error: function (xhr, status, error) {
          alert('Terdapat Kesalahan Pada Server...');
          $("#submit").prop("disabled", false);
        }
      });


      $('.input-daterange').datepicker();

      $("#fl-perumahan").change(function (e) { 
        e.preventDefault();
        if($("#fl-perumahan").val() != "default"){
          getClusterofPerumahan($("#fl-perumahan").val(), function(){
            get_transaksi()
            console.log($("#fl-cluster").val())
          });
        }
        else{
          $("#fl-cluster option[value!=default]").remove();
          get_transaksi();
        }
      });

      $("#fl-cluster").change(function (e) { 
        e.preventDefault();
        get_transaksi();
      });
      
      function getClusterofPerumahan(id,callback){
        $.ajax({
          url: "<?php echo base_url() ?>index.php/Main/get_cluster_by_perumahan",
          type: 'POST',
          data: {id: id},
          success: function (json) {
            $("#fl-cluster option[value!=default]").remove();
            var response = JSON.parse(json);
            response.forEach((data)=>{
              var datacluster = data.nama_cluster;
              var temukan = datacluster.indexOf("_");
              var namacluster = data.nama_cluster.substring(temukan+1);

              $('#fl-cluster').append(new Option(namacluster, data.IDCluster))
            })
            callback();
          },
          error: function (xhr, status, error) {
            alert('Terdapat Kesalahan Pada Server...');
            $("#submit").prop("disabled", false);
          }
        });
      }
      

    function get_filter_value(){
      var perumahan = $("#fl-perumahan").val();
      if(perumahan == "default"){
        perumahan = null;
      }
      var cluster = $("#fl-cluster").val();
      if(cluster == "default"){
        cluster = null;
      }

      return {
        perumahan: perumahan,
        cluster: cluster
      }
    }

    function get_transaksi(){
      $(".dataTables_empty").text("Loading...")
      var data = get_filter_value()
      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_transaksi",
        type: 'POST',
        data: data,
        success: function (json) {
          var response = JSON.parse(json);
          if(response.length > 0){
            dTable.clear().draw();
            response.forEach((data)=>{
            
                dTable.row.add([
                data.nama, 
                data.nama_blok,
                
                '<button class="btn btn-outline-primary mt-10 mb-10" onclick=goToArsip("'+data.IDBlok+'")>Arsip</button></a>'
                + '<button class="btn btn-outline-success mt-10 mb-10" onclick=goToTagihan("'+data.IDBlok+'")>Tagihan</button></a>'
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

    function getData(){
      var month = new Array();
      month[0] = "January";
      month[1] = "February";
      month[2] = "March";
      month[3] = "April";
      month[4] = "May";
      month[5] = "June";
      month[6] = "July";
      month[7] = "August";
      month[8] = "September";
      month[9] = "October";
      month[10] = "November";
      month[11] = "December";

      var d = new Date();
      var bulan = month[d.getMonth()];
      var t = d.getYear();
      var year = (t < 1000) ? t + 1900 : t;

      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_blok_data",
        type: 'POST',
        success: function (json) {
          var response = JSON.parse(json);
          var arr = [];
          var jml = 0;

          console.log(json);
          response.forEach((data)=>{
            if(data.IDCustomer != null) {
              jml = jml + 1;
              arr.push({IDCustomer:data.IDCustomer, Harga:data.Harga, IDBlok:data.IDBlok});
            }

          })

          console.log(arr[1]);

          $.ajax({
            url: "<?php echo base_url() ?>index.php/Main/input_transaksi",
            type: 'POST',
            data : {jml:jml, arr:arr, bulan:bulan, tahun:year},
            success: function (json) {
              console.log(json);
              console.log('json');
              
            },    
            error: function (xhr, status, error) {
              alert('Terdapat Kesalahan Pada Server...');
              $("#submit").prop("disabled", false);
            }
          });

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
      get_transaksi();
    });

  </script>

</body>

</html>
