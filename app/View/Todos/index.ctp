<div class="container">

<div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">My Todo's</h3>
        </div>
        <div class="panel-body">
          
           <table class="table">
         <thead>
            <tr>
              <th>Nr</th>
              <th>Todo</th>
              <th>Created</th>
              <th>Deadline</th>
              <th>edit</th>
              <th>resolve</th>
            </tr>
          </thead>
          <tbody>
          <?php $i = 0; ?>
          <?php foreach($todos as $todo) : ?>
          
            <tr>
              <td><?php $i++;
                  echo "$i"; ?></td>
              <td width="50%"><?php echo $todo['Todo']['description']; ?></td>
              <td><?php echo $date = date("H:i - d.m.y", strtotime($todo['Todo']['created'])); ?></td>
              <td>
               <?php
                  $day = $todo['Todo']['days'] * 86400;
                  $std = $todo['Todo']['hours'] * 3600;
                  $min = $todo['Todo']['minute'] * 60;
                  $deadline = (strtotime($todo['Todo']['created'])) + $day + $std + $min;
                  $date_aktuell = time();
                  $differenz = $deadline - $date_aktuell;
                  if($differenz >= 0)
                  {
                  $zeit = mktime(0,0,0,0,0,0);
                  $rechne_zeit = $zeit + $differenz;
                  $sekunde = date ("s",$rechne_zeit);
                  $minute = date ("i",$rechne_zeit);
                  $stunde = date ("H",$rechne_zeit);
                  echo "$stunde:$minute:$sekunde";
                  }
                  if ( ($differenz < 0 AND $todo['Todo']['minute'] > 0)
                                  OR
                   ($differenz < 0 AND $todo['Todo']['hours'] > 0)
                                  OR
                   ($differenz < 0 AND $todo['Todo']['days'] > 0))
                  {
                  echo "<b style=\"color:red\">deadline passed!!!</b>";
                  }
                  if ((is_null($differenz))
                                OR
                      ( is_null($todo['Todo']['days']) AND is_null($todo['Todo']['hours']) AND is_null($todo['Todo']['minute'])))
                  {echo "<b style=\"color:green\">no deadline</b>";}
                    
                  ?>
                 </td> 
                   <td>
                  <?php
                  echo $this->Html->link(
                  $this->Html->image('Edit.png',
                  array("alt" => __('Edit'), "title" => __('Edit'))), 
                  array('action'=>'edit', $todo['Todo']['id']), 
                  array('escape' => false, 'confirm' => __('Are you sure you want to edit this Todo?')) 
                  ); ?>
                  </td>
          
          
          <td><?php
           echo $this->Form->postLink(
    $this->Html->image('Check.png',
       array("alt" => __('Resolve'), "title" => __('Resolve'))), 
    array('action' => 'resolve', $todo['Todo']['id']), 
    array('escape' => false, 'confirm' => __('Are you sure?')) 
); ?>
    </td>
            </tr>
            <?php endforeach; ?>
<?php unset($todo); ?>
          </tbody>
            
    </table>
  </div>
</div>





<div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">My resolved Todo's</h3>
        </div>
        <div class="panel-body">
          
           <table class="table">
         <thead>
            <tr>
              <th>Nr</th>
              <th>Todo</th>
              <th>Created</th>
              <th>unresolved</th>
              <th>edit</th>
              <th>delete</th>
            </tr>
          </thead>
          <tbody>
          <?php $i = 0; ?>
          <?php foreach($resolved as $todo) : ?>
          
            <tr>
              <td><?php $i++;
                  echo "$i"; ?></td>
              <td width="50%"><?php echo $todo['Todo']['description']; ?></td>
              <td><?php echo $date = date("H:i d.m.Y", strtotime($todo['Todo']['created'])); ?></td>
              
              
                                 <td><?php
           echo $this->Form->postLink(
    $this->Html->image('Undo.png',
       array("alt" => __('unresolved'), "title" => __('unresolved'))), 
    array('action'=>'unresolved', $todo['Todo']['id']), 
    array('escape' => false, 'confirm' => __('Are you sure you want to unresolved this Todo?')) 
); ?>
    </td>
              
          
                   <td><?php
           echo $this->Html->link(
    $this->Html->image('Edit.png',
       array("alt" => __('Edit'), "title" => __('Edit'))), 
    array('action'=>'edit', $todo['Todo']['id']), 
    array('escape' => false, 'confirm' => __('Are you sure you want to edit this Todo?')) 
); ?>
    </td>
          
          
          <td><?php
           echo $this->Form->postLink(
    $this->Html->image('delete.png',
       array("alt" => __('Delete'), "title" => __('Delete'))), 
    array('action' => 'delete', $todo['Todo']['id']), 
    array('escape' => false, 'confirm' => __('Are you sure you want to delete this Todo?')) 
); ?>
    </td>
            </tr>
<?php endforeach; ?>
<?php unset($todo); ?>
          </tbody>
            
    </table>
  </div>
</div>
<a class="btn btn-primary" <?php echo $this->Html->link('Add Todo', array('controller'=>'todos', 'action'=>'add',)); ?></a>

</div>
