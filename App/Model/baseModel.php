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
    public function create(array $data)
    {}
    public function getAll()
    {}
    public function update($id, array $data)
    {}
    public function delete($id)
    {}
    public function getOne($id,$connet)
    {
        echo "function getone"."".$id;   
     }
 }