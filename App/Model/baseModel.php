<?php
 namespace App\Model;
 require "./App/interfaces/ModelInterface.php";
 use App\Interfaces\ModelInterface;
 abstract class baseModel implements ModelInterface
 {
    protected $table;
    public function __construct($table)
    {
        $this->table = $table;
        echo $table.'<br>';

    }
    public function getOne($id,$connet)
    {
        echo "function getone"."".$id;   
     }
 }