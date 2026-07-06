<?php
include('header.php');
include('connection.php');
?>
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">
                            Reviews
                        </h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>OrderNO</th>
                                    <th>Review</th>

                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                    $Review_data=mysqli_query($con,"SELECT * FROM `review`");
                                    while($all_rows=mysqli_fetch_array($Review_data)){?>
                                <tr>
                                    <td><?php echo $all_rows[0];?></td>
                                    <td><?php echo $all_rows[1];?></td>
                                    <td><?php echo $all_rows[2];?></td>
                                    <td><?php echo $all_rows[3];?></td>
                                    <td><?php echo $all_rows[4];?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                              
                        </table>
                    </div>
                </div>
                </div>
            <?php
include('footer.php');

