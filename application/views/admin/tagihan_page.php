        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-center mb-4">
                <h1 class="h1 mb-0 text-gray-800 ">Tanggungan Iuran</h1>
            </div>

            <!--table-->
            <table id="table1" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            <br>
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
        responsive: true
      });
      var data = {id: "<?php echo $idBlok?>"}
      $(".dataTables_empty").text("Loading...")

      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/get_tagihan/",
        type: 'POST',
        data: data,
        success: function (json) {
          var response = JSON.parse(json);
          var angkabln;
          if(response.length > 0 ){
            response.forEach((data)=>{

              switch(data.bulan){
                case '1':
                  angkabln = 'January';
                  break;
                  case '2':
                  angkabln = 'Febuary';
                  break;
                  case '3':
                  angkabln = 'March';
                  break;
                  case '4':
                  angkabln = 'April';
                  break;
                  case '5':
                  angkabln = 'May';
                  break;
                  case '6':
                  angkabln = 'June';
                  break;
                  case '7':
                  angkabln = 'July';
                  break;
                  case '8':
                  angkabln = 'August';
                  break;
                  case '9':
                  angkabln = 'September';
                  break;
                  case '10':
                  angkabln = 'October';
                  break;
                  case '11':
                  angkabln = 'November';
                  break;
                  case '12':
                  angkabln = 'December';
                  break;
              }


              dTable.row.add([
                angkabln+' '+ data.tahun, 
                data.Harga
                ]).draw(false);
              
            })



          } else{
            $(".dataTables_empty").text("Tidak ada data yang ditampilkan.");
          }
        },
        error: function (xhr, status, error) {
          alert('Terdapat Kesalahan Pada Server...');
          $("#submit").prop("disabled", false);
        }
      });
    });

  </script>

</body>

</html>
