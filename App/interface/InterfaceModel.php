<?php
namespace App\interfaces;
interface InterfaceModel
{
   public function GetOne($table,$row,$value);
   public function Create(); 
   public function Delete($table, $col, $value);
}