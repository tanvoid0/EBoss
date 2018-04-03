<?php
  include 'database/server.php';
  $var->login('employees.php');
  include 'includes/header.php';
?>


<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Employees</li>
    </ol>


    <!-- Example DataTables Card-->
    <div class="card mb-3">

      <div class="card-header">
        <i class="fa fa-table"></i> All Employees

        <!-- Add Employee -->
        <?php if($_SESSION['rank'] == 1): ?>
          <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Register New Employee</a>
        <?php endif; ?>

      </div>

      <!-- Table Starts -->
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <!-- Header Stars -->
            <thead>
              <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>EMP. ID</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Salary</th>
                <th>Working Rating</th>
                  <th>Action</th>
                </tr>
            </thead>
            <!-- Header ends -->


            <tbody>
              <?php
                $employees = $crud->select('user');
                foreach($employees as $var => $employee):
              ?>

              <!-- Row Starts -->
              <tr>

                <!-- Image -->
                <td>
                  <?php echo '<img src="data:image;base64,'.$employee['image'].' " alt="" style="width:100px; min-width:100px"/> '; ?>
                </td>

                <!-- Name -->
                <td>
                  <?php echo $employee['name']; ?>
                </td>

                <!-- Employee ID -->
                <td>
                  <?php echo $employee['emp_id']; ?>
                </td>

                <!-- Department -->
                <td>
                  <?php echo $employee['department']; ?>
                </td>

                <!-- Designaton -->
                <td>
                  <?php echo $employee['designation']; ?>
                </td>

                <!-- Salary -->
                <td>
                  <!-- Dollar Sign -->
                  <i class="fa fa-usd" aria-hidden="true"></i>

                  <!-- Number -->
                  <?php echo number_format($employee['salary'], 0); ?>
                </td>

                <!-- Rating -->
                <td>
                  <div class="rating-star">
                    <?php
                      $star = $employee['rating'];

                      $star_int = floor($star);
                      $star_float = $star - $star_int;
                      $star_blank = (int) 5-ceil($star);

                      // print full stars
                      for($i = 0; $i < $star_int; $i++){
                        echo "<i class='fa fa-star' aria-hidden='true'></i>";
                      }


                      // print Float stars
                      if($star_float > 0){
                          echo "<i class='fa fa-star-half-o' aria-hidden='true'></i>";
                      }

                      // print Gap Stars
                      for($i=0; $i < $star_blank; $i++){
                        echo "<i class='fa fa-star-o' aria-hidden='true'></i>";
                      }

                      // Print Rating in number
                      echo "<br>".$star;
                    ?>

                  </div>
                </td>

                <!-- Edit And View -->
                <td>
                  <div class="btn-group-vertical">

                    <!-- Delete -->

                    <!-- Edit -->
                    <?php if($_SESSION['rank'] == 1): ?>
                      <form action="employees.php" method="post">
                        <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $employee['id']; ?>"/>
                        <button class="btn btn-danger" name="delete_employee" id="delete_employee"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                      </form>
                    <?php endif ?>
                    <?php
                      if(($_SESSION['rank'] == 1)  or ($employee['id'] == $_SESSION['user_id'])):
                        ?>
                        <form action="edit_employee.php" method="post">
                          <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $employee['id']; ?>"/>
                          <button class="btn btn-primary" name="edit_employee" id="edit_employee"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                        </form>
                    <?php endif; ?>

                    <!-- View -->
                    <a href="employee-details.php?id=<?php echo $employee['id']; ?>" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="View Full Profile"><i class="fa fa-eye" aria-hidden="true"></i></a>
                  </div>
                </td>


              </tr>
            <?php endforeach; ?>
            <!-- End Of Table Row -->

            </tbody>
          </table>
          <!-- End of table -->

        </div>
      </div>

      <!-- Edit date -->
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>


    <!-- Add Employee Modal -->
    <?php
      include 'add_employee.php';
    ?>
  </div>

<!-- Footer -->
<?php include 'includes/footer.php'; ?>
