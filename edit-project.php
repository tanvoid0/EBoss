<?php

    include 'database/server.php';
    $var->login('edit-project.php');

    include 'includes/header.php';

?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="projects.php">Projects</a>
      </li>
      <li class="breadcrumb-item active">Blank Page</li>
    </ol>
    <div class="row">
      <div class="col-12">
        <div class="card edit-project mb-3">
            <?php
//            foreach ($project as $key => $row) {
//            echo $row['id'];
      echo $project['id'];

            ?>
            <?php echo date('m-d-Y', strtotime($project['deadline']));?>
          <form class="" action="projects.php" method="post">
            <div class="row">
              <div class="col-12">
                <div class="form-group row justify-content-md-center">
                  <label for="projectName" class="col-3 col-form-label text-right">Project Name </label>
                  <div class="col-8">
                    <input class="form-control" type="text" id="name" name="name" value="<?php echo $project['project_name'];?>">
                  </div>
                </div>
                <div class="form-group row justify-content-md-center">
                  <label for="projectType" class="col-3 col-form-label text-right">Project Type </label>
                  <div class="col-8">
                    <select class="form-control" id="type" name="type">
                        <?php
                            $type = $crud->search('project', 'id',$project['id']);
                            echo "<option value='".$type['project_type']."'>".$type['project_type']."</option>";

                            $type = $crud->distinct('project', 'project_type', $type['id']);
                            foreach ($type as $type_row) {
                                  echo "<option value='".$type_row['project_type']."'>".$type_row['project_type']."</option>";
                            }
                        ?>

                    </select>
                  </div>
                </div>
                <?php

                 ?>

                <div class="form-group row justify-content-md-center">
                  <label for="projectLeader" class="col-3 col-form-label text-right">Project Leader </label>
                  <div class="col-8">
                    <select class="form-control" id="leader" name="leader">
                        <?php
                          $leader = $crud->getManager($project['id']);
                          echo "<option value='".$leader['id']."'>".$leader['name']."</option>";

                          $members = $crud->getMember($project['id']);
                          foreach($members as $mem_col => $mem_row){
                            echo "<option value='".$mem_row['id']."'>".$mem_row['name']."</option>";
                          }
                        // $type = $crud->search('project', 'id',$project['id']);
                        // echo "<option value='".$type['project_type']."'>".$type['project_type']."</option>";
                        //
                        // $type = $crud->distinct('project', 'project_type', $type['id']);
                        // foreach ($type as $type_row) {
                        //       echo "<option value='".$type_row['project_type']."'>".$type_row['project_type']."</option>";
                        // }
                        //
                        // $user = $crud->getData("SELECT user.name FROM user WHERE user.id in (SELECT member.user_id FROM member WHERE member.project_id=".$row['id']." and member.title=3) ORDER BY user.name");
                        // foreach ($user as $user_row => $user_row) {
                        //     echo "<option value='".$user_row['name']."'>".$user_row['name']."</option>";
                        // }
                        ?>
<!--                    <option>Tanveer Haque</option>-->
<!--                      <option>Abdulla Wasif</option>-->
<!--                      <option>Nipul Kumar Muni</option>-->
<!--                      <option>Rashidul Habib</option>-->
                    </select>
                  </div>
                </div>
                <?php
                // $allmember = $crud->getData("SELECT * FROM user WHERE id not in (SELECT user_id FROM member WHERE project_id = ".$project['id']." ) ORDER BY name");
                // echo gettype($allmember);
                // foreach ($allmember as $mem_col => $mem_row){
                //     echo "<option value='".$mem_row['name']."' >".$mem_row['name']."</option>";
                // }
                ?>
                <div class="form-group row justify-content-md-center">
                  <label for="projectMembers" class="col-3 col-form-label text-right">Project Members </label>
                  <div class="col-8">
                    <select class="form-control js-example-basic-multiple" id="member" name="member[]" multiple="multiple">
                        <?php
                            $member = $crud->getMember($project['id']);
                            foreach ($member as $mem_col => $mem_row){
                                echo "<option value='".$mem_row['id']."' selected>".$mem_row['name']."</option>";
                            }
                            $allmember = $crud->getData("SELECT * FROM user WHERE id not in (SELECT user_id FROM member WHERE project_id = ".$project['id']." ) ORDER BY name");
                            echo gettype($allmember);
                            foreach ($allmember as $mem_col => $mem_row){
                                echo "<option value='".$mem_row['id']."' >".$mem_row['name']."</option>";
                            }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row justify-content-md-center">
                  <label for="startDate" class="col-3 col-form-label text-right">Starting Date </label>
                  <div class="col-8">
                    <input class="form-control" type="date" id="startDate" name="startDate" value="<?php echo date('Y-m-d', strtotime($project['start_date'])); ?>">
                  </div>
                </div>
                <div class="form-group row justify-content-md-center">
                  <label for="projectSummery" class="col-3 col-form-label text-right">Project Summery </label>
                  <div class="col-8">
                    <textarea id="projectSummery" name="projectSummery" rows="8" class="form-control" placeholder="Write the summery of this project..."><?php echo $project['summary']; ?></textarea>
                  </div>
                </div>
                <div class="form-group row justify-content-md-center">
                  <label for="deadline" class="col-3 col-form-label text-right">Deadline </label>
                  <div class="col-8">
                    <input class="form-control" type="date" id="deadline" name="deadline" value="<?php echo date('Y-m-d', strtotime($project['deadline'])); ?>">
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row justify-content-md-center">
                <div class="offset-8 col-3">
                    <div class="text-right">
                        <input type="hidden" name="project_id" id="project_id" value="<?php echo $project['id']; ?>"/>
                        <input name="update_project" id="update_project" class="btn btn-primary btn-block" type="submit" value="Update Project">

                    </div>
                </div>
            </div>
          </form>
          <!-- Modal footer -->
          <div class="form-group row justify-content-md-center">
            <div class="offset-8 col-3">
              <a href="projects.php">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
              </a>

          </div>


        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->

<?php include 'includes/footer.php'; ?>
