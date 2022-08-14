<fieldset>
    <legend>目前位置：首頁 > 文氣文章區</legend>

    <table class="ct aut">
        <tr>
            <th style="width: 33%;">標題</th>
            <th style="width: 33%;">內容</th>
            <th style="width: 33%;">人氣</th>
        </tr>
        <?php
        $num = $News->math('COUNT', 'id', ['sh' => 1]);
        $limit = 4;
        $pages = ceil($num / $limit);
        $now = ($_GET['page']) ?? 1;
        if ($now <= 0 || $now > $pages) {
            $now = 1;
        }
        $start = ($now - 1) * $limit;
        $limitSql = " Limit $start,$limit";
        $rows = $News->all(['sh' => 1], " ORDER BY `good` DESC" . $limitSql);
        foreach ($rows as $key => $row) {
        ?>
            <tr>
                <td class="clo myHover">
                    <?= $row['title'] ?>
                    <div id="alerr" class="show">
                        <h3><?= $row['title'] ?></h3>
                        <pre id="ssaa">
                            <?=$row['text']?>
                        </pre>
                    </div>
                </td>
                <td><?= mb_substr($row['text'], 0, 10) ?>...</td>
                <td>
                    <?= $row['good'] ?>個人說<div class="good"></div>
                    <?php
                    if (isset($_SESSION['user'])) {
                        if (empty($Log->find(['user' => $_SESSION['user'], 'news_id' => $row['id']]))) {
                    ?>
                            - <span class="likeBtn" onclick="add_good(1,<?= $row['good'] + 1 ?>,<?= $row['id'] ?>)">讚</span>
                        <?php
                        } else {
                        ?>
                            - <span class="likeBtn" onclick="add_good(0,<?= $row['good'] - 1 ?>,<?= $row['id'] ?>)">收回讚</span>
                    <?php
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="page">
        <?php
        if ($now > 1) {
        ?>
            <a href="?do=pop&page=<?= $now - 1 ?>">&lt;</a>
        <?php
        }
        for ($i = 1; $i <= $pages; $i++) {
        ?>
            <a href="?do=pop&page=<?= $i ?>" class="<?= ($now == $i) ? 'nowPage' : '' ?>"><?= $i ?></a>
        <?php
        }

        if ($now < $pages) {
        ?>
            <a href="?do=pop&page=<?= $now + 1 ?>">&gt;</a>
        <?php
        }
        ?>
    </div>
</fieldset>

<script>
    function add_good(type, good, id) {

        $.post('./api/add_good.php', {
            type,
            good,
            id
        }, () => {

            location.reload();

        })

    }

    $(document).ready(function(){


        $('.myHover').hover(function(){
            $(this).children().toggle();

        })
        
    })
</script>