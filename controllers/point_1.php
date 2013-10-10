<?php 
include 'config.php';
if (isset($_REQUEST['name'])) {    
    $name = $_REQUEST['name'] ;
}else{
    $name ='';
}

include 'head.php'; ?>


<?php
function select($name) {

      echo  $sql_bus = "SELECT * FROM tb_point
WHERE id_point IN(SELECT id_point FROM tb_bp
WHERE id_bus =
(select id_bus from tb_bus
WHERE name_bus = '$name'))";
    $re_sql = mysql_query($sql_bus);
    ?> 


    <div class="page-content inset">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <form action="point.php" method="get">
                    <p class="lead">ค้นหารถสถานที่</p>
                    <input class="well" type="text" name ="name" placeholder="ต้องการไป"/>
                    <input class="well " type="submit"  value="ค้นหา"/>
                    </form>
                </center>
            </div>
            <div class="col-md-12">

                <table class="table table-striped">
                    <th>ลำดับ</th><th>สถานที่</th><th></th>
                    <?php $n = 1; ?>
    <?php while ($re = mysql_fetch_array($re_sql)) { ?>
                        <tr>
                            <td><?=$n?></td>
                            <td><?= $re['name_point'] ?></td>
                            <td><?= $re['road'] ?></td>

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

include 'foot.php'; ?>