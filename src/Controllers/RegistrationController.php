<?php
namespace App\Controllers;
use App\View;
use App\Response;

class RegistrationController 
{
   /*public function __construct(
        private string $login,
        private string $password,
    ){}*/
    
    public function viewRegistration() 
    {
        $html = new View("../views/registration.php");
        (new Response('success', $html))->getResponse();
    }

    /*public function signIn() {
        if ($login == "") {

        }
    }*/
}