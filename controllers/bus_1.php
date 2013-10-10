<?php
include 'config.php';
if (isset($_REQUEST['name'])) {    
    $name = $_REQUEST['name'] ;
}else{
    $name ='';
}
?>

<?php
include 'head.php';

function select($name) {

    $sql_bus = "SELECT * FROM tb_bus 
WHERE id_bus IN(SELECT id_bus FROM tb_bp
WHERE id_point =
(select id_point from tb_point
WHERE name_point = '$name'))";
    $re_sql = mysql_query($sql_bus);
    ?>    

    <div class="page-content inset">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <form action="bus.php" method="get" >
                    <p class="lead">ค้นหารถเมล์</p>
                    <input class="well" type="text" name="name" placeholder="ต้องการไป"/>
                    <input class="well " type="submit" value="ค้นหา"/>
                    </form>
                </center>
            </div>
            <div class="col-md-12">

                <table class="table table-striped">
                    <th>ลำดับ</th><th>สายที่ผ่าน</th><th>ชื่อ</th>
                    <?php $n = 1; ?>
    <?php while ($re = mysql_fetch_array($re_sql)) { ?>
                        <tr>
                            <td><?=$n?></td>
                            <td><?= $re['num_bus'] ?></td>
                            <td><?= $re['name_bus'] ?></td>

                        </tr>
    <?php $n++; } ?>
                </table>
            </div>

        </div>
    </div>

<?php
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

select($name);


include 'foot.php';
?>