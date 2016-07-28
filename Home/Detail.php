<?php
include "../_Layout.php";

$Id=$_GET["Id"];
$sql="SELECT * FROM article WHERE Id=$Id";
$results=DbContext::Query($sql, array());
$result_array=$results->fetchAll();

$sql="SELECT * FROM tag";
$result=  DbContext::Query($sql, array());
$tag_array=$result->fetchAll();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <div style="width:1400px; margin:auto" class="bs-example bs-example-type">
        <a href="Index.php" class="btn btn-default" >首頁</a>
        <form action="Edit_post.php" method="POST" >
            <div class="form-group">
                <label>標題</label>
                <div><?=$result_array[0]["Title"]?></div>
                <!--<input class="form-control" type="text" name="Title" placeholder="title" value="<?=$result_array[0]["Title"] ?>">-->
            </div>
            <div class="form-group">
                <label>內文</label>
                <div><?=$result_array[0]["Content"] ?></div>
            </div>
            <div class="form-group">
                <table class="table-bordered table">
                    <tr>
                        <th>類別</th>
                        <th>編輯人</th>
                        <th>是否隱藏</th>
                    </tr>
                    <tr>
                        <td>
                             <?php
                            foreach($tag_array as $key =>$value):
                                if($result_array[0]["ClassTag"]==$value["Id"])
                                {
                                    echo $value["Name"];
                                    break;
                                }

                                ?>


                                <?php
                            endforeach;
                            ?>
                        </td>
                        <td>
                             <?php echo $result_array[0]["Author"];?>
                        </td>
                        <td>
                            <input  type="checkbox" name="IsHidden" disabled=""  value="1" <?php  if($result_array[0]["IsHidden"]==1){  echo  "checked";}  ?>>
                        </td>
                    </tr>
                </table>

            </div>



        </form>
  </div>
<?php
include "../_Footer.php";

?>