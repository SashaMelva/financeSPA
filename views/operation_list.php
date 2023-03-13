<section class="container">
    <h2>Your finances</h2>
    <table>
    <caption>Table finances</caption>
    <tr>
        <th>
            <p>№</p>
        </th>
        <th>
            Summ
        </th>
        <th>
            Operations type
        </th>
        <th>
            User
        </th>
        <th>
            Comment operations
        </th>
    </tr>
    <tr>
        <?php foreach ($argc as $operation) : ?>
        <td>
            <?= 1 ?>
        </td>
        <td>
            <?= $operation['sum'] ?>
        </td>
        <td>
            <?= $operation['name'] ?>
        </td>
        <td>
            <?= $operation['login'] ?>
        </td>
        <td>
            <?= $operation['comment'] ?>
        </td>
        <td>
            <div onclick="deleteOperation()"><img src="/resources/img/delete.png"></div>
        </td>
        <td>
            <div onclick="editOperation()"><img src="/resources/img/edit.png"></div>
        </td>
        <?php endforeach;?>
    </tr>
    </table>

    <div onclick="loadAddOperation()"></div>
</section>