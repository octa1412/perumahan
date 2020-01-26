<!DOCTYPE html>
<html>

<head>
    <title>Simple DataTable Customization with Bootstarp</title>

    <!--Jquery CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--DataTable CDN-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body style="margin-top: 30px">

    <div class="container">
        <div class="col-lg-4">

            <input type="text" id="myCustomSearchBox" class="form-control" placeholder="Search Anything here">
        </div>

        <div class="col-lg-2">
            <span class="input-group-btn">
			<button class="btn btn-primary">Button 1</button>
			<button class="btn btn-info">Button 2</button>
		    </span>
        </div>

        <div class="col-lg-6">
            <div class="input-group">

                <select id="listsearch" class="form-control" style="width:40%">
                    <option value="0">Select Filter</option>
                    <option value="name">Name</option>
                    <option value="id">ID</option>
                    <option value="birthday">birthday</option>
                </select>

                <input type="text" name="value" id="value" class="form-control" style="width:60%" placeholder="Enter Filter Value">

                <span class="input-group-btn">
				    <button class="btn btn-secondary"><i class="glyphicon glyphicon-search"></i></button>
				</span>
            </div>
        </div>
    </div>
    <!--Container Ends Here-->

    <!--datatable div starts here-->
    <div style="margin-top: 30px">
        <table id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Account Date</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Sam</td>
                    <td>10/11/2019</td>
                    <td>02/02/1990</td>

                </tr>
            </tbody>
        </table>
    </div>
</body>

<script type="text/javascript">
    dTable = $('#myTable').DataTable({
        "bLengthChange": false, // this gives option for changing the number of records shown in the UI table
        "lengthMenu": [4], // 4 records will be shown in the table
        "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            } //columnDefs for align text to center
        ],
        "dom": "lrtip" //to hide default searchbox but search feature is not disabled hence customised searchbox can be made.
    });

    $('#myCustomSearchBox').keyup(function() {
        dTable.search($(this).val()).draw(); // this  is for customized searchbox with datatable search feature.
    })
</script>

</html>