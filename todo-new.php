<?php
include 'includes/header.php';
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
          <main id="todolist">
            <h1>
              Todo List
              <span>Get things done, one item at a time.</span>
            </h1>

            <template v-if="todo.length">
              <transition-group name="todolist" tag="ul">
                <li v-for="item in todoByStatus" v-bind:class="item.done ? 'done' : ''" v-bind:key="item.id">
                  <span class="label">{{item.label}}</span>
                  <div class="actions">
                    <button class="btn-picto" type="button" v-on:click="markAsDoneOrUndone(item)" v-bind:aria-label="item.done ? 'Undone' : 'Done'" v-bind:title="item.done ? 'Undone' : 'Done'">
                      <i aria-hidden="true" class="material-icons">{{ item.done ? 'check_box' : 'check_box_outline_blank' }}</i>
                    </button>
                    <button class="btn-picto" type="button" v-on:click="deleteItemFromList(item)" aria-label="Delete" title="Delete">
                      <i aria-hidden="true" class="material-icons">delete</i>
                    </button>
                  </div>
                </li>
              </transition-group>
              <togglebutton label="Move done items at the end?" name="todosort" v-on:clicked="clickontoogle" />
            </template>
            <p v-else class="emptylist">Your todo list is empty.</p>

            <form name="newform" v-on:submit.prevent="addItem">
              <label for="newitem">Add to the todo list</label>
              <input type="text" name="newitem" id="newitem" v-model="newitem">
              <button type="submit">Add item</button>
            </form>
        </main>

        <form action="">
        First name: <input type="text" id="txt1" onkeyup="showHint(this.value)">
        </form>

        <p>Suggestions: <span id="txtHint"></span></p>
      </div>
    </div>
  </div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->



<?php
include 'includes/footer.php';
?>
