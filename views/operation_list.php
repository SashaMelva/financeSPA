<?php
$operations = $this->args;
/**
* @var array{int, array{
*                       login: string,
*                       sum: string,
*                       name: string,
*                       comment: string,
*                       operations_id: string}
*           } $operations
*/
?>

<section class="container">
    <h2>Your finances</h2>
    <table>
        <tr>
            <th>№</th>
            <th>Summ</th>
            <th>Operations type</th>
            <th> User</th>
            <th>Comment operations</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tbody class="table-operation">
        </tbody>
    </table>
    <div class="btn" onclick="loadAddOperation()">Add new operation</div>
</section>