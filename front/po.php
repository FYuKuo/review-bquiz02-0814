<div>目前位置：首頁 > 分類網誌 > <span class="changeTitle">健康新知</span> </div>
<div class="d-flex just-c">

    <fieldset class="w-20">
        <legend>分類網誌</legend>
        <div class="list_item" onclick="get_list(1,'健康新知')">健康新知</div>
        <div class="list_item" onclick="get_list(2,'菸害防治')">菸害防治</div>
        <div class="list_item" onclick="get_list(3,'癌症防治')">癌症防治</div>
        <div class="list_item" onclick="get_list(4,'慢性病防治')">慢性病防治</div>
    </fieldset>

    <fieldset class="w-50">
        <legend class="changeTitle2">文章列表</legend>
        <div class="showDiv">

        </div>
    </fieldset>
</div>

<script>
    get_list(1);

    function get_list(type,title){
        $('.showDiv').children().remove();

        $('.changeTitle').text(title);
        $('.changeTitle2').text('文章列表');


        $.get('./api/get_list.php',{type},(res)=>{

            res = JSON.parse(res);

            let text = '';

            // console.log(res);
            res.forEach(element => {
                text = text + `<div class="title_item" onclick="get_news(${element.id})">${element.title}</div>`
            });

            $('.showDiv').append(text);

        })
    }

    function get_news(id){
        $('.showDiv').children().remove();




        $.get('./api/get_news.php',{id},(res)=>{

            res = JSON.parse(res);


            $('.showDiv').append(`<div>${res.text}</div>`);
            $('.changeTitle2').text(res.title);


        })
    }

</script>