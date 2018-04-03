<?php
include 'database/server.php';
  $crud = new Crud();
  $page = isset($_GET['q']) ? $_GET['q']: '';

  $member_id = $_SESSION['task_id'];

  if($page == 'add'){
      $text = $_GET['text'];
      $deadline = Date('Y-m-d', strtotime($_GET['deadline']));

      $query = "INSERT INTO task (text, status, deadline, member_id) VALUES ('$text', 0, '$deadline', '$member_id')";
      echo $query;
      $result = $crud->execute($query);
      if($result){
        echo "Inserted Successfully";
      } else {
        echo "Failed";
      }
  }
  else if($page == 'edit'){
      $id = $_GET['id'];
      $text = $_GET['text'];
      $deadline = Date('Y-m-d', strtotime($_GET['deadline'])) ;
      echo $deadline;
      // $updated_at = Date('Y-m-d h:i:s');
      $query = "UPDATE task SET text='$text', deadline='$deadline'  WHERE id='$id'";
      // echo $query;
      $result = $crud->execute($query);
      if($result){
        echo "Updated Successfully";
      } else {
        echo "Failed";
      }
  }
  else if($page == 'del'){
    $id = $_GET['id'];
    $result = $crud->delete('task', $id);
    if($result){

    }
  }
  else if($page == 'done'){
      $id = $_GET['id'];

      $state = $_GET['state']  == 'true' ? 1 : 0;
      echo $state;
      $result = $crud->execute("UPDATE task SET status=$state WHERE id=$id");
      if($result){
//          echo "Success";
      } else {
//          echo "Failed";
      }
  }
  else if($page == 'view') {

//      print_r($member_id);
      $result = $crud->show("SELECT * FROM task WHERE member_id=$member_id");
//      $result = $crud->show("SELECT * FROM task WHERE member_task.member_id=$member_id and task.id=member_task.task_id");
      foreach ($result as $key => $row){
          if($row['status']){
              $status = 'true';
          } else {
              $status = '';
          }
          $deadline = Date('Y-m-d', strtotime($row['deadline']));
          $today = Date('Y-m-d');
          if($deadline == $today){
            $warn = "warning";
          } else if($deadline < $today){
              $warn = "danger";
          } else {
              $warn = "success";
          }
        ?>
        <li>
            <div class="task-checkbox">
                <input type="checkbox" <?php if($status) echo 'checked'; ?> class="list-child" onclick="taskDone(<?php echo $row['id']; ?>)" id="todo-check-<?php echo $row['id']; ?>" />
            </div>
            <div class="task-title">
                <span class="task-title-sp"><?php echo $row['text']; ?></span>
                <span class="badge badge-sm label-<?php echo $warn; ?>"><?php echo Date("d-M-Y", strtotime($row['deadline'])); ?></span>
                <div class="pull-right hidden-phone">

                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit-<?php echo $row['id']; ?>">Edit</button>
                    <div class="modal fade" id="edit-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editLabel-<?php echo $row['id'];?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h5 class="modal-title" id="editLabel-<?php echo $row['id']; ?>">Edit Data</h5>
                                </div>

                                <form>
                                    <div class="modal-body">
                                        <input type="hidden" id="<?php echo $row['id']; ?>">
                                        <div class="form-group">
                                            <label for="text">Text</label>
                                            <input type="text" class="form-control" id="text-<?php echo $row['id']; ?>" placeholder="Text" value="<?php echo $row['text']; ?>">
                                            <input type="date" class="form-control" id="deadline-<?php echo $row['id']; ?>" name="deadline" placeholder="Deadline" value="<?php echo Date('Y-m-d', strtotime($row['deadline'])); ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" onclick="updateData(<?php echo $row['id']; ?>)" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-danger btn-xs" onclick="deleteData(<?php echo $row['id'] ?>)">Delete</button>
                </div>
            </div>
        </li>
        <?php
    }
}

?>
