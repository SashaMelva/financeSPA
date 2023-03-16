<?php
//$operations = $this->args;    #TODO Del
///**
//* @var array{int, array{
//*                       login: string,
//*                       sum: string,
//*                       name: string,
//*                       comment: string,
//*                       operations_id: string}
//*           } $operations
//*/
//?>

<section class="container">
    <h2>Your finances</h2>
    <table class="table-main">
        <tr>
            <th>№</th>
            <th>Sum</th>
            <th>Operations type</th>
            <th>User</th>
            <th>Comment operations</th>
            <th></th>
            <th></th>
        </tr>
        <tbody class="table-operation">
        </tbody>
    </table>
    <div>
        <label>Total:</label>
        <p>Incoming</p>
        <p class="incoming-all"></p>
        <p>Expense:</p>
        <p class="expense-all"></p>
    </div>
    <div class="btn" onclick="fetchAndViewAddOperationForm()">Add new operation</div>
    <button class="btn btn-sign-up" onclick="fetchAndViewAuthorizationForm()">Back</button>
</section>