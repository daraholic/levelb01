<h3>更新標題區圖片</h3>
<hr>
<!-- form>table>tr*2>td*2 -->
<form action="api/upload_title.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>標題區圖片:</td>
            <td><input type="file" name="img"></td>
        </tr>
    </table>
    <!-- div>input:submit -->
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <div><input type="submit" value="更新" type="reset" value="重置"></div>
</form>

