<?php

    include 'database/server.php';
    $var->login('edit_employee.php');
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
        <a href="employees.php">Employees</a>
      </li>
      <li class="breadcrumb-item active">Edit Employee</li>
    </ol>
    <div class="row">
      <div class="col-12">
        <h3>Edit Employee</h3>

        <!-- Get Info -->
        <?php
          // echo $id;
          $user = $crud->search('user', 'id', $id);
          // print_r($user);
          // echo $user['name'];
        ?>

        <div class="card edit-project mb-3">

          <!-- Form Starts -->
          <form class="" action="employees.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">

              <input type="hidden" name="employee_id" value="<?php echo $id; ?>">

              <!-- Image Upload -->
              <div class="form-group row justify-content-md-center">
                <!-- <br /> -->
                <label for="input-file-now-custom-1" class="col-3 col-form-label text-right">Upload Image</label>

                <!-- <label for="input-file-now" class="col-3 col-form-label text-right">Upload Image</label> -->
                <div class="col-8">
                  <?php
                    $img =  "<img scr='data:image;base64,'".$user['image'];
                   ?>
                  <input type="file" id="input-file-now-custom-1" class="dropify" name="image" data-default-file="<?php echo $img?>" />

                  <!-- <input type="file" id="input-file-now" class="dropify" name="image" /> -->
                </div>
              </div>

              <!-- Name -->
              <div class="form-group row justify-content-md-center">
                <label for="employeeName" class="col-3 col-form-label text-right">Employee Name </label>
                <div class="col-8">
                  <input class="form-control" type="text" id="employeeName" name="employeeName" placeholder="Enter emoloyee name..." value="<?php echo $user['name']; ?>">
                </div>
              </div>

              <!-- Phone -->
              <div class="form-group row justify-content-md-center">
                <label for="phoneNo" class="col-3 col-form-label text-right">Phone No. </label>
                <div class="col-8">
                  <input class="form-control" type="text" id="phoneNo" name="phoneNo" placeholder="Enter phone no..." value="<?php echo $user['phone']; ?>">
                </div>
              </div>

              <!-- Email -->
              <div class="form-group row justify-content-md-center">
                <label for="emailId" class="col-3 col-form-label text-right">Email ID. </label>
                <div class="col-8">
                  <input class="form-control" type="text" id="emailId" name="emailId" placeholder="Enter email id..." value="<?php echo $user['email']; ?>">
                </div>
              </div>

              <!-- DOB -->
              <div class="form-group row justify-content-md-center">
                <label for="dob" class="col-3 col-form-label text-right">Date of Birth </label>
                <div class="col-8">
                  <input class="form-control" type="date" id="dob" name="dob" placeholder="Enter birth date..." value="<?php echo date('Y-m-d',strtotime($user['dob'])); ?>">
                </div>
              </div>

              <!-- NID -->
              <div class="form-group row justify-content-md-center">
                <label for="nid" class="col-3 col-form-label text-right">NID. </label>
                <div class="col-8">
                  <input class="form-control" type="text" id="nid" name="nid" placeholder="National ID Number..." value="<?php echo $user['nid']; ?>">
                </div>
              </div>

              <!-- Present Address -->
              <div class="form-group row justify-content-md-center">
                <label for="present_address" class="col-3 col-form-label text-right">Present Address </label>
                <div class="col-8">
                  <textarea id="present_address" class="form-control" name="present_address" rows="8" placeholder="Enter present address..."><?php echo $user['present_address']; ?></textarea>
                </div>
              </div>

              <!-- Permanent Address -->
              <div class="form-group row justify-content-md-center">
                <label for="permanent_address" class="col-3 col-form-label text-right">Permanent Address </label>
                <div class="col-8">
                  <textarea id="permanent_address" class="form-control" name="permanent_address" rows="8" placeholder="Enter permanent address..."><?php echo $user['permanent_address']; ?></textarea>
                </div>
              </div>

              <!-- Department -->
              <div class="form-group row justify-content-md-center">
                <label for="department" class="col-3 col-form-label text-right">Department </label>
                <div class="col-8">
                  <select class="form-control" id="department" name="department">
                    <option value="Software">Software</option>
                    <option value="Graphics & Design">Graphics & Design</option>
                    <option value="Marketing">Marketing</option>
                  </select>
                </div>
              </div>


              <!-- Designation -->
              <div class="form-group row justify-content-md-center">
                <label for="designation" class="col-3 col-form-label text-right">Designation </label>
                <div class="col-8">
                  <input class="form-control" type="text" id="designation" name="designation" placeholder="Give a designation..." value="<?php echo $user['designation']; ?>">
                </div>
              </div>

              <!-- Salary -->
              <div class="form-group row justify-content-md-center">
                <label for="salary" class="col-3 col-form-label text-right">Salary </label>
                <div class="col-8">
                  <input class="form-control" type="number" id="salary" name="salary" placeholder="Salary..." value="<?php echo $user['salary']; ?>">
                </div>
              </div>



              <!-- Joining Date -->
              <div class="form-group row justify-content-md-center">
                <label for="joining_date" class="col-3 col-form-label text-right">Joining Date </label>
                <div class="col-8">
                  <input class="form-control" type="date" id="joining_date" name="joining_date" value="<?php echo date('Y-m-d',strtotime($user['joining_date'])); ?>">
                </div>
              </div>



              <!-- Employee ID -->
              <!-- <div class="form-group row justify-content-md-center"> -->
                <!-- <label for="empId" class="col-3 col-form-label text-right">Employee ID </label> -->
                <!-- <div class="col-8"> -->
                  <!-- <input class="form-control" type="text" id="empId" name="empId" placeholder="Employee ID..." value="<?php //echo $user['emp_id']; ?>"> -->
                <!-- </div> -->
              <!-- </div> -->


              <!-- Show User -->
<!--              <div class="form-group row justify-content-md-center">-->
<!--                <div class="offset-8 col-3">-->
<!--                  <div class="text-right">-->
<!--                    <button class="btn btn-danger btn-block" onclick="showUser()">Change Username & Password</button>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!---->
<!--              <div id="toggle_user_edit" style="display: none;">-->
<!--                <!-- Username -->
<!--                <div class="form-group row justify-content-md-center">-->
<!--                  <label for="user" class="col-3 col-form-label text-right">Username </label>-->
<!--                  <div class="col-8">-->
<!--                    <input class="form-control" type="text" id="user" name="user" placeholder="User ID..." value="--><?php //echo $user['user']; ?><!--">-->
<!--                  </div>-->
<!--                </div>-->
<!---->
<!--                <!-- Password -->
<!--                <div class="form-group row justify-content-md-center">-->
<!--                  <label for="password" class="col-3 col-form-label text-right">Password </label>-->
<!--                  <div class="col-8">-->
<!--                    <input class="form-control" type="password" id="password" name="password" placeholder="Password">-->
<!--                  </div>-->
<!--                </div>-->
<!---->
<!--                <!-- Confirm Password -->
<!--                <div class="form-group row justify-content-md-center">-->
<!--                  <label for="confpassword" class="col-3 col-form-label text-right">Password </label>-->
<!--                  <div class="col-8">-->
<!--                    <input class="form-control" type="password" id="confpassword" name="confpassword" placeholder="Confirm Password">-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->


              <!-- Submit -->
              <div class="form-group row justify-content-md-center">
                <div class="offset-8 col-3">
                  <div class="text-right">
                    <input class="btn btn-primary btn-block" type="submit" id="update_employee" name="update_employee" value="Update Data">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>


          <div class="form-group row justify-content-md-center">
            <div class="offset-8 col-3">
              <a href="employees.php">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancel</button>
              </a>
          </div>


        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->

<?php include 'includes/footer.php'; ?>
