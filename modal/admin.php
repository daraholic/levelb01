<h3>新增管理者帳號</h3>
<hr>
<!-- form>table>tr*2>td*2 -->
<form action="api/title.php?do<?=$_GET['table'];?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>帳號:</td>
            <td><input type="file" name="img"></td>
        </tr>
        <tr>
            <td>密碼:</td>
            <td><input type="text" name="text"></td>
        </tr>
    </table>
    <!-- div>input:submit -->
    <div><input type="submit" value="新增" type="reset" value="重置"></div>
</form>

