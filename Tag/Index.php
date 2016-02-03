<?php


include "../_Layout.php";
$sql="SELECT * FROM tag";
$results=  DbContext::Query($sql, array());
$result_array=$results->fetchAll();
//$sql="SELECT * FROM user";
//$result=  DbContext::Query($sql, array());
//$user_array=$result->fetchAll();
?>



<html>
    <head>
        
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="">
        <div class="col-xs-4 success" style="">
                <a href="../Home/Index.php" class="btn btn-default">首頁</a>
            <form action="Create_post.php" method="POST" class="form-horizontal" style="">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="Name">
                </div>
                <input class="btn btn-default"  type="submit" value="新增" name="submit">
            </form>
        </div>
        <div class="col-xs-5">
            <table class="table table-striped">
                <tr>
                    <th></th>
                    <th>編號</th>
                    <th>類別</th>   
                </tr>
                <?php
                foreach ($result_array as $results):
                    ?>
                <tr>
                    
                    <td>
                        <a href="Delete.php?Id=<?=$results["Id"]?>" class="btn btn-default">刪除</a>
                    </td>
                    <td><?=$results["Id"]?></td>
                    <td>
                        <form action="Edit_post.php" method="POST">
                            <input value="<?=$results["Name"]?>" name="Name" class="">
                            <input name="Id" type="hidden" value="<?=$results["Id"]?>">
                            <input type="submit" name="submit" value="修改">
                        </form>
                    </td>
                    
                </tr>
                
                
                
              <?php
              endforeach;
                ?>
                
            </table>
            <?php


            
            
            
            ?>            
        </div>
        
        
        <div class="col-xs-4">

        </div>
        
        

        <div></div>
    </body>
</html>