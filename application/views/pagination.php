<!DOCTYPE html>
<html>
    <head>
        <title>Pagination</title>
    </head>
    <body>
        <div class="container">
            <h2 class="text-primary"> Pagination </h2>
               <table class="table table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>gender</th>
                            <th>mobile</th>
                            <th>UserType</th>
                        </tr>
						<tbody>
                        <?php foreach ($student as $res): ?>
                            <tr>
                                <td><?php echo  $res->id ?></td>
                                <td><?php echo  $res->name ?></td>
                                <td><?php  echo  $res->email ?></td>
                                <td><?php echo  $res->gender ?></td>
                                <td><?php echo  $res->mobile ?></td>
                                <td><?php echo  $res->user ?></td>

                               </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p><?php echo $links; ?></p>
            </div>
        </div>
    </body>
</html>