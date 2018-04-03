$(document).ready(function(){
    $('#add-todo').hide();
  $('#add-todo-submit').click(function(){
    $('#add-todo').toggle();
    if($('#add-todo').is(":visible") ){
      // console.log("Visible");
        $('#add-todo-submit').text('Insert');
    } else {
        // console.log("Inserted");
        saveData();
        $('#add-todo-submit').text('Add New Tasks');
    }
  });

});

function saveData(){
  x = $('#add-todo-input').val();
  y = $('#add-todo-deadline').val();
  console.log("deadline: "+y);
  $.ajax({
    type: "GET",
    url: "server.php?q=add",
    data: "text="+x+"&deadline="+y,
  }).done(function(msg){
    $('#msg').html("<br/><div class='alert alert-success' >Inserted successfully</div>");
    viewData();
    $('#add-todo-input').val('');
    $('#add-todo-deadline').val('');
  });
  total = 0;
}

function taskDone(str){
  var state = $('#todo-check-'+str).is(':checked');
  $.ajax({
      type:"GET",
      url: "server.php?q=done",
      data: "id="+str+"&state="+state,
  }).done(function(msg){
      // $('#result').html("<br/><div class='alert alert-info'>"+msg+"</div>");
      viewData();
      console.log(msg);
  });
}

function updateData(str){
  var id = str;
  var text = $('#text-'+str).val();
  var deadline = $('#deadline-'+str).val();
  // console.log("Deadline: "+ deadline);
  // alert(str+" "+text+" "+deadline);
  $.ajax({
    type: "GET",
    url: "server.php?q=edit",
    data: "id="+id+"&text="+text+"&deadline="+deadline,
  }).done(function(msg){
    $('#result').html("<br/><div class='alert alert-info'>"+msg+"</div>");
    viewData();
  });
}

function deleteData(str){
  var id = str;
  console.log()
  $.ajax({
    type: "GET",
    url: "server.php?q=del",
    data: "id="+id,
  }).done(function(msg){
    $('#msg').html("<br/><div class='alert alert-danger'>Deleted successfully!</div>");
    viewData();
  });
}

function viewData(){
  // console.log("fff");
  // $('#sortable').html('Hello');
  $.ajax({
    type: "GET",
    url: "server.php?q=view",
    success: function(data){
      // console.log(data);
      $('#sortable').html(data);
      // $('#sortable').html('Hello');
    }
  });
}
