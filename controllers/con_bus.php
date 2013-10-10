<?php

include '../config.php';

if(isset($_REQUEST['id_bus'])){
$id = $_REQUEST['id_bus'];
$name = $_REQUEST['name_bus'];
$detail = $_REQUEST['detail'];
}
function select() {

    $sql_bus = "select * from tb_bus";
    $re_sql = mysql_query($sql_bus);
      
}

function insert() {
    $sql_bus = "INSERT INTO  `tb_bus` (`id_bus` , `name_bus` ,`detail`) VALUES ('$id',  '$name',  '$detail'";
    $re_sql = mysql_query($sql_bus);
    $row_sql = mysql_fetch_array($re_sql);
}

function update() {
    $sql_bus = "UPDATE `tb_bus` SET  `name_bus` =  '$name' WHERE  `tb_bus`.`id_bus` =$id";
    $re_sql = mysql_query($sql_bus);
    $row_sql = mysql_fetch_array($re_sql);
}

function delete() {
    $sql_bus = "DELETE FROM tb_bus WHERE id='$id'";
    $re_sql = mysql_query($sql_bus);
    $row_sql = mysql_fetch_array($re_sql);
}

?>




