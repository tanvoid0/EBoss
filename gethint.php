<?php
// Array with names
include 'database/classes/Crud.php';

$crud = new Crud();

$result = $crud->select('task');

// get the q parameter from URL
$q = $_REQUEST["q"];

if(isset($_GET['insert'])) {
  $insert = $_GET['insert'];
  $result = $crud->execute("INSERT INTO task (label) VALUES ('$insert')");
  if(!$result){
    echo 'Error!';
  } else {
    echo 'Inserted';
  }
}
if(isset($_REQUEST['del'])) {
  $id = $_GET['del'];
  $result = $crud->execute("DELETE FROM task WHERE id=$id");
  if(!$result){
    echo 'Error!';
  } else {
    echo 'Deleted';
  }
}

if(isset($_GET['toggle'])) {
  $id = $_GET['toggle'];
  $done = $_GET['done'];
  $result = $crud->execute("UPDATE task SET done=$done WHERE id=$id");
}

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
   $q = strtolower($q);
   $len=strlen($q);
   foreach($result as $name) {
       if (stristr($q, substr($name['title'], 0, $len))) {
           if ($hint === "") {
               $hint = $name['title'];
           } else {
               // $hint .= ", $name['title']";
           }
       }
   }
}
// echo json_encode($result);
// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : json_encode($result);
?>
