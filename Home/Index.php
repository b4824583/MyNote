<?php
include '../_Layout.php';
//if(isset($_SESSION["Username"])==FALSE)
//    header("Location:../User/Login.php");
if(isset($_GET["ClassTag"]))
{
   $where_sql="WHERE ClassTag=".$_GET["ClassTag"];
}
 else {
$where_sql=NULL;    
}
$sql= "SELECT * FROM V_ARTICLE_DETAIL $where_sql";
$result = DbContext::Query($sql, array());
$result_array = $result->fetchAll();

$sql="SELECT Name,ClassTag FROM V_ARTICLE_DETAIL";
$result=  DbContext::Query($sql, array());
$result_count_array=$result->fetchAll();
//$result_array=0;
if(isset($_SESSION["IsAdmin"]))
{
    $IsAdmin=$_SESSION["IsAdmin"];
}    
else
{
    $IsAdmin=0;
}

?>

<!-- Latest compiled and minified JavaScript -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
<!DOCTYPE html>
<html>
    <head>
        <title>Homework1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="">
        <div class="col-xs-8">
            <table  class="table table-hover"  style="">
                <tr>
                    <th>
                        類別
                    </th>
                    <th>
                        標題
                    </th>
                    <th>
                        修改人
                    </th>
                    <th>
                        是否隱藏
                    </th>
                    <th>
                        時間
                    </th>
                    <th>
                        <a class="btn btn-success btn-sm" href="Create.php"  style="<?php echo user::IsAdmin($IsAdmin) ?>" >新增</a>
                    </th>
                    <th>

                    </th>
                </tr>

                    <?php
                    foreach($result_array as $results):
                    ?>
                <tr>

                    <td>
                        <?= $results["Name"] ?>
                    </td>

                    <td>
                        <a href="Detail.php?Id=<?=$results["Id"]?>">
                     <?=    $results["Title"];?>   
                        </a>
                    </td>
                    <td>
                        <?=$results["Author"]?>
                    </td>
                    <td>
                        <?php
                        if($results["IsHidden"]==0)
                        {
                         echo "<a  class='btn btn-default btn-sm disabled'>否</a>";   
                        }
                        else
                        {
                            echo "<a  class='btn btn-default btn-sm disabled'>是</a>";
                        }
                            ?>
                    </td>                     
                    <td>
                        <?php
                        echo date("Y/m/d",strtotime($results["Datetime"]));
                                ?>
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm"  href="Edit.php?Id=<?php echo $results["Id"] ?>" style="<?php echo user::IsAdmin($IsAdmin) ?>">修改</a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="Delete.php?Id=<?php echo $results["Id"] ?>" style="<?php echo user::IsAdmin($IsAdmin) ?>" onclick="return confirm('是否刪除?');">刪除</a>
                    </td>





                </tr>   
                    <?php
                    endforeach; 
                    ?>




            </table>
        </div>
        
        <?php
        
        //這邊先宣告Count Array的變數，文章第一個列表的第一筆資料先存進去
         $count_array[0] = array("ClassTag"=>$result_count_array[0]["ClassTag"] ,"Name" => $result_count_array[0]["Name"], "Count" => 1);
         //這邊先宣告Count Array的變數，文章第一個列表的第一筆資料先存進去
        for($i=1;;$i++)
        {
            //這邊假如第一次文章列表沒有文章了，就跳出去
            if(isset($result_count_array[$i]["Name"])==FALSE)
            {
                break;
            }         
            //這邊假如第一次文章列表沒有文章了，就跳出去
            
            //這邊的迴圈是，每一次都去找COUNT ARRAY每一個項目
            for($j=0;;$j++)
            {
                //如果COUNT ARRAY裡面有資料，就先判斷他是不是相同，如果相同就將數目加一並且跳出去
                //如果不同就寫入新的Array，並且跳出去
                if(isset($count_array[$j]["Name"]))
                {
                    if($result_count_array[$i]["Name"]==$count_array[$j]["Name"])
                    {
                        $count_array[$j]["Count"]++;
                        break;
                    }
                    else if($j==count($count_array)-1 && $result_count_array[$i]["Name"]!=$count_array[$j]["Name"] )
                    {
                        $count_array[]=array("ClassTag"=>$result_count_array[$i]["ClassTag"] ,"Name"=>$result_count_array[$i]["Name"],"Count"=>1);
                        break;
                    }
                }
                //如果COUNT ARRAY裡面沒有資料的話就跳出
                else
                {
                    break;
                }
            }
            
        }
        
        
        ?>
        <div class="col-xs-4">
            <div class="well">
                
                <?php
                if(isset($_SESSION["Username"] ))
                {
                    echo $_SESSION["Username"];
                }
                if ($IsAdmin) {
                    echo "<a class='disabled btn btn-default'>管理者</a>";
                } else {
                    echo "<a class='disabled btn btn-default'>使用者</a>";
                }
                if(isset($_SESSION["Username"]))
                {
                    ?>
                <a href="../User/Logout.php" class="btn btn-warning btn-sm">登出</a>
                <?php
                }
                else
                {
                    ?>
                 <a href="../User/Login.php" class="btn btn-primary btn-sm">登入</a>
                    <?php
                }
                ?>
                
            </div>
                
            <table style="" class="table table-bordered">
                <tr>
                    <th>類別
                    <a class="btn btn-primary btn-sm" href="../Tag/Index.php" style="<?php echo user::IsAdmin($IsAdmin) ?>">管理</a>
                    </th>                    
                </tr>
                <?php
                $sum_count=0;
                foreach($count_array as $value):
                    $sum_count+=$value["Count"];
                    
                endforeach;
                ?>
                <tr>
                    <td>
                        <a href="../Home/Index.php">
                            全部<?="(".$sum_count.")"?>
                        </a>
                    </td>
                </tr>
                <?php
                foreach($count_array as $value):
                ?>
                <tr>
                    <td>
                        <a href="../Home/Index.php?ClassTag=<?=$value["ClassTag"]?>" style="">
                      <?php echo $value["Name"]."(".$value["Count"].")"?>
                        </a>
                    </td>
                </tr>
                <?php
                endforeach;
                ?>
            </table>
            <div class="well-sm" style="<?php echo user::IsAdmin($IsAdmin) ?>">
                <table class="table">
                    <tr>
                        <th>帳號</th>
                        <th>名稱</th>
                        <th>是否為管理員</th>
                        <th>
                            <a href="../User/Index.php" class="btn btn-primary btn-sm">
                                管理
                            </a>
                        </th>
                    </tr>
                <?php
                $sql="SELECT * FROM user";
                $results=  DbContext::Query($sql, array());
                $result_user_array=$results->fetchAll();
                foreach($result_user_array as $user_array):
                    ?>
                    <tr>
                        <td>
                            <?=$user_array["Username"]?>
                        </td>
                        <td>
                            <?=$user_array["NickName"] ?>
                        </td>
                        <td>
                            <?php
                            if($user_array["IsAdmin"]==1)
                            {
                                echo"<a class='btn btn-default disabled'>是</a>";
                            }
                            else
                            {
                                echo"<a class='btn btn-default disabled'>否</a>";
                            }
                            ?>
                        </td>
                        <td></td>
                    </tr>
                 
                    
                    <?php
                endforeach;
                ?>
                </table>
            </div>
            
        </div>


<?php
include "../_Footer.php";
?>