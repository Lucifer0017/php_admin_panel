<?php

// error_reporting(1);

ini_set('max_execution_time', '0');
set_time_limit(0);
date_default_timezone_set('Asia/Kolkata');
$conn=mysqli_connect("localhost","root","","fundaservices");

if(!$conn)
{
	die("could not connect server... and Database!!");
}
ob_start();

function getDB(){
    $conn=mysqli_connect("localhost","root","","fundaservices");
	if(!$conn)
	{
		die("could not connect server... and Database!!");
	} else {
		return $conn;
	}
}
function update_data($table_name, $data, $condition)
{
	$query = "update ".$table_name." set ";
	foreach($data as $column => $values)
	{
		if(!is_numeric($column))
		{
			$query .= "".$column."='".$values."', ";
		}
	}
	$query = substr($query, 0, -2) ." where ";
	$query .= "".$condition."";

	$res = mysqli_query(getDB(),$query);
	if($res)
	{
		return $res;
	}
	else
	{
		$mysqli_error = mysqli_error(getDB())."<br><b> QUERY => ". $query."</b>";
		echo $mysqli_error;
	}

}
function insert_data($table_name, $data)
{
        //echo 'COmig';
	$query = "insert into ".$table_name." (";
	foreach($data as $column => $values)
	{
		if(!is_numeric($column))
		{
			$query .= "".$column.",";
		}
	}
	$query = substr($query, 0, -1) . ") values (";
	foreach($data as $column => $values)
	{
		if(!is_numeric($column))
		{
			$query .= "'".$values."',";
		}
	}
	$query = substr($query, 0, -1) . ")";
        //echo 'QRY '.$query;
	$res = mysqli_query(getDB(),$query);
	if($res)
	{
		return $res;

	}
	else
	{
		$mysqli_error = mysqli_error(getDB())."<br><b> QUERY => ". $query."</b>";
            //echo sql_err($mysqli_error);
		echo '++++===='.$mysqli_error;
	}

}
function delete_data($table_name, $condition)
{
	$query = "delete from ".$table_name." where ";
          //$query .= "".key($condition)." = '". $condition[key($condition)]."' limit 1";
	$query .= "".$condition." limit 1";

	$res = mysqli_query(getDB(),$query);
	if($res)
	{
		return $res;
	}
	else
	{
		$mysqli_error = mysqli_error(getDB())."<br><b> QUERY => ". $query."</b>";
		// echo sql_err($mysqli_error);
	}

}
function getLogin($username,$password)
{
	
	$chkMem=mysqli_query(getDB(),"SELECT * FROM `admin` WHERE `email` = '$username' AND `password`= '$password'");
	if (mysqli_num_rows($chkMem) > 0) {
		$fetch=mysqli_fetch_assoc($chkMem);
		$_SESSION["email"] = $fetch['email'];
		$_SESSION["FundFlow"] = $fetch['email'];
		$_SESSION["name"] = $fetch['name'];
		$_SESSION["logintime"] = date('H:m:i');
		$_SESSION["mainURL"] = 'index';
		return true;
	}
	return false;
}
function getAdminDetails($email){
	$chkMem=mysqli_query(getDB(),"SELECT * FROM `admin` WHERE `email` = '$email'");
	$fetch=array();
	if (mysqli_num_rows($chkMem) > 0) {
		$fetch=mysqli_fetch_assoc($chkMem);
	}
	return $fetch;
}


function getTableList($tablename){
	$chkList = mysqli_query(getDB(),"SELECT * FROM `".$tablename."` ORDER BY id DESC");
	$fetch=array();
	while ($row=mysqli_fetch_assoc($chkList)) {
		array_push($fetch,$row);
	}
	return(array_values($fetch));
}


