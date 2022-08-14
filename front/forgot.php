<fieldset class="aut w-50 p-20">

<table class="aut w-100">
    <tr>
        <td>
            請輸入信箱以查詢密碼
        </td>
    </tr>
    <tr>
        <td>
            <input type="text" name="email" id="email" style="width: 90%;">
        </td>
    </tr>
    <tr>
        <td class="message">
            
        </td>
    </tr>
    <tr>
        <td>
            <input type="button" value="尋找" onclick="findPw()">
        </td>
    </tr>
</table>

</fieldset>

<script>
    function findPw() {

        let email = $('#email').val();

        if(email != ""){

            $.get('./api/forgot.php',{email},(res)=>{
                $('.message').text(res);
            })

        }
    }
</script>