
<?php

$db = mysql_connect("mysql.zzz.com.ua", "lisikx", "Komsomolskay120"); // root - логин, 1234 - пароль к базе данных
mysql_select_db("lisikx", $db); // test - имя базы данных
mysql_query("SET character_set_results = 'utf8', 
			     character_set_client = 'utf8', 
			     character_set_connection = 'utf8',
			     character_set_database = 'utf8', 
			     character_set_server = 'utf8'", $db);

?>