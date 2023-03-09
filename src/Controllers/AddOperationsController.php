<?php
namespace App\Controllers;
use App\View;
use App\Response;

class AddOperationsController 
{
    /*public function __construct(
        private string $login,
        private string $password,
    ){}*/
    
    public function viewAddOperations() 
    {
        $html = new View("../views/add_operation.php");
        (new Response('success', $html))->getResponse();
    }
}