        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card shadow mb-12">
          <div class="card-header py-3">

          <!-- Page Heading -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h1 class="h1 mb-0 text-gray-800 ">Arsip Blok</h1>
          </div>

          <div class="card-body" style="background-color: #FFFFFF;">
            <div class="d-sm-flex align-items-center mb-4">
              <div class="id-none form-inline ml-md-3 input-daterange">
                <input type="text" class="form-control" >
                <div class="input-group-text justify-content-sm-center">to</div>
                <input type="text" class="form-control" >
              </div>
                          
            </div>

            <!--table-->
            <table id="table1" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Tanggal Pembayaran</th>
                  <th>Total Awal</th>
                  <th>Diskon</th>
                  <th>Total Setelah Diskon</th>
                  <th>Action</th>
                  <th></th>
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

      <!-- pdf Modal-->
      <div class="modal fade" id="pdfmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Print Laporan?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-footer"> 
                <a class="btn btn-secondary" href="<?=base_url("index.php/Main/cetak_pdf_diskon/" );?>" id="pdfdiskon" target="_blank">Laporan + Diskon</a>
                <a class="btn btn-primary" href="<?=base_url("index.php/Main/cetak_pdf/" );?>" id="pdfdata" target="_blank">Laporan</a>
              </div>
          </div>
          </div>
      </div>
     
      <!-- Detail Modal-->
      <div class="modal fade" id="nota_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">

          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
                <div class="modal-body">
                  <table id="mobile_nota_detail" class="display" width="100%"></table>
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
	<script src="<?php echo base_url('dist/vendor/datetimepicker/js/bootstrap-datepicker.min.js');?>"></script>
  <link href="<?php echo base_url('dist/vendor/datetimepicker/css/bootstrap-datepicker3.css');?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.2/css/select.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.dataTables.min.css">
  
  <style>
    td.child-table {
        background-color: #bfdbff;
    }
  </style>
  <script>
  
    $('.input-daterange').datepicker({
        format: 'yyyy-mm-dd'    // pass here your desired format
    });
    $('.input-daterange').change(function(e){
      get_arsip();
    })

    var dTable;
    var data = get_filter_value();

    function get_filter_value(){
      var date = []
      $('.input-daterange input').each(function() {
        date.push($(this).datepicker('getDate'))
      });
      if(date[0]!=null){
        return {
          startDate: date[0].getFullYear() +'-'+ parseInt(date[0].getMonth()+1) +'-'+ date[0].getDate(),
          endDate: date[1].getFullYear() +'-'+ parseInt(date[1].getMonth()+1) +'-'+ date[1].getDate()
        }
      } else{
        return {
          startDate: null,
          endDate: null
        }
      }
    }
    function get_arsip(){
      data = get_filter_value();
      data.id = "<?php echo $idBlok?>"
      dTable.ajax.reload();
    }

    $(document).ready(function () {
      // dTable = $('#table1').DataTable({
      //   responsive:true
      // });
      
      data.id = "<?php echo $idBlok?>"
      dTable = $('#table1').DataTable({
        "responsive":true,
        "order": [[ 0, 'desc' ]],
        "dom": 'frtip',
        "processing": true,
        "ajax": {
            "url": "<?php echo base_url() ?>index.php/Main/get_all_arsip/",
            "type": "POST",
            "contentType": "application/json",
            "data": function(){
                return JSON.stringify(data);
            }
          },
          "columns": [

            // {
            //     "className": 'details-control',
            //     "orderable": false,
            //     "data": null,
            //     "defaultContent": '',
            //     "width": '3%'
            // },
            { "data": "tanggal" },
            { "data": "total_awal",
              "render": function(data, type, row, meta){
                return parseInt(data).toLocaleString('id-ID', {currency: 'IDR', style: 'currency'})
              }
            },
            { "data": "diskon",
              "render": function(data, type, row, meta){
                return parseInt(data).toLocaleString('id-ID', {currency: 'IDR', style: 'currency'})
              }
            },
            { "data": "total_setelah_diskon",
              "render": function(data, type, row, meta){
                return parseInt(data).toLocaleString('id-ID', {currency: 'IDR', style: 'currency'})
              }
            },
            {"data": "IDNota",
              "render": function(data, type, row, meta){
                return '<button class="btn btn-outline-primary mt-10 mb-10" onclick="goToPdf('+data+');">Detail</button>'
              }
            },
            {"data": "IDNota",
              "render": function(data, type, row, meta){
                return '<button class="btn btn-outline-primary mt-10 mb-10 detail-nota" data-nota='+data+'">Transaksi</button>'
              }
            },

          ],
          select: {
              style:    'os',
              selector: 'td:not(:last-child)'
          },
      });
    });

    // $('#table1 tbody').on( 'click', '.gotopdf', function () {
    //     var data = dTable.row( $(this).parents('tr') ).data();
    //     goToPdf(data["IDNota"]);
    // } );

    function goToPdf(id){
      $.ajax({
        url: "<?php echo base_url() ?>index.php/Main/view_pdf/",
        type: 'POST',
        data: {data:id},
        success: function (json) {
          var o = json;
          $('#pdfmodal').modal();
          $('#pdfdata').click(function pdftampil() {
              $.ajax({
                  url:"<?php echo base_url() ?>index.php/Main/cetak_pdf",
                  type: 'POST',
                  data: {id:o},
                  success: function (hasil) {
                      console.log(hasil);

                  },
                  error: function (xhr, status, error) {
                  alert('Terdapat Kesalahan Pada Server...');
                  $("#submit").prop("disabled", false);
                  }
              });
          });    

          $('#pdfdiskon').click(function pdftampil() {
              $.ajax({
                  url:"<?php echo base_url() ?>index.php/Main/cetak_pdf_diskon",
                  type: 'POST',
                  data: {id:o},
                  success: function (hasil) {
                  },
                  error: function (xhr, status, error) {
                  alert('Terdapat Kesalahan Pada Server...');
                  $("#submit").prop("disabled", false);
                  }
              });
          });                                                                  
        },
        error: function (xhr, status, error) {
        alert('Terdapat Kesalahan Pada Server...');
        $("#submit").prop("disabled", false);
        }
      });
    }

    var usersTable;

    function createChild ( row,idNota ) {
        //Mobile
        if(row.length == 0){
          $('#nota_detail').modal();
          var table = $('#mobile_nota_detail')
        } else{
          // This is the table we'll convert into a DataTable
          var table = $('<table class="display" width="100%"/>');
          // Display it the child row
          row.child( table ).show();
        }
      
        // Initialise as a DataTable
        usersTable = table.DataTable( {
          "responsive":true,
          "dom": 'rt',
          "processing": true,
          "ajax": {
              "url": "<?php echo base_url() ?>index.php/Main/get_tagihan_by_nota_id/",
              "type": "POST",
              "contentType": "application/json",
              "data": function(){
                return JSON.stringify({id:idNota})
              }
            },
            "columns": [
              { "title": 'Harga', "data": "Harga",
                "render": function(data, type, row, meta){
                  return parseInt(data).toLocaleString('id-ID', {currency: 'IDR', style: 'currency'})
                }
              },
              { "title": 'Bulan', "data": "bulan"},
              { "title": 'Tahun', "data": "tahun"}

            ]
        } );
    }

    function destroyChild(row) {
        var table = $("table", row.child());
        table.detach();
        table.DataTable().destroy();
    
        // And then hide the row
        row.child.hide();
    }

    $('#nota_detail').on('hidden.bs.modal', function () {
      usersTable.destroy()
    })

    $('#table1 tbody').on( 'click', '.detail-nota', function () {
        var tr = $(this).closest('tr');
        var row = dTable.row( tr );

        var idNota = $(this).data('nota');

        if ( row.child.isShown() ) {
            // This row is already open - close it
            destroyChild(row);
            tr.removeClass('shown');
        }
        else {
            // Open this row
            createChild(row,idNota, 'child-table'); // class is for background colour
            tr.addClass('shown');
        }
    });
  </script>

</body>

</html>
