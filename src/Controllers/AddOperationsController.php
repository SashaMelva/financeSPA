<?php
namespace App\Controllers;
use App\View;

class AddOperationsController 
{
    /*public function __construct(
        private string $login,
        private string $password,
    ){}*/
    
    public function viewAddOperations() {
        $view = new View("../views/add_operation.php");
        return $view->getHtml();
    }
}