<?php
include 'database/server.php';
include 'includes/header.php';
//    echo  $_SESSION["user_id"];
$id=$_SESSION['user_id'];
$projects = $crud->show("SELECT DISTINCT project.project_name, member.project_id FROM project, member WHERE member.user_id = $id and member.project_id = project.id;");
// print_r($projects);
// $member = $crud->show("SELECT * FROM member WHERE id=$id");
// print_r($member);
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <?php foreach($projects as $project): ?>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5">
                            <?php echo $project['project_name'];
                            ?>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="todo.php?project_id=<?php echo $project['project_id'];?>&user_id=<?php echo $id ;?>">
                        <span class="float-left">View Tasks</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        <?php endforeach ?>
            <!-- <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5">
                            Hi
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="employees.php">
                        <span class="float-left">View All</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div> -->
            
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php
    include 'includes/footer.php';
    ?>