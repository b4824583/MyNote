<?php
//include "../DbContext.php";
include '../_Layout.php';
$Id=$_GET["Id"];
$sql="SELECT * FROM article WHERE Id=$Id";
$results=DbContext::Query($sql, array());
$result_array=$results->fetchAll();

$sql="SELECT * FROM tag";
$result=  DbContext::Query($sql, array());
$tag_array=$result->fetchAll();
$sql="SELECT Username FROM user";
$result=  DbContext::Query($sql, array());
$user_array=$result->fetchAll();

?>



        <div style="width:800; margin:auto">
        <a href="Index.php" class="btn btn-default" >首頁</a>
        <form action="Edit_post.php" method="POST" >
            <div class="form-group">
                <label>標題</label>
                <input class="form-control" type="text" name="Title" placeholder="title" value="<?=$result_array[0]["Title"] ?>">
            </div>
            <div class="form-group">
                <label>內文</label>
                <textarea name="Content" id="container" style="height:500px;"><?=$result_array[0]["Content"] ?>  </textarea>
            </div>
            <script type="text/javascript">
                var ue = UE.getEditor('container');
            </script>
            <div class="form-group">
                <label>類別</label>
                <!--<input class="form-control" type="number" name="ClassTag" placeholder="category"  value="<?=$result_array[0]["ClassTag"] ?>">-->
                
                <select name="ClassTag" class="form-control">
                    <?php
                    foreach($tag_array as $key =>$value):
                        if($result_array[0]["ClassTag"]==$value["Id"])
                        {
                            $select="selected=''";
                        }
                        else
                        {
                            $select=NULL;
                        }
                        ?>
                    
                    <option value="<?=$value["Id"]?>" <?php echo $select ?>><?=$value["Name"]?></option>
                        
                        <?php
                    endforeach;
                    ?>
                    <!--<option >asd</option>-->
                </select>               
            </div>
            <div class="form-group">
                <label>編輯人</label>
                <input class="form-control" type="text" value="<?=$result_array[0]["Author"] ?>" disabled="">
                <input  type="hidden" name="Author"  value="<?=$result_array[0]["Author"] ?>" >
<!--                    <select name="Author" class="form-control">
                    <?php
//                    foreach($user_array as $key =>$value):
//                        if($result_array[0]["ClassTag"]==$value["Id"])
//                        {
//                            $select="selected=''";
//                        }
//                        else
//                        {
//                            $select=NULL;
//                        }
                        ?>
                    <option value="<?=$value["Username"]?>" <?=$select  ?>><?=$value["Username"]?></option>
                        
                        <?php
//                    endforeach;
                    ?>
                    
                </select>               -->
            </div>
            <div class="form-group">
                <label>是否隱藏</label>
                <input class="form-control" type="checkbox" name="IsHidden" value="1" <?php  if($result_array[0]["IsHidden"]==1){  echo  "checked";}  ?>>
            </div>
            <input type="hidden" value="<?=$Id?>" name="Id">
            <input  type="submit" value="確認" name="submit">
        </form>
        
<?php
include "../_Footer.php";

?>