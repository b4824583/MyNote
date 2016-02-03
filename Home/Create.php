<?php


include "../_Layout.php";
$sql="SELECT * FROM tag";
$result=  DbContext::Query($sql, array());
$result_array=$result->fetchAll();
$sql="SELECT * FROM user";
$result=  DbContext::Query($sql, array());
$user_array=$result->fetchAll();
?>



<html>
    <head>
        
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="width:800px; margin: auto">
        <a href="Index.php" class="btn btn-default">首頁</a>
        <form action="Create_post.php" method="POST">
            <div class="form-group">
                <label>標題</label>
                <input class="form-control" type="text" name="Title" placeholder="title">
            </div>
            <div class="form-group">
                <label>內文</label>
                <textarea name="Content" id="container" style="height:500px;"></textarea>
            </div>
            <script type="text/javascript">
                var ue = UE.getEditor('container');
            </script>
            <div class="form-group">
                <label>類別</label>
                <select name="ClassTag" class="form-control">
                    <?php
                    foreach($result_array as $key =>$value):
                        ?>
                    <option value="<?=$value["Id"]?>"><?=$value["Name"]?></option>
                        
                        <?php
                    endforeach;
                    ?>
                    
                </select>
            </div>
                <input name="Author" type="hidden" value="<?=$_SESSION["Username"]  ?>">
                <!--<input class="form-control" type="text" name="Author" >-->
                
            <div class="form-group">
                <label>是否隱藏</label>
                <input class="form-control" type="checkbox" name="IsHidden" value=1>
            </div>
            <input  type="submit" value="確認" name="submit">
        </form>
        

        <div></div>
    </body>
</html>