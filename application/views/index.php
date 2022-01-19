<?php

include 'header.php';
?>

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

        .error {
            color: #FF0000;
        }
        span{
            color: red;
        }
        .form-label{
            font-weight: bold;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5 border border-dark">
                    <div class="card-body p-8 p-sm-8">

                        <form method="POST" id="register_from" action="">


                            <h3 class="card-title text-center mb-5 fw-light fs-5"><strong>Register</strong></h3>

                            <div id="msg"></div>

                            <p><span class="error">* Required field</span></p>

                            <div class="form-floating mb-3">
                                <label class="form-label">Name <span>*</span></label><br>
                                <input type="text" id="name" name="name" class="form-control" placeholder="name">
                            </div>
                            <div style="color:red;" id="name_err"></div>


                            <div class="form-floating mb-3">
                                <label class="form-label">Email <span>*</span></label><br>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div style="color:red;" id="email_err"></div>

                            <div class="">
                               <strong> Gender : </strong>
                                <input type="radio" name="gender" class="gender" value="male" checked> Male
                                <input type="radio" name="gender" class="gender" value="female"> Female

                                <br><br>
                            </div>

                            <div class="form-floating mb-3">
                                <label class="form-label">Mobile No. <span>*</span></label>
                                <input type="number" id="mobile" name="mobile" class="form-control">
                            </div>
                            <div style="color:red;" id="mobile_err"></div>

                            <div class="form-floating mb-3">
                                <label for="validationDefault04" class="form-label"> Select UserType</label> <br>
                                <select class="form-select" aria-label="Default select example" name="user" id="user">
                                <option value="user">--Select--</option>    
                                <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                            <div class="form-floating mb-3">
                                <label class="form-label">Password <span>*</span></span></label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div style="color:red;" id="password_err"></div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-login text-uppercase fw-bold" value="submit" name="submit" id="submit">Submit</button>
                            </div>
                            <p class="login-register-text">Have an account? <a href="<?php echo base_url(); ?>login">Login Here</a>.</p>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        $(document).ready(function() {
            $("#submit").on("click", function(e) {
                e.preventDefault();

                var name = $("#name").val();
                var email = $("#email").val();
                var gender = $("input[type='radio'][name='gender']:checked").val();
                var mobile = $("#mobile").val();
                var user = $("#user").val();
                var password = $("#password").val();

                $.ajax({
                    url: "<?php echo base_url() . 'registration/register_data' ?>",
                    type: "POST",
                    data: {
                        name: name,
                        email: email,
                        gender: gender,
                        mobile: mobile,
                        user: user,
                        password: password,
                    },
                    dataType: "json",
                    cache: false,
                    success: function(res) {
                        if (res.status == 200) {
                            msg= '<div id="msg" class="alert alert-success" role="alert">Registration successfull Now you can <a href="login">LogIn</a></div>';
                            $("#msg").html(msg);
                        } 
                        
                        else if (res.error) {
                            if (res.name_err != '') {
                                $('#name_err').html(res.name_err);
                            } else {
                                $('#name_err').html('');
                            }
                            if (res.email_err != '') {
                                $('#email_err').html(res.email_err);

                            } else {
                                $('#email_err').html('');
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

                    },

                });
                //default blank
                $('#name_err').html('');
                $('#email_err').html('');
                $('#mobile_err').html('');
                $('#password_err').html('');


            });

        });
    </script>


</body>

</html>