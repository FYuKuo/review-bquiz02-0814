<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>

    <table class="w-90 aut ct">
        <tr>
            <th>編號</th>
            <th>問卷題目</th>
            <th style="width: 7%;">投票總數</th>
            <th style="width: 7%;">結果</th>
            <th style="width: 7%;">狀態</th>
        </tr>
        <?php
        $rows = $Que->all(['parent_id'=>0]);
        foreach ($rows as $key => $row) {
        ?>
        <tr>
            <td>
                <?=$key+1?>.
            </td>
            <td>
                <?=$row['name']?>
            </td>
            <td>
                <?=$row['sum']?>
            </td>
            <td>
                <a href="?do=res&id=<?=$row['id']?>">結果</a>
            </td>
            <td>
                <?php
                if(isset($_SESSION['user'])){
                ?>
                <a href="?do=vote&id=<?=$row['id']?>">參與投票</a>
                <?php
                }else{
                ?>
                請先登入
                <?php
                }
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>

</fieldset>