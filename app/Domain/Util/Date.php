<?php namespace App\Domain\Util;
use DateTime;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Date
 *
 * @author pc
 */
class Date {
    //put your code here
    public static function now(){

      return  new DateTime(date('Y-m-d H:i:s'));
     
    } 
}
