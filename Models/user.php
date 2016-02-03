<?php
//include "../_Layout";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class user
{
    public static function IsAdmin($IsAdmin)
    {
        if(empty($IsAdmin))
        {
            $hidden="visibility:hidden";
            return $hidden;            
        }
        else
        {
            return 0;
        }
    }
}