<?php

namespace App\Services;

enum ViewPath: string
{
    case Authorization = __DIR__ . "/../../views/authorization.php";
    case Registration = __DIR__ . "/../../views/registration.php";
    case OperationAdd = __DIR__ . "/../../views/add_operation.php";
    case OperationEdit = __DIR__ . "/../../views/edit_operation.php";
    case OperationList = __DIR__ . "/../../views/operation_list.php";
    case NotFound = __DIR__ . "/../../views/404_not_found.php";

}
