<?php
include 'includes/header.php';
?>
<div class="content-wrapper">
<div class="container-fluid">
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-list"></i>
        </div>
        <div class="mr-5">
          <?php
            echo $crud->count('project')." Projects!";
          ?>
         </div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="projects.php">
        <span class="float-left">View All</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-comments"></i>
        </div>
        <div class="mr-5">
          <?php
            echo $crud->count('user')." Employees!";
           ?>
          </div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="employees.php">
        <span class="float-left">View All</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <?php
  // echo $_SESSION['user_id'];
  // echo $_SESSION['rank'];
    if(!empty($_SESSION['user_id'])){
//         echo $_SESSION['user_id']." ".$_SESSION['rank'];
    }
  ?>
</div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->

<?php
include 'includes/footer.php';
?>
