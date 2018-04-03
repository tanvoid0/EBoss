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

<script src="js/bootbox.min.js"></script>
<!-- Custom scripts for this page-->
<script src="js/sb-admin-datatables.min.js"></script>
<!-- select 2 -->
<script type="text/javascript" src="js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>
<!-- Dropify image upload -->
<script src="js/dropify.min.js"></script>
<script>
  $(document).ready(function(){
      // Basic
      $('.dropify').dropify();

      // Translated
      $('.dropify-fr').dropify({
          messages: {
              default: 'Glissez-déposez un fichier ici ou cliquez',
              replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
              remove:  'Supprimer',
              error:   'Désolé, le fichier trop volumineux'
          }
      });

      // Used events
      var drEvent = $('#input-file-events').dropify();

      drEvent.on('dropify.beforeClear', function(event, element){
          return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
      });

      drEvent.on('dropify.afterClear', function(event, element){
          alert('File deleted');
      });

      drEvent.on('dropify.errors', function(event, element){
          console.log('Has Errors');
      });

      var drDestroy = $('#input-file-to-destroy').dropify();
      drDestroy = drDestroy.data('dropify')
      $('#toggleDropify').on('click', function(e){
          e.preventDefault();
          if (drDestroy.isDropified()) {
              drDestroy.destroy();
          } else {
              drDestroy.init();
          }
      })
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<?php
  if(!isset($crud)) {
    include 'database/classes/Crud.php';
    $crud = new Crud();
  }
  $todo = $crud->select('task');
?>
<script type="text/javascript">
<?php


?>
// function getData(){
  var lastId;
  var tasker = <?= json_encode($todo); ?>;
  for(var i = 0; i < tasker.length; i++) {
     // var obj = tasker[i];
     if(tasker[i].done == 1){
       tasker[i].done = true;
     } else {
       tasker[i].done = false;
     }
   }
 // }
 // getData();
// Todo list
  Vue.component('togglebutton', {
    props: ['label', 'name'],
    template: `<div class="togglebutton-wrapper" v-bind:class="isactive ? 'togglebutton-checked' : ''">
        <label v-bind:for="name">
          <span class="togglebutton-label">{{ label }}</span>
          <span class="tooglebutton-box"></span>
        </label>
        <input v-bind:id="name" type="checkbox" v-bind:name="name" v-model="isactive" v-on:change="onToogle">
    </div>`,
    model: {
      prop: 'checked',
      event: 'change'
    },
    data: function() {
      return {
        isactive:false
      }
    },
    methods: {
      onToogle: function() {
         this.$emit('clicked', this.isactive)
      }
    }
  });

  var todolist = new Vue({
    el: '#todolist',
    data: {
      newitem:'',
      sortByStatus:false,
      todo: tasker
      // [
      //   { id:1, label: "Learn VueJs", done: true },
      //   { id:2, label: "Code a todo list", done: false },
      //   { id:3, label: "Learn something else", done: false },
      //   { id:4, label: "New Task", done: true}
      // ]
    },
    methods: {
      addItem: function() {
        lastId = Number(this.todo[tasker.length-1].id)+1;
        console.log("Insertion ID: "+lastId);
        this.todo.push({id: lastId, label: this.newitem, done: 0});

        var str = this.newitem;
        sendData('insert',str);

        this.newitem = ''; // Make todo field blank
      },
      markAsDoneOrUndone: function(item) {
        var str = item.id;
        item.done = !item.done;
        var done = Number(item.done);
        console.log(done);
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.open("GET", "gethint.php?toggle="+str+"&done="+done, true);
        xhttp.send();

        this.newitem = ''

      },
      deleteItemFromList: function(item) {
        var obj = this.todo;
        bootbox.confirm({
          size: "small",
          message: "Are you sure?",
          callback: function(result){ /* result is a boolean; true = OK, false = Cancel*/
            if(result){
              var str = item.id;
              sendData('del',str);
              console.log("Delete ID: "+str);

              let index = obj.indexOf(item)
              obj.splice(index, 1);
            }
          }
        })
      },
      clickontoogle: function(active) {
        this.sortByStatus = active;
      }
    },
    computed: {
      todoByStatus: function() {

        if(!this.sortByStatus) {
          return this.todo;
        }

        var sortedArray = []
        var doneArray = this.todo.filter(function(item) { return item.done; });
        var notDoneArray = this.todo.filter(function(item) { return !item.done; });

        sortedArray = [...notDoneArray, ...doneArray];
        return sortedArray;
      }
    }
  });

  function sendData(task, data){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "gethint.php?"+task+"="+data, true);
    xhttp.send();

    this.newitem = ''
  }

</script>
<script src="js/custom.js"></script>
</div>
</body>

</html>
