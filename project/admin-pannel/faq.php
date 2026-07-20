<?php
include('header.php');
include('connection.php');
?>
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">
            Questions
        </h1>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <?php
            if ($_SESSION['role'] == 'admin') {
            ?>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Question</th>
                        <th>Answer</th>
                    </tr>
                </thead>
                <?php
                $question_fetch = mysqli_query($con, "SELECT * FROM `faq`");
                while ($all_question = mysqli_fetch_array($question_fetch)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $all_question[0] ?></td>
                            <td><?php echo $all_question[1] ?></td>
                            <td><?php echo $all_question[2] ?></td>
                            <td><?php echo $all_question[3] ?></td>
                            <td><a href="https://mail.google.com/mail/?view=cm&to=<?php echo trim($all_question[2]) ?>" class="btn btn-success">Answer</a></td>
                        </tr>
                    </tbody>
                <?php }
            } else { ?>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Question</th>
                    </tr>
                </thead>
                <?php
                $question_fetch = mysqli_query($con, "SELECT * FROM `faq`");
                while ($all_question = mysqli_fetch_array($question_fetch)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $all_question[0] ?></td>
                            <td><?php echo $all_question[1] ?></td>
                            <td><?php echo $all_question[2] ?></td>
                            <td><?php echo $all_question[3] ?></td>
                        </tr>
                    </tbody>
            <?php }
            } ?>
        </table>
    </div>
</div>
</div>
<?php include('footer.php'); ?>