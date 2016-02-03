<?php
include "../_Layout.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="col-xs-5">
    <a href="../Home/Index.php" class="btn btn-default">首頁</a>
    <form action="Create_post.php" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password"class="form-control"  name="Password">
                </div>
                <div class="form-group">
                    <label>NickName</label>
                    <input type="text"class="form-control"  name="NickName">
                </div>
                <div>
                    <label>IsAdmin</label>
                <?php
                    if (user::IsAdmin($_SESSION["IsAdmin"]) == 0) {
                        echo "<input name='IsAdmin' type='checkbox' value=1>";
                    } else {
                        echo "<input name='IsAdmin' type='hidden' value=0 >";
                    }
        ?>
                </div>
                <input class="btn btn-default"  type="submit" value="新增" name="submit">
            </form>
    </div>
<div class="col-xs-5">
    <div class="well-sm" style="<?php echo user::IsAdmin($_SESSION["IsAdmin"]) ?>">
                <table class="table">
                    <tr>
                        <th>帳號</th>
                        <th>名稱</th>
                        <th>是否為管理員</th>
                        <th></th>
                    </tr>
                <?php
                $sql="SELECT * FROM user";
                $results=  DbContext::Query($sql, array());
                $result_user_array=$results->fetchAll();
                foreach($result_user_array as $user_array):
                    ?>
                    <tr>
                        <td>
                            <a href="Delete.php?Username=<?=$user_array["Username"]?>" class="btn btn-default">刪除</a>
                            <?=$user_array["Username"]?>
                        </td>
                        <form action="Edit_post.php?Username=<?=$user_array["Username"] ?>" method="Post">
                        <td>
                            <input type="text" name="NickName" value="<?=$user_array["NickName"] ?>">
                            <input type="hidden" name="Username" value="<?=$user_array["Username"]?>">
                        </td>
                        <td>
                            <?php
                            if($user_array["IsAdmin"]==1)
                            {
//                                echo"<a class='btn btn-default disabled'>是</a>";
                            }
                            else
                            {
//                                echo"<a class='btn btn-default disabled'>否</a>";
                            }
                            ?>
                            <select name="IsAdmin">
                               <option value=0  <?php if($user_array["IsAdmin"]==0){echo "selected=''"; }  ?> >否</option>
                                <option value=1 <?php if($user_array["IsAdmin"]==1){echo "selected=''"; }  ?>>是</option>
                            </select>
                        </td>

                        <td>
                            <input type="submit" name="submit" value="修改" class="btn btn-default">
                        </form>
                    </tr>
                 
                    
                    <?php
                endforeach;
                ?>
                </table>
            </div>
            
        </div>

    
</div>