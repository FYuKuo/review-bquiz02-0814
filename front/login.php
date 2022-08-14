<fieldset class="w-50 aut p-20">
    <legend>會員登入</legend>

    <table class="aut">
        <tr>
            <td class="clo w-50">帳號</td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo">密碼</td>
            <td>
                <input type="password" name="pw" id="pw">
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="登入" onclick="login()">
                <input type="button" value="清除" onclick="reset()">
            </td>
            <td style="text-align: right;">
                <a href="?do=forgot">忘記密碼</a>
                |
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function login(){

        let acc = $('#acc').val();
        let pw = $('#pw').val();

        $.get('./api/ch_acc.php',{acc},(res)=>{

            if(parseInt(res) == 1){
                
                $.get('./api/ch_pw.php',{acc,pw},(res)=>{

                    if(parseInt(res) == 1){

                        if(acc == 'admin'){
                            
                            location.href = './back.php';
                        }else{
                            location.href = './index.php';
                        }

                    }else{
                        alert('密碼錯誤');
                    }
                })

            }else{

                alert('查無此帳號');

            }
        })
    }


</script>