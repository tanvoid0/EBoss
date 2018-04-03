<?php
  include 'database/server.php';
  $var->login('project-details.php');

  include 'includes/header.php';
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">
          <a href="projects.php">Projects</a>
      </li>
      <li class="breadcrumb-item active">Projects Details</li>
    </ol>
    <!-- End of Breadcrumbs -->
    <div class="row">
      <div class="col-12">
        <div class="card projects-details mb-3">
          <div class="row">
            <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7">
              <h3>
                <?php echo $project['project_name'];?>
              </h3>
              <p class="text-justify">
                <?php echo $project['summary']; ?>
              </p>
            </div>
            <div class="col-12 col-sm-5 offset-md-1 col-md-4 offset-lg-1 col-lg-4 offset-xl-1 col-xl-4">
              <p><strong>Project Type : </strong><?php echo $project['project_type']; ?></p>
              <p><strong>Start Date : </strong><?php echo $project['start_date']; ?></p>
              <p><strong>Deadline : </strong><?php echo $project['deadline']; ?></p>
<!--                --><?php //} ?>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="project-group">
                <div class="row">
                  <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <div class="team-leader">
                        <div class="card">

                        <img class="card-img-top img-fluid" src="<?php echo 'data:image;base64,'.$leader['image'];?>" alt="Card image" style="width:100%">
                        <div class="card-body">
                          <h4 class="card-title">
                              <?php echo $leader['name'];?>
                          </h4>
                          <p class="card-text text-muted">
                              <?php echo $leader['designation'];?>
                          </p>
                          <div class="btn-group">
                              <form action="todo.php" method="get">

                                  <input type="hidden" value="<?php echo $id; ?>" name="project_id">
                                  <input type="hidden" value="<?php echo $leader['id']; ?>" name="user_id">
                                  <a href="todo.php?project_id=<?php echo $id; ?>&user_id=<?php echo $leader['id']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View Tasks"><i class="fa fa-tasks" aria-hidden="true"></i></a>
                              </form>
                            <a href="employee-details.php?id=<?php echo $leader['id']; ?>" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="View Profile"><i class="fa fa-user" aria-hidden="true"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                    <div class="other-members">
                      <div class="row">
                        <div class="col-12">
                          <div class="heading">
                            <p>Project Members</p>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="row">
                            <?php foreach ($members as $mem_col => $mem_row){ ?>
                            <div class="col-12 col-md-3">
                              <div class="single-member text-center">
                                <img src="<?php echo 'data:image;base64,'.$mem_row['image'];?>" class="img-fluid rounded-circle img-thumbnail" alt="No image found" width="90">

                                <p class=""><?php echo $mem_row['name']; ?></p>
                                <p class="text-muted"><?php echo $mem_row['designation']; ?></p>
                                <div class="btn-group">

                                    <form action="todo.php" method="get">

                                        <input type="hidden" value="<?php echo $id; ?>" name="project_id">
                                        <input type="hidden" value="<?php echo $mem_row['id']; ?>" name="user_id">
                                        <a href="todo.php?project_id=<?php echo $id; ?>&user_id=<?php echo $mem_row['id']; ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="View Tasks"><i class="fa fa-tasks" aria-hidden="true"></i></a>
                                    </form>

                                  <a href="employee-details.php?id=<?php echo $mem_row['id']; ?>" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="View Profile"><i class="fa fa-user" aria-hidden="true"></i></a>
                                </div>
                              </div>
                            </div>
                            <?php }?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->

<?php include 'includes/footer.php'; ?>
