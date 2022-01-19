
<html>

<head>
    <style>
        .navbar-brand {
            color: white;
            font-family: cursive;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <h3><strong>LoginSystem</strong></h3>
        </a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
        </div>

        <form class="form-inline my-2 my-lg-0">

        <h6 style="color:white"> <?php echo ("Welcome ".$row['name']." (".$row['user'].")"); ?> </h6> &nbsp;       
         <img src="<?php echo base_url() . "assets/image/" . $row['profile']; ?>" class="rounded-circle" width="30" height="30">
                              

            <!-- <h6 style="color:white"> <?php //echo "Welcome " . $_SESSION['name']." ( ".$_SESSION['user']. ")"; ?> </h6> -->

            <a class="btn btn-primary btn-light me-md-2 mx-2" style="color: black;" href="<?= base_url('profile') ?>">Profile</a>
            <a class="btn btn-secondary me-md-2 mx-2" style="color: white;" href="<?= base_url('login/logout') ?>">Logout</a>

        </form>

    </nav>

</body>

</html>