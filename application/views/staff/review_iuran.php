 <!-- Begin Page Content -->
 <div class="container-fluid">
        
        <div class="card shadow mb-12">
          <div class="card-header py-3">

            <!-- Page Heading -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h1 class="h1 mb-0 text-gray-800 ">Review</h1>
            </div>

            <div class="card-body" style="background-color: #FFFFFF;">
                <!--table-->
                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Bulan Tagihan Customer</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                    <tfoot>
                </table>
                <br>
                <button class="btn btn-primary" onclick=doBayar()>Submit</button>
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
            <a class="btn btn-primary" href="<?=base_url("index.php/Main/cetak_pdf/" );?>" id="pdfdata" target="_blank">Print</a>
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
        var total_tagihan = 0;
        var manual = <?php 
            $manual = explode(",",$manual);
            $manual = json_encode($manual);
            echo $manual;
        ?>;
        
        var obj = [{
                month   : new Date(manual[0]).getMonth(),
                year    : new Date(manual[0]).getYear()+1900
            },{
                month   : new Date(manual[1]).getMonth(),
                year    : new Date(manual[1]).getYear()+1900
            }
        ]

        var startMonth = obj[0].month
        var startYear = obj[0].year
        var endMonth = obj[1].month
        var endYear = obj[1].year
        var manualSubmit = []
        $(document).ready(function () {
        dTable = $('#table1').DataTable( {
            responsive:true
        });
        $("#pdfmodal").on('hidden.bs.modal',function(){
            window.location.href = "dashboardstaff";
        })
        var idtagihan = <?php 
            $idTagihan = explode(",",$idTagihan);
            $idTagihan = json_encode($idTagihan);
            echo $idTagihan;
        ?>;

        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var monthNumber = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "91", "92", "93"];
        var data = {id:[]};
        idtagihan.forEach((datum)=>{
            data.id.push(datum);
            console.log(datum);
        })
        $(".dataTables_empty").text("Loading...")
        $.ajax({
            url: "<?php echo base_url() ?>index.php/Main/get_tagihan/",
            type: 'POST',
            data: data,
            success: function (json) {
                var response = JSON.parse(json);
                if(response.length > 0 || obj.length > 0){
                    $("#table1").append(
                        $('<tfoot/>').append( "<tr><td colspan='2' align='center' >Diskon "+
                        '<tr><td colspan="2" align="center"><input type="number" id="diskon" name="diskon" step=100></input>' )
                    );
                    response.forEach((data)=>{
                        dTable.row.add([
                        data.bulan+' '+ data.tahun, 
                        data.Harga,         
                        ]).draw(false);
                        total_tagihan += parseInt(data.Harga)
                    })
                    var harga = <?php if($harga !=null) echo $harga; else echo 0;?>;
                    for(var i = startYear; i <= endYear; i++){
                        if(i < endYear){
                            for(var j = startMonth; j< 12; j++){
                                dTable.row.add([
                                    months[j]+' '+ i,
                                    harga
                                ]).draw(false);
                                total_tagihan += parseInt(harga)
                                manualSubmit.push({month:monthNumber[j],year:i})
                            }
                            startMonth = 0;
                        } else{
                            console.log(startMonth)
                            for(var j = startMonth; j <= endMonth; j++){
                                dTable.row.add([
                                    months[j]+' '+ i,
                                    harga
                                ]).draw(false);
                                total_tagihan += parseInt(harga)
                                manualSubmit.push({month:monthNumber[j],year:i})
                            }
                        }
                    }
                } else{
                    $(".dataTables_empty").text("Tidak ada data yang ditampilkan.")
                }
                
            },
            error: function (xhr, status, error) {
                alert('Terdapat Kesalahan Pada Server...');
                $("#submit").prop("disabled", false);
            }
        });
        });
        function doBayar(){
            var idtagihan = <?php 
                echo $idTagihan;
            ?>;
            var data = {id:[]};
            
            new Promise(function(resolve, reject) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>index.php/Main/tagihanmanual",
                    
                    data: {data: manualSubmit, id: '<?php echo ($id!=null) ?  $id : "" ?>', harga:'<?php echo ($harga!=null) ?  $harga : "" ?>'},
                    success: function (response) {
                        resolve("Stuff worked!");
                        
                    },
                    error: function (xhr, status, error) {
                        alert('Terdapat Kesalahan Pada Server...');
                        $("#submit").prop("disabled", false);
                        reject(Error("It broke"));
                    }
                });
            }).then(()=>{
                idtagihan.forEach((datum)=>{
                if(datum != "")
                    data.id.push(datum);
                })
                if(manualSubmit.length > 0){
                    manualSubmit.forEach((datum)=>{
                        if(datum != ""){
                            var idtagihan = <?php echo ($id!=null) ?  $id : "" ?> + datum.month + datum.year
                            data.id.push(idtagihan)
                        }
                    })
                }
                data.diskon = $("#diskon").val();
                data.total_awal = total_tagihan
                console.log(data)
                $.ajax({
                url: "<?php echo base_url() ?>index.php/Main/do_bayar/",
                type: 'POST',
                data: data,
                success: function (json) {
                        var o = json;
                        console.log(o)
                        $('#pdfmodal').modal();
                        $('#pdfdata').click(function pdftampil() {
                            $.ajax({
                                url:"<?php echo base_url() ?>index.php/Main/cetak_pdf",
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
            })
        }

        function createTagihanManual(){

        }
    </script>
    <style>
    /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance:textfield;
        }
    </style>
</body>

</html>