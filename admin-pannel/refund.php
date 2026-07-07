<?php
include('header.php');
include('connection.php');
?>
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">
                            Returns
                        </h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>OrderNO</th>
                                    <th>Return Time</th>
                                    <th>Return_Reason</th>
                                    <th>Return_Type</th>
                                    <th>Return_Methode</th>
                                    <th>Account NO</th>
                                    <th>Status</th>
                                    <th>Return Process</th>
                                    

                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                    $Return_data=mysqli_query($con,"SELECT * FROM `return`");
                                    while($all_rows=mysqli_fetch_array($Return_data)){?>
                                <tr>
                                    <td><?php echo $all_rows[0];?></td>
                                    <td><?php echo $all_rows[1];?></td>
                                    <td><?php echo $all_rows[2];?></td>
                                    <td><?php echo $all_rows[8];?></td>
                                    <td><?php echo $all_rows[5];?></td>
                                    <td><?php echo $all_rows[4];?></td>
                                    <td><?php echo $all_rows[3];?></td>
                                    <td><?php echo $all_rows[6];?></td>
                                    <td><?php echo $all_rows[7];?></td>
                                    <td><a href="return_update.php?return_id=<?php echo $all_rows[0] ?>" class="btn btn-warning">Update Status</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                              
                        </table>
                    </div>
                </div>
                </div>
            <?php
include('footer.php');

