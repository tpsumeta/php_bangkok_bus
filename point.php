<?php
include './config.php';

$id = $_REQUEST['id_point'];
$name = $_REQUEST['name_point'];
$road = $_REQUEST['road'];

function  select(){
$sql_point = "select * from tb_point";
$re_sql = mysql_query($sql_point);
$row_sql = mysql_fetch_array($re_sql);
}

function  insert(){
$sql_point = "INSERT INTO  `tb_point` (`id_point` , `name_point` ,`road`) VALUES ('$id',  '$name',  '$road'";
$re_sql = mysql_query($sql_point);
$row_sql = mysql_fetch_array($re_sql);
}

function  update(){
$sql_point = "UPDATE `tb_point` SET  `name_point` =  '$name' WHERE  `id_point` = '$id'";
$re_sql = mysql_query($sql_point);
$row_sql = mysql_fetch_array($re_sql);
}

function  delete(){
$sql_point = "DELETE FROM tb_point WHERE id='$id'";
$re_sql = mysql_query($sql_point);
$row_sql = mysql_fetch_array($re_sql);
}

?>
