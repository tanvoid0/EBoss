<?php include 'database/server.php'; ?>
<?php
if(isset($_GET['user_id'])){

    $user_id = $_GET['user_id'];
    $project_id = $_GET['project_id'];

    $query = "SELECT id FROM member WHERE project_id=$project_id and user_id=$user_id";
    $id = $crud->todo($query);
    $_SESSION['task_id'] = $id['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Todo List</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link href="css/tasks.css" rel="stylesheet">

      <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->




  </head>

  <body onload="viewData()">

  <section id="container" class="">
      <!--header start-->

          <section class="wrapper">
              <!-- page start-->
              <div id="msg"></div>


              <div class="row">
                  <div class="col-md-12">
                      <section class="panel tasks-widget">
                          <header class="panel-heading">
                              Sortable Todo list
                          </header>
                          <div class="panel-body">
                              <div class="task-content">
                                  <ul id="sortable" class="task-list">

                                  </ul>
                              </div>
                              <div class="form-group" id="add-todo">
                                  <input type="text" class="form-control" id="add-todo-input" placeholder="Select your task">
                                  <input type="date" id="add-todo-deadline" name="add-todo-deadline" class="form-control">
                              </div>

                              <!--Insert Form-->
                              <div class=" add-task-row">
                                  <button class="btn btn-success btn-sm pull-left" href="#" id="add-todo-submit">Add New Tasks</button>
                                  <a class="btn btn-default btn-sm pull-right" href="#">See All Tasks</a>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->

      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <script src="js/tasks.js" type="text/javascript"></script>




    <script>
      jQuery(document).ready(function() {
          TaskList.initTaskWidget();
      });

      $(function() {
          $( "#sortable" ).sortable();
          $( "#sortable" ).disableSelection();
      });

    </script>
    <script src="todo.js">
    </script>
  </body>
</html>
