<h3>新增動畫圖片</h3>
<hr>
<!-- form>table>tr*2>td*2 -->
<form action="api/add.php?do=<?=$_GET['table'];?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>動畫圖片:</td>
            <td><input type="file" name="img"></td>
        </tr>
    </table>
    <!-- div>input:submit -->
    <div><input type="submit" value="新增" type="reset" value="重置"></div>
</form>

