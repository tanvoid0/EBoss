<?php
    include 'database/server.php';
    $var->login('projects.php');
    include 'includes/header.php';
?>

<div class="content-wrapper" xmlns:width="http://www.w3.org/1999/xhtml">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="./">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Projects</li>
    </ol>

    <!--Variable Test Ground-->
    <?php
        // echo $leader;
    ?>

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> All Projects

        <!-- Create Project -->
        <?php if($_SESSION['rank'] == 1): ?>
          <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Create New Project</a>
        <?php endif?>
      </div>

      <div class="card-body">
        <!--Table Starts-->
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <!-- Header starts -->
            <thead>
              <tr>
                <th>Project Name</th>
                <th>Members</th>
                <th>Start Date</th>
                <th>Deadline</th>
                <th>Project Type</th>
                <th>Progress</th>
                <th>Action</th>
              </tr>
            </thead>
            <!-- Header Ends -->


            <!-- Table Data starts -->
            <tbody>
            <?php
              // Collect Project Rows!
              $result = $crud->select('project');
              foreach($result as $key=>$row) :
                $manager = $crud->getManager($row['id']);
                $members = $crud->getMember($row['id']);
            ?>

              <!-- Project Value Table -->
              <tr>
                <!-- Project Name -->
                <td class="font-weight-bold"><?php echo $row['project_name']; ?></td>

                
                <!-- Member Name -->
                <td>
                    <ol>
                    <?php
                      // Leader Name
                      echo "<li class='text-success'>".$manager['name']. " (Team Leader)</li>";
                      foreach ($members as $key => $member) {
                        // Member Names
                        echo "<li>".$member['name']."</li>";
                      }
                    ?>
                  </ol>
                </td>


                <!-- Project Start Date -->
                <td><?php echo date('d F Y', strtotime($row['start_date']));?></td>


                <!-- Project End Date -->
                <td><?php echo date('d F Y', strtotime($row['deadline']));?></td>


                <!-- Project Type -->
                <td><?php echo $row['project_type'];?></td>


                <!-- Progress -->
                <td>
                  <div class="progress">
                      <?php
                        $progress = $row['progress'];
                        $bar = "";
                        $value = $progress;
                       if($progress == 0){
                           $value = 100;
                           $bar = "bg-danger";
                       } else if($progress == 100) {
                           $bar = "bg-success";
                       } else {
                           $bar = "progress-bar-striped progress-bar-animated";
                       }
                        ?>
                    <div class="<?php echo 'progress-bar '.$bar; ?>" style="width: <?php echo $value."%"?>"><?php echo $progress."%"?></div>
                  </div>
                </td>


                <!-- View and Edit -->
                <td>
                <!-- Edit Project -->
                  <div class="btn-group-vertical">
                    <?php
                    $pro_id = $crud->edit($row['id']);
                    $mem_id = $pro_id['user_id'];
                    if(($_SESSION['rank'] == 1) or ($mem_id == $_SESSION['user_id'])): ?>
                    <form method="post" action="edit-project.php">
                      <input type="hidden" name="project_id" id="project_id" value="<?php echo $row['id']; ?>"/>
                      <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" id="edit_project" name="edit_project" title="Edit Project"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                    </form>
                  <?php endif; ?>


                  <!-- View Project -->
                    <form method="post" action="project-details.php">
                      <input type="hidden" name="project_id" id="project_id" value="<?php echo $row['id']; ?>"/>
                      <button class="btn btn-dark" data-toggle="tooltip" id="view_project" name="view_project" data-placement="top" title="View Details"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    </form>
                  </div>
                </td>
                <!-- View and Edit ends -->

              </tr>
            <?php endforeach; ?>
            <!-- Row Ends -->


            </tbody>
            <!-- Table  data ends -->


          </table>
          <!-- Table Ends -->

        </div>
      </div>

      <!-- Modify Date -->
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    <!-- Create Project Modal -->
    <?php include 'create-project.php';?>

  </div>

<!-- Footer -->
<?php include 'includes/footer.php'; ?>
