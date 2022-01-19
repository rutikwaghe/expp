<?php

include 'header.php';
?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>LoginSystem</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <style>
        body {

            background-color: #ffffff;
            background-image: linear-gradient(315deg, #ffffff 0%, #d7e1ec 74%);
        }

        .form-label {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-6 p-sm-6">
                        <h3 class="card-title text-center mb-5 fw-light fs-5"><strong>Sign In</strong></h3>

                        <form method="POST" id="login_form" action="">

                            <?php //echo form_open('main_control'); 
                            ?>

                            <div id="err_msg"></div>

                            <div class="form-floating mb-3">
                                <label class="form-label">Email Id</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                                <div style="color:red;" id="email_err"></div>

                                <!-- <div style="color:red;"><?php //echo form_error('email'); 
                                                                ?> </div> -->

                            </div>

                            <div class="form-floating mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                <div style="color:red;" id="password_err"></div>

                                <!-- <div style="color:red;"><?php //echo form_error('password'); 
                                                                ?> </div> -->

                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" name="signin" value="signin" id="signin">Sign In</button>
                            </div>
                            <p class="login-register-text">Don't have an account? <a href="<?php echo base_url(); ?>registration">Register Here</a>.</p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <?php
    include 'footer.php';
    ?>

    <script>
        $(document).ready(function() {
            $("#signin").on("click", function(e) {
                e.preventDefault();

                var email = $("#email").val();
                var password = $("#password").val();

                $.ajax({
                    url: "<?php echo base_url() . 'login/login_data' ?>",
                    type: "POST",
                    data: {
                        email: email,
                        password: password,
                    },
                    dataType: "json",
                    cache: false,
                    success: function(res) {

                        if (res.error) {
                            if (res.email_err != '') {
                                $('#email_err').html(res.email_err);
                            } else {
                                $('#email_err').html('');
                            }
                            if (res.password_err != '') {
                                $('#password_err').html(res.password_err);

                            } else {
                                $('#password_err').html('');
                            }
                        }

                        if (res.status == 200) {
                            if (res.user == "user") {
                                window.location = "<?php echo base_url() . 'user_type_home/user_data' ?>";
                            } else if (res.user == "admin") {
                                window.location = "<?php echo base_url() . 'user_type_home/admin_data' ?>";
                            }
                        }

                        if (res.status == 500) {
                            msg = '<div id="msg" class="alert alert-danger" role="alert">Invalid Email Id And Password</div>';
                            $('#err_msg').html(msg);
                        }

                    },

                });
                //default blank     
                $('#email_err').html('');
                $('#password_err').html('');


            });

        });
    </script>

</body>

</html>