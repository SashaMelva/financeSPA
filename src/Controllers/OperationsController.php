<?php
namespace App\Controllers;
use App\View;
use App\Response;

class OperationsController 
{
   /* public function __construct(
        private string $sum,
        private string $operations_type_id,
        private string $operations_user_id,
        private string $comment
    ){}*/

    public function viewOperations() 
    {
        $html = new View("../views/main_operations.php");
        (new Response('success', $html))->getResponse();
    }
}