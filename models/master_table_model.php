<?php

function select(){
	$query = mysql_query("select a.* , b.building_name as nama_gedung
							from tables a
							join buildings b on b.building_id = a.building_id
							order by table_id");
	return $query;
}

function select_building(){
	$query = mysql_query("select * from buildings order by building_id ");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
			from tables
			where table_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into tables values(".$data.")");
}

function update($data, $id){
	mysql_query("update tables set ".$data." where table_id = '$id'");
}

function delete($id){
	mysql_query("delete from tables where table_id = '$id'");
}
?>