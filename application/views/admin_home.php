<?php
//include 'headerr.php';

if ($_SESSION['user'] == "admin") {
    if (isset($_SESSION['email'])) {

?>

        <html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

            <title>LoginSystem</title>

            <!-- CSS section -->
            <style>
                body {

                    background-color: #ffffff;
                    background-image: linear-gradient(315deg, #ffffff 0%, #d7e1ec 74%);
                }

                .tableform {
                    border-radius: 5px;
                    background-color: #f2f2f2;
                    padding: 20px;
                }

                tr,
                th {
                    color: black;
                }
            </style>

        </head>

        <body>

            <div class="tableform">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Mobile No.</th>
                            <th scope="col">User Type</th>
                            <th scope="col">Profile</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-data">

                    </tbody>

                </table>
            </div>

    <?php include 'footer.php';
    }
} else {
    redirect("welcome");
}
    ?>



    <script>

        $(document).on("click", "#delete", function() {

            if (confirm("Do you really want to delete this record ?")) {
                var id = $(this).data("id");
                $.ajax({
                    url: "<?php echo base_url() . 'user_type_home/delete' ?>",
                    type: "POST",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    catch: false,
                    success: function(data) {
                        if (data.status == 200) {
                            $("#msg").html(data.msg);
                            loadtable();

                        }
                    }
                });
            }
        });


        //loadtable
        $(document).ready(function() {
            loadtable();

            function loadtable() {
                $.ajax({
                    url: "<?php echo base_url() . 'table_data' ?>",
                    type: "POST",
                    success: function(data) {
                        $("#table-data").html(data);
                    }
                });
            }
        });
    </script>


        </body>

        </html>