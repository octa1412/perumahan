        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card shadow mb-12">
          <div class="card-header py-3">

            <!-- Page Heading -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h1 class="h1 mb-0 text-gray-800 ">Tanggungan Iuran</h1>
            </div>

            <div class="card-body" style="background-color: #FFFFFF;">
                <!--table-->
                <table id="table1" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
                <br>
                <button class="btn btn-primary" onclick="submit(event)">Submit</button>
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
            $(".dataTables_empty").text("Loading...")
            var data = {id: "<?php echo $idBlok?>"}
            $.ajax({
                url: "<?php echo base_url() ?>index.php/Main/get_tagihan/",
                type: 'POST',
                data: data,
                success: function (json) {
                var response = JSON.parse(json);
                if(response.length > 0){
                    response.forEach((data)=>{
                        dTable.row.add([
                        data.bulan+' '+ data.tahun, 
                        data.Harga,
                        '<input type="checkbox" name="bayar" value="'+data.IDTagihan+'"></input>'
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
        });


        function submit(e){
            e.preventDefault();
            var checked = []
            $("input[type=checkbox]").each(function() {
                if($(this).prop("checked"))
                    checked.push($(this).val());
            });
            if(checked.length == 0){
                alert("Pilih tagihan yang hendak dibayar.")
            } else{
                var form = document.createElement('form');
                document.body.appendChild(form);
                form.method = 'post';
                form.action = "<?php echo base_url('index.php/Main/iuranreview');?>";

                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'data';
                input.value = checked;
                form.appendChild(input);
                form.submit();
            }
        }
    </script>

</body>

</html>
