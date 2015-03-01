<?php

function select(){
	$query = mysql_query("select * from menus order by menu_id");
	return $query;
}

function select_menu($keyword){
	$query = mysql_query("select * from menus where menu_name like '%$keyword%' order by menu_id");
	$row = mysql_fetch_array($query);
	return $row['menu_id'];
}

function create_config($table, $data){
	mysql_query("insert into $table values(".$data.")");
}

?>