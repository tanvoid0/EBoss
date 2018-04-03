<!-- Create Project Modal -->
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Register New Employee</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="employees.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group row justify-content-md-center">
                <label for="input-file-now" class="col-3 col-form-label text-right">Upload Image</label>
                <div class="col-8">
                  <input type="file" id="input-file-now" class="dropify" />
                </div>
              </div>
              <div class="form-group row justify-content-md-center">
                <label for="employeeName" class="col-3 col-form-label text-right">Employee Name </label>
                <div class="col-8">
                  <input class="form-control" type="text" id="employeeName" name="employeeName" placeholder="Enter emoloyee name...">
                </div>
              </div>
              <!-- <ul class="actions">
                  <li><h3>Image</h3></li>
                  <li><input type="file" name="image" accept="image/gif, image/jpeg, image/jpg, image/png"  class="button special" required></li>
              </ul> -->
              <div class="form-group row justify-content-md-center">
                <label for="phoneNo" class="col-3 col-form-label text-right">Phone No. </label>
                <div class="col-8">
                  <input class="form-control" type="text" id="phoneNo" name="phoneNo" placeholder="Enter phone no...">
                </div>
              </div>
              <div class="form-group row justify-content-md-center">
                <label for="emaiId" class="col-3 col-form-label text-right">Email ID. </label>
                <div class="col-8">
                  <input class="form-control" type="text" id="emaiId" name="emaiId" placeholder="Enter email id...">
                </div>
              </div>
              <div class="form-group row justify-content-md-center">
                <label for="dob" class="col-3 col-form-label text-right">Date of Birth </label>
                <div class="col-8">
                  <input class="form-control" type="date" id="dob" name="dob" placeholder="Enter birth date...">
                </div>
              </div>
              <div class="form-group row justify-content-md-center">
                <label for="nid" class="col-3 col-form-label text-right">NID. </label>
                <div class="col-8">
                  <input class="form-control" type="text" id="nid" name="nid" placeholder="National ID Number...">
                </div>
              </div>
              <div class="form-group row justify-content-md-center">
                <label for="presentAddress" class="col-3 col-form-label text-right">Present Address </label>
                <div class="col-8">
                  <textarea id="presentAddress" class="form-control" name="presentAddress" rows="8" placeholder="Enter present address..."></textarea>
                </div>
              </div>
              <div class="form-group row justify-content-md-center">
                <label for="permanentAddress" class="col-3 col-form-label text-right">Permanent Address </label>
                <div class="col-8">
                  <textarea id="permanentAddress" class="form-control" name="permanentAddress" rows="8" placeholder="Enter permanent address..."></textarea>
                </div>
              </div>
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
              <div class="form-group row justify-content-md-center">
                <label for="title" class="col-3 col-form-label text-right">Designation </label>
                <div class="col-8">
                  <input class="form-control" type="text" id="title" name="title" placeholder="Give a designation...">
                </div>
              </div>
              <div class="form-group row justify-content-md-center">
                <label for="salary" class="col-3 col-form-label text-right">Salary </label>
                <div class="col-8">
                  <input class="form-control" type="text" id="salary" name="salary" placeholder="Salary...">
                </div>
              </div>
              <div class="form-group row justify-content-md-center">
                <label for="empId" class="col-3 col-form-label text-right">Employee ID </label>
                <div class="col-8">
                  <input class="form-control" type="text" id="empId" name="empId" placeholder="Employee ID...">
                </div>
              </div>
              <div class="form-group row justify-content-md-center">
                <label for="joiningDate" class="col-3 col-form-label text-right">Joining Date </label>
                <div class="col-8">
                  <input class="form-control" type="date" id="joiningDate" name="joiningDate">
                </div>
              </div>
              <div class="form-group row justify-content-md-center">
                <label for="dob" class="col-3 col-form-label text-right">Joining Date </label>
                <div class="col-8">
                  <input class="form-control" type="date" id="dob" name="dob">
                </div>
              </div>
              <div class="form-group row justify-content-md-center">
                <label for="user" class="col-3 col-form-label text-right">Username </label>
                <div class="col-8">
                  <input class="form-control" type="text" id="user" name="user" placeholder="User ID...">
                </div>
              </div>
              <div class="form-group row justify-content-md-center">
                <label for="password" class="col-3 col-form-label text-right">Password </label>
                <div class="col-8">
                  <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                </div>
              </div>
              <div class="form-group row justify-content-md-center">
                <div class="offset-8 col-3">
                  <div class="text-right">
                    <input class="btn btn-primary btn-block" type="submit" id="add_employee" name="add_employee" value="Employ">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- End of Create Project Modal -->
