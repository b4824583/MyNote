<?php
include '../_Layout.php';
if(isset($_SESSION["Username"]))
{
    header("Location:../Home/Index.php");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_GET["message"]))
{
    ?>
    <script>
    alert("<?=$_GET["message"]?>");

    </script>

    <?php
}


?>

        <form action="Login_post.php" method="POST" class="form-horizontal" style="width:500px;margin: auto">
            <legend>
                請輸入帳號密碼登入
               
            </legend>
            <div class="form-group">
                <!--<label>Username</label>-->
                <input class="form-control" type="text" placeholder="Username" name="Username">
            </div>
            <div class="form-group">
                <!--<label>Password</label>-->
                <input class="form-control" type="password" placeholder="Password" name="Password">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="登入" class="btn btn-default">
                <a href="Register.php" class="btn btn-default">註冊</a>
            </div>
            
                
        </form>
        

<?php

include "../_Footer.php";

?>