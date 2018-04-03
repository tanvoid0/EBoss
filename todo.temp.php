
<?php
    include_once 'database/server.php';
    if(empty($_SESSION["user_id"])) {
        include 'login.php';
    }
    else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>EBoos Management System</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Icofont -->
  <link href="css/icofont.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Select 2 -->
  <link rel="stylesheet" href="css/select2.min.css">
  <!-- todo -->
  <link rel="stylesheet" href="css/todo.css">
x
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->

<?php
include 'includes/navbar.php';
?>

<div class="content-wrapper">
  <div class="cont_principal">
    <div class="cont_centrar">
      <div class="cont_todo_list_top">
        <div class="cont_titulo_cont">
          <h3>THINGS TO DO</h3>
        </div>
        <div class="cont_add_titulo_cont"><a href="#e" onclick="add_new()"><i class="material-icons"></i></a></div>

        <!--   End cont_todo_list_top  -->
      </div>
      <div class="cont_crear_new">
        <table class="table">
          <tr>
            <th>Action</th>
            <th>Title</th>
            <th>Date</th>
          </tr>
          <tr>
            <td>
              <select name="" id="action_select">
                <option value="SHOPPING">SHOPPING</option>
                <option value="WORK">WORK</option>
                <option value="SPORT">SPORT</option>
                <option value="MUSIC">MUSIC</option>
              </select>
              <!-- End td 1 -->
            </td>
            <td>
              <input type="text" class="input_title_desc" />
              <!-- End td 2 -->
            </td>
            <td>
              <select name="" class="input_description_title"  id="date_select">
                <option value="TODAY">TODAY</option>
                <option value="TOMORROW">TOMORROW</option>
              </select>

              <!-- End td 3 -->
            </td>
          </tr>
          <tr>
            <th class="titl_description" >Description</th>
          </tr>
          <tr>
            <td colspan="3">
              <input type="text" class="input_description" required />
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <button class="btn_add_fin"  onclick="add_to_list()">ADD</button>
            </td>
          </tr>
        </table>
        <!--   End cont_crear_new  -->
      </div>

      <div class="cont_princ_lists">
        <ul>
          <li class="list_shopping li_num_0_1">
            <div class="col_md_1_list">
              <p>SHOPPING</p>
            </div>
            <div class="col_md_2_list">
              <h4>BUY COFFEE BEANS</h4>
              <p>DODIDONE COFFEE STORE</p>
            </div>
            <div class="col_md_3_list">
              <div class="cont_text_date">
                <p>TODAY</p>
              </div>
              <div class="cont_btns_options">
                <ul>
                  <li><a href="#" onclick="finish_action('0','0_1');"><i class="material-icons"></i></a></li>
                </ul>
              </div>
            </div>
          </li>
          <!-- <li class="list_work"></li>
          <li class="list_sport"></li>
          <li class="list_music"></li>-->
        </ul>
        <!--   End cont_todo_list_top  -->
      </div>
      <!--   End cont_central  -->
    </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<footer class="sticky-footer">
  <div class="container">
    <div class="text-center">
      <small>Copyright © Your Website 2017</small>
    </div>
  </div>
</footer>
<!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form method="post" action="index.php">
              <button class="btn btn-primary" name="logout" id="logout">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <!-- select 2 -->
    <script type="text/javascript" src="js/select2.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
      });
    </script>
    <script src="js/todo.js"></script>
  </div>
</body>
</html>
<?php
    }
?>
