<?php
$que = $Que->find(['id' => $_GET['id']]);
$opts = $Que->all(['parent_id' => $_GET['id']])
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $que['name'] ?></legend>
    <h4>
        <?= $que['name'] ?>
    </h4>

    <?php
    foreach ($opts as $key => $opt) {
        $num = round(($opt['sum'] / $que['sum']) * 100, 0);
    ?>
    <div class="d-flex a-c w-100">
        <div style="margin: 10px 0;width: 30%;">
            <?= ($key + 1) . "." . $opt['name'] ?>
        </div>
        &nbsp;
        &nbsp;
        <div class="d-flex" style="width: 60%;">
            <div style="background-color: #ccc;height: 25px; width:<?= $num ?>%"></div>
            &nbsp;

            <div class="div">
                <?= $opt['sum'] ?>票(<?= $num ?>%)

            </div>

        </div>
    </div>
    <?php
    }
    ?>
    <div class="ct">
        <input type="button" value="返回" onclick="location.href='./index.php?do=que'">
    </div>

</fieldset>