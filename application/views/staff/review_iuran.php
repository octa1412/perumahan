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
                <table id="table1" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Bulan Tagihan</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
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
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?=base_url("index.php/Main/cetak_pdf/" );?>" id="pdfdata" target="_blank">Print</a>
            </div>
        </div>
        </div>
    </div>


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
        var total_tagihan = 0;
        $(document).ready(function () {
        dTable = $('#table1').DataTable( {
            responsive:true
        });
        var idtagihan = <?php 
            $idTagihan = explode(",",$idTagihan);
            $idTagihan = json_encode($idTagihan);
            echo $idTagihan;
        ?>;
        var data = {id:[]};
        idtagihan.forEach((datum)=>{
            data.id.push(datum);
        })
        
        $.ajax({
            url: "<?php echo base_url() ?>index.php/Main/get_tagihan/",
            type: 'POST',
            data: data,
            success: function (json) {
                console.log(json);
                var response = JSON.parse(json);
                if(response.length > 0){
                    $("#table1").append(
                        $('<tfoot/>').append( "<tr><td>Diskon "+
                        '<td><input type="number" id="diskon" name="diskon" step=100></input>' )
                    );
                }
                response.forEach((data)=>{
                    dTable.row.add([
                    data.bulan+' '+ data.tahun, 
                    data.Harga,         
                    ]).draw(false);
                    total_tagihan += parseInt(data.Harga)
                })
                
            },
            error: function (xhr, status, error) {
            alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
            $("#submit").prop("disabled", false);
            }
        });
        });
        function doBayar(){
            var idtagihan = <?php 
                echo $idTagihan;
            ?>;
            var data = {id:[]};
            idtagihan.forEach((datum)=>{
                data.id.push(datum);
            })
            data.diskon = $("#diskon").val();
            data.total_awal = total_tagihan
            console.log(data)
            $.ajax({
            url: "<?php echo base_url() ?>index.php/Main/do_bayar/",
            type: 'POST',
            data: data,
            success: function (json) {
                    var o = json;
                    console.log(o);
                    var ah = 'awas';
                    console.log(ah);
                    // window.location.href = "dashboardstaff";
                    $('#pdfmodal').modal();
                    $('#pdfdata').click(function pdftampil() {
                        $.ajax({
                            url:"<?php echo base_url() ?>index.php/Main/cetak_pdf",
                            type: 'POST',
                            data: {id:o, po:ah},
                            success: function (hasil) {
                                console.log(hasil);

                            },
                            error: function (xhr, status, error) {
                            alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
                            $("#submit").prop("disabled", false);
                            }
                        });
                    });                                                                    
            },
            error: function (xhr, status, error) {
            alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
            $("#submit").prop("disabled", false);
            }
        });
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
