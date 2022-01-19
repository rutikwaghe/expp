<?php
//include 'headerr.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>LoginSystem</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <style>
        body {

            background-color: #ffffff;
            background-image: linear-gradient(315deg, #ffffff 0%, #d7e1ec 74%);
        }

        .navbar-brand {
            color: white;
            font-family: cursive;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['email'])) {
    ?>

        <!-- Header Section -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <h3><strong>LoginSystem</strong></h3>
        </a>       
    </nav>
        <!-- Header Section -->


        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-6 p-sm-6">
                            <h3 class="card-title text-center mb-5 fw-light fs-5"><strong>Update Profile</strong></h3>

                            <div id="msg"></div>
                            <div id="view_img"></div>
                            <!-- <div class="text-center">
                                <img src="<?php //echo base_url() . "assets/image/" . $row['profile']; ?>" class="rounded-circle" width="100" height="100">
                            </div> -->

                            <form method="POST" id="uploadForm" action="<?= base_url('profile/profile_data'); ?>" enctype='multipart/form-data'>

                                <div class="form-floating mb-3">
                                    <label for="floatingInput">Name : </label>
                                    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Name">
                                    <div style="color:red;" id="name_err"></div>
                                </div>

                                <div class="form-floating mb-3">
                                    <label for="floatingPassword">Mobile : </label>
                                    <input type="number" id="mobile" name="mobile" value="<?php echo $row['mobile']; ?>" class="form-control" placeholder="Mobile">
                                    <div style="color:red;" id="mobile_err"> </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <label for="floatingPassword">Password : </label>
                                    <input type="password" id="password" name="password" value="<?php echo $row['password']; ?>" class="form-control" placeholder="Password">
                                    <div style="color:red;" id="password_err"> </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <label for="floatingPassword">Upload Profile : </label>
                                    <input type="file" id="image" name="image" class="form-control">
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Save Changes</button>

                            </form>

                            <a href="<?= base_url('profile/back') ?>" type="submit" id="back" class="btn btn-success" name="back">Back</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
        <br>

    <?php
    } else {
        redirect("welcome");
    }
    include 'footer.php';
    ?>


    <script>
        $(document).ready(function() {
             
            profile();
             // load profile image
            function profile(){
                        $.ajax({
                            url: "<?php echo base_url().'image_control' ?>",
                            type: "POST",
                            success: function(data) {
                                $("#view_img").html(data);
                            }
                        });
                    }
            

            // Passing form data
            $("#uploadForm").on('submit', (function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo base_url() . 'profile/profile_data' ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(res) {

                        if (res.error) {
                            if (res.name_err != '') {
                                $('#name_err').html(res.name_err);
                            } else {
                                $('#name_err').html('');
                            }
                            if (res.mobile_err != '') {
                                $('#mobile_err').html(res.mobile_err);

                            } else {
                                $('#mobile_err').html('');
                            }
                            if (res.password_err != '') {
                                $('#password_err').html(res.password_err);

                            } else {
                                $('#password_err').html('');
                            }
                        }

                        if (res.status == 200) {
                            profile();
                            msg = '<div id="msg" class="alert alert-success text-center" role="alert">Data Updated Successfully..!!</div>';
                            $("#msg").html(msg);
                           
                        } else if (res.status == 500) {
                            msg = '<div id="msg" class="alert alert-danger text-center" role="alert">Failed to update data..!!</div>';
                            $("#msg").html(msg);
                        } else {

                            $("#msg").html("");
                        }
                    },

                });
            }));

        
        });
    </script>

</body>

</html>