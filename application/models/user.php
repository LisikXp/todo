<?php
Class User{

	function set_user($user){
		$done = 0;
		$result = mysql_query ("INSERT INTO task_user SET user='$user'");
		if ($result == 'true') {
			$this->get_user_list();
		} else {
			echo "false";
		}
	}

	function get_users(){
		$sql_res = mysql_query("SELECT * FROM task_user") or die(mysql_error()); 
		if(mysql_num_rows($sql_res) != 0 ){ 
			for ($i=0; $i < mysql_num_rows($sql_res); $i++) { 
				$arr[] = mysql_fetch_assoc($sql_res);
			}
			return $arr;
		}
	}

	function get_user_list(){
		$event = new Event();
		$arr = $this->get_users();
		for ($i=0; $i < count($arr); $i++) { 
			?>
			<li class="tile date">
				<div class="flex-wrapper">
					<div class="task-description">
						<p class="task-name">
							<?= $arr[$i]['user'];?>
						</p>
						<?php
						$event->get_event($arr[$i]['user']);
						?>
					</div>
				</div>
			</li>
			<?php
		}
	}



}
?>
