<?php
include "../_Layout.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div style="width:500px; margin: auto">
    <a href="../User/Login.php" class="btn btn-default">返回登入頁面</a>
    <form action="Register_post.php" method="POST" class="form-horizontal">
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
                           <input name='IsAdmin' type='hidden' value=0 >
                <input class="btn btn-default"  type="submit" value="新增" name="submit">
            </form>
    </div>