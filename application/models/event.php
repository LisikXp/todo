<?php

Class Event{

	function set_event($datevent, $fulldate, $user, $event){
		$task = new Task();
		$done = 0;
		$result = mysql_query ("INSERT INTO task_log SET datevent='$datevent', fulldate='$fulldate', user='$user', event='$event', done='$done'");
		if ($result == 'true') {
			$task->get_list($datevent);
		} else {
			echo "false";
		}
	}

	function edit_event($id, $done){
		$result = mysql_query ("UPDATE task_log SET done='$done' WHERE id='$id'");
	}

	function get_event($user){
		$sql_res = mysql_query("SELECT * FROM task_log WHERE user='$user'") or die(mysql_error()); 
		if(mysql_num_rows($sql_res) != 0 ){ 
			for ($i=0; $i < mysql_num_rows($sql_res); $i++) { 
				$arr = mysql_fetch_assoc($sql_res);
				if ($arr['done'] == "1") {
					$eventclass = "task-event done";
				} else {
					$eventclass = "task-event";
				}
				?>
				<div class="task-block"  id="<?= $arr['id'];?>">
					<p class="<?= $eventclass;?>">
						<?= $arr['event'];?>
					</p>
					<p class="remove">
						удалить
					</p>
				</div>
				<?php
			}
			
		}
	}

	function get_event_done($user, $date){
		$sql_res = mysql_query("SELECT * FROM task_log WHERE user='$user' AND done='1' AND datevent='$date'") or die(mysql_error()); 
		if(mysql_num_rows($sql_res) != 0 ){ 
			return mysql_num_rows($sql_res);
		}
	}

	function get_event_not_done($user, $date){
		$sql_res = mysql_query("SELECT * FROM task_log WHERE user='$user' AND done='0' AND datevent='$date'") or die(mysql_error()); 
		if(mysql_num_rows($sql_res) != 0 ){ 
			return mysql_num_rows($sql_res);
		}
	}

	function get_popup(){
		$user = new User();
		$user_list = $user->get_users();
		
		for ($i=0; $i < count($user_list); $i++) { 
			?>
			<option value="<?= $user_list[$i]['user'] ;?>"><?= $user_list[$i]['user'] ;?></option>
			<?php
			
		}
	}

	function delete_event($id){
		$sql_res = mysql_query("DELETE FROM task_log WHERE id='$id'");
	}
}
?>