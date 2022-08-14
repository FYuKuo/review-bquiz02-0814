<fieldset>
    <legend>最新文章管理</legend>

    <form action="./api/edit_news.php" method="post">
        <table class="ct aut w-100">
            <tr>
                <td class="w-10">編號</td>
                <td>標題</td>
                <td class="w-10">顯示</td>
                <td class="w-10">刪除</td>
            </tr>
            <?php
            $num = $News->math('COUNT', 'id');
            $limit = 3;
            $pages = ceil($num / $limit);
            $now = ($_GET['page']) ?? 1;
            if ($now <= 0 || $now > $pages) {
                $now = 1;
            }
            $start = ($now - 1) * $limit;
            $limitSql = " Limit $start,$limit";
            $rows = $News->all($limitSql);
            $i = 0;
            foreach ($rows as $key => $row) {
                $i++;
            ?>
                <tr>
                    <td class="clo"><?= $start + $i ?></td>

                    <td>
                        <?= $row['title'] ?>
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?=($row['sh'] == 1)?'checked':''?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?= $row['id'] ?>">
                    </td>
                    <td>
                        <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                    </td>

                </tr>
            <?php
            }
            ?>
        </table>
        <div class="page ct">
            <?php
            if($now >1){
            ?>
            <a href="?do=news&page=<?=$now-1?>">&lt;</a>
            <?php
            }
            for ($i=1; $i <= $pages ; $i++) { 
            ?>
            <a href="?do=news&page=<?=$i?>" class="<?=($now == $i)?'nowPage':''?>"><?=$i?></a>
            <?php
            }

            if($now < $pages){
            ?>
            <a href="?do=news&page=<?=$now+1?>">&gt;</a>
            <?php
            }
            ?>
        </div>

        <div class="ct">
            <input type="submit" value="確定修改" >

        </div>
    </form>
</fieldset>