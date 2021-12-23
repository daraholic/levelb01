<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$DB->title;?></p>
    <form method="post" target="back" action="?do=tii">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%"><?=$DB->header;?></td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                // 分頁功能
                $all=$DB->math('count','*');
                $div=3;
                $pages=ceil($all/$div);
                $now=$_GET['p']??1;
                $start=($now-1)*$div;
                
                $rows=$DB->all(" limit $start,$div");
                foreach($rows as $row){
                    $checked=($row['sh']==1)?'checked':'';

                
                ?>
            </tbody>
        </table>
        <?php
            for ($i=1; $i<=$pages; $i++) {
                if($i==$now){
                    $fontsize="24px";
                }else{
                    $fontsize="16px";
                }
                echo "<a href='?do={$DB->table}&p=$i style='font-size:$fontsize'> $i </a>";
            }
        ?>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button"
                            onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/title.php&#39;)" 
                              value="<?=$DB->button;?>">
                    </td>
                    <td class="cent">
                    <?php
                    if(($now-1)>0){
                        $p=$now-1;
                        echo "<a href='?do={$DB->table}&p=$p'> &lt </a>"; // &lt 是 < 的實體符號
                    }

                for ($i=1; $i<=$pages; $i++) {
                   if($i==$now){
                    $fontsize="24px";
                }else{
                    $fontsize="16px";
                }
                echo "<a href='?do={$DB->table}&p=$i style='font-size:$fontsize'> $i </a>";
                }
                    if(($now+1)<=$pages){
                    $p=$now+1;
                    echo "<a href='?do={$DB->table}&p=$p'> &gt </a>"; // &gt 是 > 的實體符號
                    ?>
                }


                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div