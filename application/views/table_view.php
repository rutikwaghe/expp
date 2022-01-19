<?php
                               foreach($data as $row)
                                {
                                echo "<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['name']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['gender']."</td>
                                <td>".$row['mobile']."</td>
                                <td>".$row['user']."</td>
                                <td>" ?> <img src="<?php echo base_url() . "assets/image/" . $row['profile']; ?>" class="rounded-circle" width="50" height="50">
                                <?php "</td>" ?>

                                <td> <a class="btn btn-primary me-md-2 mx-2" id="edit" href="<?= base_url().'edit_user/edit_user_data?id='.$row['id'] ?>"> Edit</button>
    
                                    <a class="btn btn-danger me-md-2 mx-2" id="delete" href="<?= base_url().'edit_user/delete?id='.$row['id'] ?>" > Delete</button>
                        <?php "</td>
                                
                                 </tr>";
                                }
                               ?>
            
