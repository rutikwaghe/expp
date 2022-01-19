<?php
//include 'headerr.php';

if ($_SESSION['user'] == "user") {
    if (isset($_SESSION['email'])) {
 
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
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
                            </tr>
                        </thead>
                            <?php
                               //$i=1;
                                foreach($data as $row)
                                {
                                echo "<tr>";
                                echo "<td>".$row['id']."</td>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['email']."</td>";
                                echo "<td>".$row['gender']."</td>";
                                echo "<td>".$row['mobile']."</td>";
                                echo "<td>".$row['user']."</td>";
                                echo "<td>" ?> <img src="<?php echo base_url() . "assets/image/" . $row['profile']; ?>" class="rounded-circle" width="50" height="50">
                                <?php "</td>";
                                echo "</tr>";
                                //$i++;
                                }
                                ?>
                    </table>

                
            </div>

    
                <?php include 'footer.php';
                }
                else{
                    redirect("welcome");
                }
            }

                else{
                    redirect("welcome");
                } ?>
            
</body>

</html>