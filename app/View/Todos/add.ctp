<div class="container">
<?php
echo $this->Form->create('Todo');
?>
<div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Add Todo</h3>
        </div>
        <div class="panel-body">
         <ul class="list-group">
  <li class="list-group-item"><?php echo $this->Form->input('description'); ?></li>
  <li class="list-group-item"><?php echo "deadline"; ?></li>
  <li class="list-group-item"><?php echo $this->Form->input('days'); ?></li>
  <li class="list-group-item"><?php echo $this->Form->input('hours'); ?></li>
  <li class="list-group-item"><?php echo $this->Form->input('minute'); ?></li>
</ul>
        </div>
        
      </div>
      <a class="btn btn-primary" <?php echo $this->Html->link('Back', array('controller' => 'todos', 'action' => 'index')); ?></a>
      <input class="btn btn-primary" type="submit" method="post" value="Add"></form>
    </div>  




