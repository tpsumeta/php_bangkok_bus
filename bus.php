<?php
include 'config.php';
if (isset($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
} else {
    $name = '';
}
?>

<?php
include 'head.php';

function select($name) {

    $sql_bus = "SELECT * FROM tb_bus 
WHERE num_bus = '$name'";
    $re_sql = mysql_query($sql_bus);
    ?>    

    <div class="page-content inset">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <form action="bus.php" method="get" >
                        <p class="lead">ค้นหารถเมล์  <input class="well" type="text" name="name" placeholder="รถเมล์สาย..."/>
                            <input class="well " type="submit" value="ค้นหา"/></p>

                    </form>
                </center>
            </div>
            <div class="col-md-12">
                <?php $row = mysql_fetch_array($re_sql) ?> 
                <?php if (isset($row['name_bus'])) { ?>
                    รถเมล์สาย  <?= $row['num_bus'] ?>  ชื่อ  <?= $row['name_bus'] ?>
                    <?php $id_bus = $row['id_bus']; ?>
                    <?php $sql_point = "SELECT * FROM tb_point WHERE id_point IN
                    (SELECT id_point FROM tb_bp WHERE id_bus ='$id_bus')  " ?>
                    <?php $re_point = mysql_query($sql_point) ?>
                    <table class="table table-striped">
                        <th>ลำดับ</th><th>ผ่านจุด</th><th>ถนน</th>
                        <?php $n = 1; ?>
                        <?php while ($row_point = mysql_fetch_array($re_point)) { ?>
                            <tr>
                                <td><?= $n ?></td>
                                <td><?= $row_point['name_point'] ?></td>
                                <td><?= $row_point['road'] ?></td>

                            </tr>
                            <?php $n++; ?>   
                        <?php } ?>

                    </table>

                <?php } ?>
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