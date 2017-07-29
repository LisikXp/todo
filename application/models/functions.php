<?php 
include_once "db.php";
include_once "event.php";
include_once "user.php";

class Task{


  function get_list($date){
    $class_event = new Event;
    $sql_res = mysql_query("SELECT * FROM task_log WHERE datevent='$date'") or die(mysql_error()); 
    if(mysql_num_rows($sql_res) != 0 ){ 
      for ($r=0; $r < mysql_num_rows($sql_res); $r++) { 
       $arra = mysql_fetch_assoc($sql_res);
       $allaray[] = $arra['user'];
     }
     $array = array_unique($allaray);
     $array = array_merge($array);

     for ($i=0; $i < count($array); $i++) { 
       $result = mysql_query("SELECT * FROM task_log WHERE datevent='$date' AND user='$array[$i]'") or die(mysql_error()); 

       $arr = mysql_fetch_assoc($result);
       $user = $arr['user'];
       $date = $arr['datevent'];
       $event_list_done = $class_event->get_event_done($user, $date);
       $event = $class_event->get_event_not_done($user, $date);
       $done = $arr['done'];
       $fulldate = $arr['fulldate'];
       ?>
       <li class="tile date" id="<?= $arr['id'];?>">
         <div class="flex-wrapper">
          <div class="task-description">
          <div class="task-block">
              <p class="task-date">
                <?= $fulldate . ' ' . $date;?>
              </p>
              <p class="remove_tesk" data-user="<?= $user;?>" data-ndate="<?= $date;?>">
                удалить
              </p>
            </div>
            <p class="task-name">
              <?= $user;?>
            </p>
            <p class="task-photo">
             Выполненных:  <?= $event_list_done;?>
             Не выполненных:  <?= $event;?>
           </p>
         </div>
       </div>
     </li>
     <?php  } } else {
      ?>
      <script>
        $(function(){
          $('#event-popup').addClass('flex-wrapper');
          fixBody();

        });
      </script>
      <?php
    }


  }

  function delete_task($ndate, $user){
    $sql_res = mysql_query("DELETE FROM task_log WHERE user='$user' AND datevent='$ndate'");
  }

}
?>