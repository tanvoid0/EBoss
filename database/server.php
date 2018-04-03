<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    include_once 'classes/Crud.php';
    include_once 'classes/Jobs.php';
    $crud = new Crud();
    $var = new Jobs();
    $values = array();

    $message="";
    if(isset($_POST["login"])) {
        $row = $crud->login('user', $_POST['user'], $_POST['password']);
        if($row){
            $_SESSION["user_id"] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $rank = $crud->rank($row['id']);
            $_SESSION["rank"] = $rank['title'];
        } else {
            $message = "Invalid Username or Password!";
        }
        // $_SESSION["msg"] = "USER Logged out";
    }
    if(isset($_POST["logout"])) {
        $_SESSION["user_id"] = "";
        $_SESSION['user_name'] = "";
        $_SESSION["rank"] = "";
        // $_SESSION["msg"] = "USER Logged out";
        session_destroy();
    }

    if(isset($_POST['edit_project'])){
        $id = $_POST['project_id'];
//        $project = $crud->getData("SELECT * FROM project WHERE id=".$id."");
        $project = $crud->search('project', 'id', $id);
    }

    if(isset($_POST['view_project'])){
        $id = $_POST['project_id'];
        $project = $crud->search('project', 'id', $id);

        $leader = $crud->getManager($id);
        $members = $crud->getMember($id);
    }

    if(isset($_POST['create-project'])){

        $values = $_POST['projectMembers'];
        $project_name = $_POST['project-name'];
        if(empty($_POST['startDate'])){
            $project_start = date('Y-m-d');
        } else {
            $project_start = date( 'Y-m-d', strtotime($_POST['startDate']));
        }

        if(empty($_POST['deadline'])){
            $project_deadline = date('Y-m-d');
        } else {
            $project_deadline = date( 'Y-m-d', strtotime($_POST['deadline']));
        }
//        $project_deadline = date('Y-m-d', strtotime($_POST['deadline']));
        $project_type = $_POST['projectType'];
        $project_summary = $_POST['projectSummery'];
        $result = $crud->execute("INSERT INTO project (project_name, start_date, deadline, project_type, summary) VALUES ('$project_name', '$project_start', '$project_deadline', '$project_type', '$project_summary')");

        $user_id = $crud->execute("SELECT id FROM user WHERE name= '".$_POST['projectLeader']."' ") ;
        $p_id = $crud->execute("SELECT MAX(id) FROM project");

        $result = $crud->execute("INSERT INTO member (project_id, user_id, title) VALUES ('$p_id', '$user_id', 2)");
        // foreach ($values as $var){
        //     $user_id = $crud->execute("SELECT id FROM user WHERE name= '".$var."' ") ;
        //     $result = $crud->execute("INSERT INTO member (project_id, user_id, title) VALUES ('$project_id', '$user_id', 3)");
        // }

        $employees = $crud->SELECT('user');

    }

    if(isset($_POST['update_project'])){
      $name = $_POST['name'];
      $type = $_POST['type'];

      $start_date = date('Y-m-d', strtotime($_POST['startDate']));
      $summary = $_POST['projectSummery'];
      $deadline =  date('Y-m-d', strtotime($_POST['deadline']));
      $id = $_POST['project_id'];
      // echo $id;
      $query = "UPDATE project SET project_name='$name', project_type='$type', start_date='$start_date', deadline='$deadline', summary='$summary' WHERE id=$id";
      $result = $crud->execute($query);

      $leader = $_POST['leader'];

      // $query = "UPDATE member SET user_id=$leader WHERE title=2 and project_id=$id)";
      // $query = "UPDATE member SET user_id=$leader WHERE id in (SELECT id FROM member WHERE title=2 and project_id=$id)";
      $id = $crud->search('member', 'user_id', $leader);
      $var = $id['id'];
      $query = "UPDATE project SET user_id=$leader WHERE id=$var";

      $result = $crud->execute($query);
      // $x = $_POST['member'];
      // foreach($x as $y){
      //   echo $y;
      // }


    }

    if(isset($_POST['add_employee'])){
      $name = $_POST['employeeName'];
      $phone = $_POST['phoneNo'];
      $email = $_POST['emaiId'];
      $title = $_POST['title'];

      $image = addslashes($_FILES['image']['tmp_name']); //SQL Injection defence!
      $image_name = addslashes($_FILES['image']['name']);
      $image = file_get_contents($image);
      $image = base64_encode($image);

      $emp_id = $_POST['empId'];
      $nid = $_POST['nid'];
      $department = $_POST['department'];
      $present_address = $_POST['presentAddress'];
      $permanent_address =$_POST['permanentAddress'];
      $salary = $_POST['salary'];
      $dob = Date('Y-m-d', strtotime($_POST['dob']));
      $joining_date = Date('Y-m-d', strtotime($_POST['joiningDate']));
      $user = $_POST['user'];
      $password =$_POST['password'];
      // $result = $crud->execute("INSERT INTO user (name, phone, image, image_name, email, title, emp_id, nid, department, present_address, permanent_address, salary, birth_date, joining_date, user, password) VALUES ('$name', '$phone', '$image', '$image_name', '$email', '$title', '$emp_id', '$nid', '$department', '$present_address', '$permanent_address', '$salary', '$dob', '$joining_date', '$user', '$password')");
      $result = $crud->execute("INSERT INTO user (name, image, image_name) VALUES('$name', '$image', '$image_name')");


      if($result){
        $_SESSION['msg'] = "New Employee Registered Successfully";
      } else {
        $_SESSION['msg'] = "Employee Registration Error";
      }
    }

    if(isset($_POST['edit_employee'])){
      $id = $_POST['employee_id'];

    }
    if(isset($_POST['delete_employee'])){
      $id = $_POST['employee_id'];

      $result = $crud->delete('user', $id);
      if(!$result){
        echo 'Error in deletion';
      }
    }
    if(isset($_POST['update_employee'])){
      $id = $_POST['employee_id'];

      $image = addslashes($_FILES['image']['tmp_name']); //SQL Injection defence!
      $image_name = addslashes($_FILES['image']['name']);
      $image = file_get_contents($image);
      $image = base64_encode($image);

      $name = $_POST['employeeName'];
      $phone = $_POST['phoneNo'];
      $email = $_POST['emailId'];
      $dob = Date('Y-m-d', strtotime($_POST['dob']));
      $nid = $_POST['nid'];
      $present_address = $_POST['present_address'];
      $permanent_address =$_POST['permanent_address'];
      $department = $_POST['department'];
      $designation = $_POST['designation'];
      $salary = $_POST['salary'];
      $joining_date = Date('Y-m-d', strtotime($_POST['joining_date']));

      // $emp_id = $_POST['empId'];
      // $user = $_POST['user'];
      // $password =$_POST['password'];
      $result = $crud->execute("UPDATE user SET name='$name', image='$image', image_name='$image_name', phone='$phone', email='$email', dob='$dob', nid='$nid', present_address='$present_address', permanent_address='$permanent_address', department='$department', designation='$designation', salary='$salary', joining_date='$joining_date' WHERE id=$id");


      if($result){
        $_SESSION['msg'] = "New Employee Registered Successfully";
      } else {
        $_SESSION['msg'] = "Employee Registration Error";
      }
    }


?>
