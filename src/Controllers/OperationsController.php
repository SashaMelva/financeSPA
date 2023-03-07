<?php
namespace App\Controllers;
use App\View;

class OperationsController 
{
   /* public function __construct(
        private string $sum,
        private string $operations_type_id,
        private string $operations_user_id,
        private string $comment
    ){}*/

    public function viewOperations() {
        $view = new View("../views/main_operations.php");
        return $view->getHtml();
    }
}