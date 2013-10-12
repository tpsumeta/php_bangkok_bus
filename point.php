<?php
if (isset($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
} else {
    $name = '';
}
include 'head.php';
?>

<script>
    $(function() {
        $("#search").autocomplete(
                {
                    source: 'js/source.php',
                });

    });
</script>

<?php

function select($name) {
    $sql_point = "SELECT * FROM tb_point
WHERE id_point ='$name'";
    $re_point = mysql_query($sql_point);
    ?> 
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <form action="point.php" method="get">
                        <p class="lead">ค้นหารถสถานที่
                            <input class="well" type="text"  id="search"  name ="name" placeholder="ต้องการไป"/>
                            <input class="well " type="submit"  value="ค้นหา"/>
                        </p>

                    </form>
                </center>
            </div>
                <?php if (isset($_REQUEST['name'])) { ?>
                <div class="col-md-12">
                    ชื่อจุดที่เลือก <?= $name ?>
                    <?php $sql_bus = "SELECT * FROM tb_bus WHERE id_bus IN(SELECT id_bus FROM tb_bp WHERE id_point =(
    SELECT id_point FROM tb_point WHERE name_point='$name' ))" ?>
                        <?php $re_bus = mysql_query($sql_bus) ?>
                    <table class="table table-striped">
                        <th>ลำดับ</th><th>สาย</th><th>ชื่อ</th>
        <?php $n = 1; ?>
        <?php while ($row_bus = mysql_fetch_array($re_bus)) { ?>
                            <tr>
                                <td><?= $n ?></td>
                                <td>
                                    <a href="bus.php?name=<?= $row_bus['num_bus'] ?>"><?= $row_bus['num_bus'] ?></a>
                                </td>
                                <td>
                                    <a href="bus.php?name=<?= $row_bus['num_bus'] ?>"><?= $row_bus['name_bus'] ?></a>
                                </td>

                            </tr>
                    <?php $n++;
                } ?>
                    </table>
                </div>
    <?php } ?>
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