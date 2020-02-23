<?php
namespace App\Model;
use App\utils\database\Database;

class AppModel{
    protected $dbo;

    public function __construct()
    {
        $this->dbo=new Database();
        return  $this->dbo;
    }

}