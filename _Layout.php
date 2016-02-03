<?php
include '../DbContext.php';
include '../Models/user.php';
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <title>Homework1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    
    <!--UEDITOR-->
        <script type="text/javascript" charset="utf-8" src="../Content/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../Content/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="../Content/lang/zh-cn/zh-cn.js"></script>
    <!--UEDITOR-->
   
    
    </head>
    <body>
