<?php
namespace App\Controllers;
use App\View;

class AuthorizationController 
{
   /*public function __construct(
        private string $login,
        private string $password,
    ){}*/
    
    public function viewAuthorization(): string 
    {
    
        return new View("../views/authorization.php");
    }

    // public function signIn() {
    //     if ($login == "") {

    //     }
    // }
}










// class View
// {
//     public static function getHtml(string $path): string 
//     {
//         ob_start();
//         include($path);
//         $var = ob_get_contents();
//         ob_end_clean();
    
//         return $var;
//     }
// }