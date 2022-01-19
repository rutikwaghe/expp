
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

    <?php
    //if (!isset($_SESSION['email'])) { ?>     

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"> <span class="sr-only"></span></a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Home
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= base_url('registration') ?>">Register</a>
              <a class="dropdown-item" href="<?= base_url('login') ?>">Login</a>
            </div>
          </li>
        </ul>
      </div>

    <?php //} else { ?>


      <form class="form-inline my-2 my-lg-0">


        <!-- <h6 style="color:white"> <?php //echo "Welcome " . $_SESSION['name']; ?> </h6>

         <a class="btn btn-primary btn-light me-md-2 mx-2" style="color: black;" href=" //base_url('main_control/profile_update') ">Profile</a>
        // <a class="btn btn-secondary me-md-2 mx-2" style="color: white;" href=" //base_url('main_control/logout') ">Logout</a>
      //  ?> -->

      </form>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

  </nav>

</body>

</html>