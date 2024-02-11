<?php


use App\models\BaseModel;

class CategoryModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function GetAllCategory()
    {
        return $this->GetAll('categorys');
    
    }

}
