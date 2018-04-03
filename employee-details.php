<?php
  include 'database/server.php';
  $var->login('employee-details.php');

  $id = $_GET['id'];
  $user = $crud->search('user','id', $id);
  // print_r($user);



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
        <a href="employees.php">Employees</a>
      </li>
      <li class="breadcrumb-item active">Employee Details</li>
    </ol>
    <div class="row justify-content-md-center">
      <div class="col-7">
        <div class="custom-tab">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs nav-justified">
              <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">Profile</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Details</a>
              </li>
              <!-- <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#panel3" role="tab">Contact</a>
              </li> -->
          </ul>
          <!-- Tab panels -->
          <div class="tab-content card">
              <!--Panel 1-->
              <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
                  <div class="row">
                    <div class="col-12 col-md-offset-5">
                      <?php echo '<img src="data:image;base64,'.$user['image'].' " alt="" style="width:100px; min-width:100px"/> '; ?>
                      <h4><?php echo $user['name']; ?></h4>
                      <p><?php echo $user['designation']; ?></p>
                      <p><?php echo $user['email']; ?></p>
                      <p><?php echo $user['phone']; ?></p>
                    </div>
                  </div>
              </div>
              <!--/.Panel 1-->
              <!--Panel 2-->
              <div class="tab-pane fade" id="panel2" role="tabpanel">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td><strong>Employee Name</strong></td>
                        <td><?php echo $user['name']; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Phone No</strong></td>
                        <td><?php echo $user['phone']; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Date of Birth</strong></td>
                        <td><?php echo $user['dob']; ?></td>
                      </tr>
                      <tr>
                        <td><strong>NID</strong></td>
                        <td><?php echo $user['nid']; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Present Address</strong></td>
                        <td><?php echo $user['present_address']; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Permanent Address</strong></td>
                        <td><?php echo $user['permanent_address']; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Department</strong></td>
                        <td><?php echo $user['department']; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Designation</strong></td>
                        <td><?php echo $user['designation']; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Salary</strong></td>
                        <td><?php echo $user['salary']; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Employee ID</strong></td>
                        <td><?php echo $user['emp_id']; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Joining Date</strong></td>
                        <td><?php echo date('d-m-Y', strtotime($user['joining_date'])); ?></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <!--/.Panel 2-->
              <!--Panel 3-->
              <div class="tab-pane fade" id="panel3" role="tabpanel">
                  <br>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
                      reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione
                      porro voluptate odit minima.</p>
              </div>
              <!--/.Panel 3-->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->

<?php include 'includes/footer.php'; ?>
